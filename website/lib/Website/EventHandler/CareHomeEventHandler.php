<?php
namespace Website\EventHandler;

use Elastica\Client;
use Elastica\Document;
use Geocoder\Exception\CollectionIsEmpty;
use Geocoder\Model\Address;
use Geocoder\Model\AddressCollection;
use Geocoder\Provider\LocaleAwareProvider;
use Pimcore\Model\Object\CareHomes;

class CareHomeEventHandler
{
    /**
     * Name of the Elastic Search index to save to
     */
    const ES_INDEX = 'carehomes';

    /**
     * Name of the Elastic Search type to save to
     */
    const ES_TYPE = 'home';

    /**
     * @var Geocoder\Provider\LocaleAwareProvider
     */
    private $geocoder;

    /**
     * @var Elastica\Client
     */
    private $client;

    /**
     * Constructor
     *
     * @param Geocoder\Provider\LocaleAwareProvider $geocoder
     * @param Elastica\Client $elasticSearch
     */
    public function __construct(LocaleAwareProvider $geocoder, Client $client)
    {
        $this->geocoder = $geocoder;
        $this->client   = $client;
    }

    /**
     *
     * @param type $event
     */
    public function onPostUpdate($event)
    {
        /** @var Document_Page $document */
        $object = $event->getTarget();

        // Check if the object is a CareHome
        if (!$object instanceof CareHomes) {
            return false;
        }

        $postcode = $object->getPostcode();

        if (null !== $postcode) {
            // Get geocode data from the postcode
            $geoData = $this->geocoder->limit(1)->geocode($postcode);
        }

        if (!isset($geoData) || !$geoData instanceof AddressCollection) {
            return false;
        }

        try {
            // Get the first result
            $address = $geoData->first();
        } catch (CollectionIsEmpty $e) {
            Pimcore_Log_Simple::log(
                'care-home-event',
                'Geoencoder returned no results for postcode: ' . $postcode . ' ' . $e->getMessage()
            );

            return false;
        }

        // Set the care home lat/lon
        $object->setLat($address->getLatitude());
        $object->setLon($address->getLongitude());

        // Update the ES index
        $this->updateElasticSearchIndex($object);

        // Save the care home
        $object->save();
    }

    /**
     * Update Elastic Search index
     *
     * @param  Pimcore\Model\Object\CareHomes $object
     * @return
     */
    private function updateElasticSearchIndex($object)
    {
        $careHome = [
            'id'      => $object->getId(),
            'address' => [
                'postcode' => $object->getPostcode(),
            ],
            'location' => [
                'lat' => $object->getLat(),
                'lon' => $object->getLon(),
            ]
        ];

        // Create document
        $careHomeDocument = new Document($object->getId(), $careHome);

        // Get care home index
        $careHomeIndex = $this->client->getIndex(self::ES_INDEX);

        // Get care home type
        $careHomeType = $careHomeIndex->getType(self::ES_TYPE);
        $careHomeType->addDocument($careHomeDocument);

        // Save
        $careHomeType->getIndex()->refresh();
    }
}
