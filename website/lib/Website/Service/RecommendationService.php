<?php
namespace Website\Service;

use Guzzle\Http\Client;
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
     * @param  [type] $careHomeId [description]
     * @return [type]             [description]
     */
    public function getRecommendationsForCareHome($careHomeId)
    {
        if (!is_numeric($careHomeId)) {
            return false;
        }

        $response = $this->client->get("recommendations/rss.cfm?displayid=$careHomeId")->send();

        if (!$response->hasHeader('Content-Length') && $response->getStatusCode() === 404) {
            return false;
        }

        $xmlData = $response->xml();

        $recommendations = [];

        if (!empty($xmlData)) {
            foreach ($xmlData->channel->item as $recommendation) {
                $recommendations[] = [
                    'title'       => (string) $recommendation->title,
                    'description' => (string) $recommendation->description,
                    'pubDate'     => (string) $recommendation->pubDate,
                    'author'      => (string) $recommendation->author,
                ];
            }
        }

        return $recommendations;
    }
}
