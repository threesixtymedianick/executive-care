<?php
namespace Website\Service;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Guzzle\Http\Exception\ServerErrorReponseException;
use Doctrine\Common\Cache\FilesystemCache;
use Guzzle\Plugin\Cache\CallbackCanCacheStrategy;
use Guzzle\Cache\DoctrineCacheAdapter;
use Guzzle\Plugin\Cache\CachePlugin;
use Guzzle\Plugin\Cache\DefaultCacheStorage;

class RecommendationService
{
    /**
     * @var Guzzle\Http\Client
     */
    protected $client;

    /**
     * The random recommendation method is self recursive, incase of the RSS feed
     * being down we don't want to lock the page load
     *
     * @var integer
     */
    protected $attemptCounter = 0;

    /**
     * The amount of attempts we will make to get a random recommendation
     */
    const RETRY_ATTEMPTS = 10;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new Client('http://www.carehome.co.uk/');

        // Set caching to true
        $canCache = new CallbackCanCacheStrategy(
            function ($request) {
                return true;
            }
        );

        // Initalise cache plugin
        $cachePlugin = new CachePlugin(
            [
                'can_cache' => $canCache,
                'storage'   => new DefaultCacheStorage(
                    new DoctrineCacheAdapter(
                        new FilesystemCache(__DIR__ . '/../../../var/cache/guzzlecache')
                    )
                )
            ]
        );

        // Register cache plugin
        $this->client->addSubscriber($cachePlugin);
    }

    /**
     * Get recommendations for a care home
     *
     * @param  int $careHomeId
     * @return array|bool
     */
    public function getRecommendationForCareHome($careHomeId)
    {
        if (!is_numeric($careHomeId)) {
            return false;
        }

        $xmlData = $this->getRecommendationData($careHomeId);

        if (false === $xmlData) {
            return false;
        }

        // Count how many recommendations there are for this home
        $recommendationCount = count($xmlData->channel->item);

        // Pick a random recommendation from this list
        $random = rand(0, $recommendationCount - 1);

        // Create the recommendation
        $recommendation = [
            'title'       => (string) $xmlData->channel->title,
            'link'        => (string) $xmlData->channel->link,
            'description' => (string) $xmlData->channel->item[$random]->description,
            'pubDate'     => (string) $xmlData->channel->item[$random]->pubDate,
            'author'      => (string) $xmlData->channel->item[$random]->author,
        ];

        return $recommendation;
    }

    /**
     * Get a random recommendation
     *
     * @return array|bool
     */
    public function getRandomRecommendation()
    {
        // Get a random care home ID
        $randomCareHome = $this->getRandomCareHomeId();

        if (false === $randomCareHome) {
            return false;
        }

        // Get the XML data for this care home
        $xmlData = $this->getRecommendationData($randomCareHome);

        // Recursion if a recommendation hasn't been found
        if (empty($xmlData) || count($xmlData->channel->item) === 0) {
            $this->attemptCounter++;

            if ($this->attemptCounter < self::RETRY_ATTEMPTS) {
                return $this->getRandomRecommendation();
            }

            return false;
        }

        // Count how many recommendations there are for this home
        $recommendationCount = count($xmlData->channel->item);

        // Pick a random recommendation from this list
        $random = rand(0, $recommendationCount - 1);

        // Create the recommendation
        $recommendation = [
            'title'       => (string) $xmlData->channel->title,
            'link'        => (string) $xmlData->channel->link,
            'description' => (string) $xmlData->channel->item[$random]->description,
            'pubDate'     => (string) $xmlData->channel->item[$random]->pubDate,
            'author'      => (string) $xmlData->channel->item[$random]->author,
        ];

        return $recommendation;
    }

    /**
     * Get recommendation data from the RSS feed
     *
     * @param  int $careHomeId
     * @return SimpleXMLElement
     */
    protected function getRecommendationData($careHomeId)
    {
        try {
            $response = $this->client->get("recommendations/rss.cfm?displayid=$careHomeId")->send();
        } catch (ServerErrorReponseException $e) {
            return false;
        } catch (ClientErrorResponseException $e) {
            return false;
        }

        if (!$response->hasHeader('Content-Length') || $response->getStatusCode() === 404) {
            return false;
        }

        return $response->xml();
    }

    /**
     * Get a random care home ID
     *
     * @return int|bool
     */
    protected function getRandomCareHomeId()
    {
        $list = new \Object\CareHomes\Listing();
        $careHomes = $list->load();

        $ids = [];

        foreach ($careHomes as $careHome) {
            $ids[] = $careHome->getCareHomeId();
        }

        if (empty($ids)) {
            return false;
        }

        return $ids[array_rand($ids, 1)];
    }
}
