<?php
namespace Website\Console\Command;

use Elastica\Client;
use Elastica\Status;
use Elastica\Type\Mapping;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Output\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This depends on a recently merged pull request in Pimcore being downloaded
 * and added to the core
 *
 * https://github.com/pimcore/pimcore/pull/230/files
 */
class ElasticSearchSeederCommand extends Pimcore\Console\AbstractCommand
{
    /**
     * Name of the Elastic Search index to save to
     */
    const ES_INDEX = 'carehomes';

    /**
     * Name of the Elastic Search type to save to
     */
    const ES_TYPE = 'home';

    protected function configure()
    {
        $this
            ->setName('elasticsearch:seed')
            ->setDescription('Generates the Elastic Search Mappings');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @todo DI! */
        $client = new Client([
            'host' => 'localhost',
            'port' => 9200,
            'log'  => realpath(PIMCORE_PATH . '/../') . '/var/log/elasticsearch.log',
        ]);

        $status = new Status();

        // Check if the index already exists
        if ($status->indexExists('carehomes')) {
            $output->writeln('Index already exists');
            return false;
        }

        // Load index
        $careHomeIndex = $client->getIndex(self::ES_INDEX);

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

        $output->writeln('Indexing complete');
    }
}
