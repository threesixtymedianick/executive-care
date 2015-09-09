<?php
namespace Website\EventHandler;

use Geocoder\Exception\CollectionIsEmpty;
use Geocoder\Model\Address;
use Geocoder\Model\AddressCollection;
use Geocoder\Provider\LocaleAwareProvider;
use Pimcore\Model\Object\CareHomes;

class CareHomeEventHandler
{
    /**
     * @var Geocoder\Provider\LocaleAwareProvider
     */
    private $geocoder;

    /**
     * Constructor
     *
     * @param Geocoder\Provider\LocaleAwareProvider $geocoder
     */
    public function __construct(LocaleAwareProvider $geocoder)
    {
        $this->geocoder = $geocoder;
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

        // Save the care home
        $object->save();
    }
}
