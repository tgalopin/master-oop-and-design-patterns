<?php

namespace App\CityFetcher;

use App\Model\Weather;

class CityFetcher implements CityFetcherInterface
{
    /**
     * @var LocalCityFetcherInterface[]
     */
    private array $localFetchers = [];

    public function __construct(iterable $localFetchers)
    {
        foreach ($localFetchers as $f) {
            $this->localFetchers[] = $f;
        }
    }

    public function fetchWeather(string $cityName): Weather
    {
        foreach ($this->localFetchers as $fetcher) {
            if ($fetcher->supports($cityName)) {
                return $fetcher->fetchWeather($cityName);
            }
        }

        throw new \LogicException();
    }
}
