<?php

namespace App\Controller;

use App\CityFetcher\CityFetcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route("/{city}", name="city")
     */
    public function index(CityFetcherInterface $cityFetcher, string $city): Response
    {
        return $this->json(
            $cityFetcher
                ->fetchWeather($city)
                ->toArray()
        );
    }
}
