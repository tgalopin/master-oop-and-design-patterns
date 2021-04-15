<?php

namespace App\Model;

class Weather
{
    private ?Temperature $temperature = null;
    private ?Humidity $humidity = null;
    private ?Wind $wind = null;

    public function __construct(?Temperature $temperature, ?Humidity $humidity, ?Wind $wind)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->wind = $wind;
    }

    public function toArray(): array
    {
        return [
            'temperature' => $this->temperature ? $this->temperature->getValue() : null,
            'humidity' => $this->humidity ? $this->humidity->getValue() : null,
            'wind' => $this->wind ? $this->wind->getValue() : null,
        ];
    }

    public function getTemperature(): ?Temperature
    {
        return $this->temperature;
    }

    public function getHumidity(): ?Humidity
    {
        return $this->humidity;
    }

    public function getWind(): ?Wind
    {
        return $this->wind;
    }
}
