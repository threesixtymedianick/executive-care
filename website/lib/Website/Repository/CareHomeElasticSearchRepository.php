<?php
namespace Website\Repository;

use Elastica\Client;

class CareHomeSearchRepository
{
    /**
     * @var Elastica\Client
     */
    protected $client;

    public function __construct()
    {
        /**
         * @todo Find a way to implement DI
         */
        $this->client = new Client([
            'host' => 'localhost',
            'port' => 9200,
            'log'  => __DIR__ . '/../log/elasticsearch.log',
        ]);
    }

    public function search()
    {

    }
}
