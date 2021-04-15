<?php

namespace App\CityFetcher;

use App\Model\Weather;

interface LocalCityFetcherInterface
{
    public function supports(string $cityName): bool;

    public function fetchWeather(string $cityName): Weather;
}
