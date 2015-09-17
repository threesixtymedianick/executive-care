<?php
namespace Website\Repository;

use Elastica\Client;
use Elastica\Query;
use Website\Service\GeocoderService;

class VacancyElasticSearchRepository
{
    /**
     * Elastic search index to query
     */
    const ES_INDEX = 'vacancies';

    /**
     * @var Elastica\Client
     */
    protected $client;

    /**
     * Constructor
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

        echo "<pre>";
        print_r($address);
        echo $address->getLatitude();
        echo $address->getLongitude();
        echo "</pre>";



        // Get the co-ordinates
        $lat = $address->getLatitude();
        $lon = $address->getLongitude();

        // Vacancies index
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
            $vacancies = $resultSet->getResults();
        } catch (Exception $e) {
            return false;
        }

        echo "<pre>";
        print_r($vacancies);
        echo "</pre>";
        die();

        if (!empty($vacancies)) {
            return $vacancies;
        }

        return false;
    }
}
