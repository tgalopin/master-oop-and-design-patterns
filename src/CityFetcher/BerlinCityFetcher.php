<?php

namespace App\CityFetcher;

use App\Model\Humidity;
use App\Model\Temperature;
use App\Model\Weather;
use App\Model\Wind;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BerlinCityFetcher implements LocalCityFetcherInterface
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function supports(string $cityName): bool
    {
        return 'berlin' === $cityName;
    }

    public function fetchWeather(string $cityName): Weather
    {
        $response = $this->httpClient->request('GET', 'https://weather.titouangalopin.com/berlin.json');
        $data = $response->toArray();

        return new Weather(
            new Temperature($data['measure']['temp']),
            new Humidity($data['measure']['humidity']),
            new Wind($data['measure']['wind']),
        );
    }
}
