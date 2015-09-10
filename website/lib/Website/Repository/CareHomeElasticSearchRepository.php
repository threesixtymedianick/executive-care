<?php
namespace Website\Repository;

use Elastica\Client;
use Elastica\Query;
use Website\Service\GeocoderService;

class CareHomeElasticSearchRepository
{
    /**
     * Elastic search index to query
     */
    const ES_INDEX = 'carehomes';

    /**
     * @var Elastica\Client
     */
    protected $client;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        /**
         * @todo Find a way to implement DI
         */
        $this->client = new Client([
            'host' => 'localhost',
            'port' => 9200,
            'log'  => realpath(PIMCORE_PATH . '/../') . '/var/log/elasticsearch.log',
        ]);

        $this->geocoder = new GeocoderService();
    }

    /**
     * Geolocation search for Care Homes
     *
     * @param  string $query
     * @return
     */
    public function search($query)
    {
        $data = $this->geocoder->geocode($query);

        if (null === $data) {
            // Failed search
            return false;
        }

        try {
            $address = $data->first();
        } catch (\Exception $e) {
            return false;
        }

        // Get the co-ordinates
        $lat = $address->getLatitude();
        $lon = $address->getLongitude();

        // Carehomes index
        $index = $this->client->getIndex(self::ES_INDEX);

        // Generate the query
        // Note on $lon, $lat being reversed, this is required
        // https://www.elastic.co/guide/en/elasticsearch/guide/current/lat-lon-formats.html
        $query = new Query();
        $query->addSort([
            '_geo_distance' => [
                'location' => [ $lon, $lat ],
                'order'    => 'asc',
                'unit'     => 'miles',
            ]
        ]);

        // Get the results
        try {
            $resultSet = $index->search($query);
            $careHomes = $resultSet->getResults();
        } catch (Exception $e) {
            return false;
        }

        if (!empty($careHomes)) {
            return $careHomes;
        }

        return false;
    }
}
