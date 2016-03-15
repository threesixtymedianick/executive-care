<?php
namespace Website\Console\Command;

use Elastica\Client;
use Elastica\Document;
use Elastica\Status;
use Pimcore\Console\AbstractCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Output\InputInterface;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\OutputInterface;
use Website\Service\GeocoderService;

class ElasticSearchSeederCommand extends AbstractCommand
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
            ->setName('elasticsearch:seeder')
            ->setDescription('Seeds the Elastic Search indexes');
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

        $this->seedCareHomes($client);

        $this->seedVacancies($client);
    }

    /**
     * Seed the care homes
     *
     * @param  Elastica\Client $client
     * @return
     */
    protected function seedCareHomes($client)
    {
        $geocoder = new GeocoderService();
        $status = new Status($client);

        // Check if the index already exists
        if (!$status->indexExists(self::ES_CAREHOME_INDEX)) {
            echo 'Care home index does not exist, run the mapping command first' . PHP_EOL;
            return false;
        }

        // Load index
        $careHomeIndex = $client->getIndex(self::ES_CAREHOME_INDEX);

        // Get the type
        $elasticaType = $careHomeIndex->getType(self::ES_CAREHOME_TYPE);

        // Get care homes
        $careHomes = new \Object\CareHomes\Listing();

        if (null === $careHomes || empty($careHomes)) {
            echo 'Error getting care homes' . PHP_EOL;
            return false;
        }

        $careHomes = $careHomes->load();

        foreach ($careHomes as $home) {
            $geocodeData = $geocoder->geocode($home->getPostcode());

            try {
                // Get the first result
                $address = $geocodeData->first();

                $documents[] = new Document(
                    $home->getId(),
                    [
                        'title'    => $home->getTitle(),
                        'address'  => [
                            'postcode' => $home->getPostcode(),
                        ],
                        'location' => [
                            'lat' => $address->getLatitude(),
                            'lon' => $address->getLongitude(),
                        ],
                    ]
                );
            } catch (CollectionIsEmpty $e) {
                Pimcore_Log_Simple::log(
                    'elastic-search-seeder',
                    'Geoencoder returned no results for postcode: ' . $home->getPostcode() . ' ' . $e->getMessage()
                );
            }
        }

        $elasticaType->addDocuments($documents);
        $elasticaType->getIndex()->refresh();

        echo 'Care homes seeded' . PHP_EOL;
    }

    /**
     * Seed the vacancies
     *
     * @param  Elastica\Client $client
     * @return
     */
    protected function seedVacancies($client)
    {
        $status = new Status($client);

        // Check if the index already exists
        if (!$status->indexExists(self::ES_VACANCY_INDEX)) {
            echo 'Vacancies index does not exist, run the mapping command first' . PHP_EOL;
            return false;
        }

        // Load index
        $vacancyIndex = $client->getIndex(self::ES_VACANCY_INDEX);

        // Get the type
        $elasticaType = $vacancyIndex->getType(self::ES_VACANCY_TYPE);

        // Get vacancies
        $vacancies = new \Object\Vacancy\Listing();

        if (null === $vacancies || empty($vacancies)) {
            echo 'Error getting vacancies' . PHP_EOL;
            return false;
        }

        $vacancies = $vacancies->load();

        foreach ($vacancies as $vacancy) {
            $documents[] = new Document(
                $vacancy->getId(),
                [
                    'type'  => ($vacancy->getRoleTitle()[0]) ? $vacancy->getRoleTitle()[0]->getName() : '',
                    'location' => [
                        'lat' => ($vacancy->getCareHomes()[0]) ? $vacancy->getCareHomes()[0]->getLat() : '',
                        'lon' => ($vacancy->getCareHomes()[0]) ? $vacancy->getCareHomes()[0]->getLon() : '',
                    ],
                ]
            );

        }

        $elasticaType->addDocuments($documents);
        $elasticaType->getIndex()->refresh();

        echo 'Vacancies seeded' . PHP_EOL;
    }
}
