<?php
namespace Website\Console\Command;

use Elastica\Client;
use Elastica\Status;
use Elastica\Type\Mapping;
use Pimcore\Console\AbstractCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Output\InputInterface;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\OutputInterface;

class ElasticSearchCreateMappingsCommand extends AbstractCommand
{
    /**
     * ES Care Home index
     */
    const ES_CAREHOME_INDEX = 'carehomes';

    /**
     * ES Care Home type
     */
    const ES_CAREHOME_TYPE = 'home';

    /**
     * ES Vacancy index
     */
    const ES_VACANCY_INDEX = 'vacancies';

    /**
     * ES Vacancy type
     */
    const ES_VACANCY_TYPE = 'vacancy';

    /**
     * Configure the command
     * @return
     */
    protected function configure()
    {
        $this
            ->setName('elasticsearch:mappings')
            ->setDescription('Generates the Elastic Search Mappings');
    }

    /**
     * Execute the command
     * @param  ArgvInput       $input
     * @param  OutputInterface $output
     * @return
     */
    protected function execute(ArgvInput $input, OutputInterface $output)
    {
        /* @todo DI! */
        $client = new Client([
            'host' => 'localhost',
            'port' => 9200,
            'log'  => realpath(PIMCORE_PATH . '/../') . '/var/log/elasticsearch.log',
        ]);

        $this->createCareHomeMapping($client);

        $this->createVacancyMapping($client);
    }

    /**
     * Create the mapping for care homes
     *
     * @param  Elastica\Client $client
     * @return
     */
    protected function createCareHomeMapping($client)
    {
        $status = new Status($client);

        // Check if the index already exists
        if ($status->indexExists(self::ES_CAREHOME_INDEX)) {
            echo 'Care home index already exists' . PHP_EOL;
            return false;
        }

        // Load index
        $careHomeIndex = $client->getIndex(self::ES_CAREHOME_INDEX);

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
        $elasticaType = $careHomeIndex->getType(self::ES_CAREHOME_TYPE);

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

        echo 'Care home mapping created' . PHP_EOL;
    }

    /**
     * Create the mapping for vacancies
     *
     * @param  Elastica\Client $client
     * @return
     */
    protected function createVacancyMapping($client)
    {
        $status = new Status($client);

        // Check if the index already exists
        if ($status->indexExists(self::ES_VACANCY_INDEX)) {
            echo 'Vacancies index already exists' . PHP_EOL;
            return false;
        }

        // Load index
        $vacancyIndex = $client->getIndex(self::ES_VACANCY_INDEX);

        // Create a new index
        $vacancyIndex->create([
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
        $elasticaType = $vacancyIndex->getType(self::ES_VACANCY_TYPE);

        // Define mapping
        $mapping = new Mapping();
        $mapping->setType($elasticaType);
        $mapping->setParam('index_analyzer', 'indexAnalyzer');
        $mapping->setParam('search_analyzer', 'searchAnalyzer');

        // Set mapping
        $mapping->setProperties([
            'id'      => ['type' => 'integer', 'include_in_all' => true],
            'type'    => ['type' => 'string', 'include_in_all' => true],
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

        echo 'Vacancy mapping created' . PHP_EOL;
    }
}
