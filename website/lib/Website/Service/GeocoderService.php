<?php
namespace Website\Service;

use Ivory\HttpAdapter\CurlHttpAdapter;
use Geocoder\Model\AddressCollection;
use Geocoder\ProviderAggregator;
use Geocoder\Provider\Chain;
use Geocoder\Provider\BingMaps;
use Geocoder\Provider\GoogleMaps;
use Geocoder\Provider\OpenStreetMap;

class GeocoderService
{
    /**
     * Set up geocoder
     */
    public function __construct()
    {
        $adapter        = new CurlHttpAdapter();
        $this->geocoder = new ProviderAggregator();

        // Set up endpoints
        $chain = new Chain([
            new GoogleMaps($adapter, null, null, true, 'AIzaSyDce-Xd1Q3Mko_sQqi6q85LyKdwCmVzeoU'),
            new OpenStreetMap($adapter),
            new BingMaps($adapter, 'AnAPU-NHvoUTTbVLAdEAk-zCf_fPsaMd9PmPvIFX2GndtaLJ1P8I0pqxAylhPSs8')
        ]);

        $this->geocoder->registerProvider($chain);
    }

    /**
     * Geocode
     * Convert an address into Lat/Lon
     *
     * @param  string $data
     * @return Geocoder\Model\AddressCollection|null
     */
    public function geocode($data)
    {
        $geocode = $this->geocoder->geocode($data);

        if (!$geocode instanceof AddressCollection) {
            return null;
        }

        return $geocode;
    }

    /**
     * Reverse Geocode
     * Convert Lat/Lon into an address
     *
     * @param  string $data
     * @return Geocoder\Model\AddressCollection|null
     */
    public function reverse($data)
    {
        $geocode = $this->geocoder->reverse($data);

        if (!$geocode instanceof AddressCollection) {
            return null;
        }

        return $geocode;
    }
}
