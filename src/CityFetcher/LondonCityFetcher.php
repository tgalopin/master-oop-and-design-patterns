<?php

namespace App\CityFetcher;

use App\Model\Humidity;
use App\Model\Temperature;
use App\Model\Weather;
use App\Model\Wind;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class LondonCityFetcher implements LocalCityFetcherInterface
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function supports(string $cityName): bool
    {
        return 'london' === $cityName;
    }

    public function fetchWeather(string $cityName): Weather
    {
        $response = $this->httpClient->request('GET', 'https://weather.titouangalopin.com/london.json');
        $data = $response->toArray();

        return new Weather(
            new Temperature($data['temperature']),
            new Humidity($data['humidity']),
            null,
        );
    }
}
