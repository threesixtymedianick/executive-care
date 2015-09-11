<?php
namespace Website\Seeder;

use Elastica\Client;
use Elastica\Status;
use Elastica\Type\Mapping;

/**
 * There is a recent merged pull request within Pimcore that implements
 * the Symfony\Console component.
 *
 * Once this has made it into a release candidate/we manually update pimcore
 * this needs to be made into a command
 */
class ElasticSearchSeeder
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
     * @var Elastica\Client
     */
    private $client;

    /**
     * @param Elastica\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->status = new Status($client);
    }

    /**
     * Build the required Elastic Search indexes and mappings
     *
     * @return
     */
    public function build()
    {
        // Check if the index already exists
        if ($this->status->indexExists('carehomes')) {
            return false;
        }

        // Load index
        $careHomeIndex = $this->client->getIndex(self::ES_INDEX);

        // Create a new index
        $careHomeIndex->create([
            'number_of_shards'   => 4,
            'number_of_replicas' => 1,
            'analysis' => [
                'analyzer' => [
                    'indexAnalyzer' => [
                        'type'      => 'custom',
                        'tokenizer' => 'standard',
                        'filter'    => ['standard', 'lowercase']
                    ],
                    'searchAnalyzer' => [
                        'type'      => 'custom',
                        'tokenizer' => 'standard',
                        'filter'    => ['standard', 'lowercase']
                    ]
                ],
            ]
        ]);

        // Create a type
        $elasticaType = $careHomeIndex->getType(self::ES_TYPE);

        // Define mapping
        $mapping = new Mapping();
        $mapping->setType($elasticaType);
        $mapping->setParam('index_analyzer', 'indexAnalyzer');
        $mapping->setParam('search_analyzer', 'searchAnalyzer');

        // Set mapping
        $mapping->setProperties([
            'id'      => ['type' => 'integer', 'include_in_all' => true],
            'title'   => ['type' => 'string', 'include_in_all' => true],
            'address'    => [
                'type'       => 'object',
                'properties' => [
                    'postcode'      => ['type' => 'string', 'include_in_all' => true],
                ]
            ],
            'location'   => [
                'type' => 'geo_point',
                'properties' => [
                    'lat' => ['type' => 'string', 'include_in_all' => true],
                    'lon' => ['type' => 'string', 'include_in_all' => true],
                ]
            ]
        ]);

        // Send mapping to type
        $mapping->send();
    }
}
