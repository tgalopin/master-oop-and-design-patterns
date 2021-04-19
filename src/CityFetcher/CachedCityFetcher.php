<?php

namespace App\CityFetcher;

use App\Model\Weather;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CachedCityFetcher implements CityFetcherInterface
{
    private CityFetcherInterface $internalFetcher;
    private CacheInterface $cache;

    public function __construct(CityFetcherInterface $internalFetcher, CacheInterface $cache)
    {
        $this->internalFetcher = $internalFetcher;
        $this->cache = $cache;
    }

    public function fetchWeather(string $cityName): Weather
    {
        return $this->cache->get('weather-'.$cityName, function (ItemInterface $item) use ($cityName) {
            $item->expiresAfter(60);

            return $this->internalFetcher->fetchWeather($cityName);
        });
    }
}
