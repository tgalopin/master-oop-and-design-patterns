<?php

namespace App\CityFetcher;

use App\Model\Weather;

interface CityFetcherInterface
{
    public function fetchWeather(string $cityName): Weather;
}
