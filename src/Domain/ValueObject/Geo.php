<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

/**
 * Summary of Geo
 */
class Geo
{

    /**
     * Summary of lat
     * @var float
     */
    private float $lat;

    /**
     * Summary of lng
     * @var float
     */
    private float $lng;

    public function __construct(float $lat, float $lng)
    {
        $this->isValid($lat, $lng); 
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * Summary of getLat
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * Summary of getLng
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * Summary of isValid
     * @param float $lat
     * @param float $lng
     * @throws \Exception
     * @return void
     */
    public function isValid(float $lat, float $lng): void
    {
        if (abs($lat) > 90 || abs($lng) > 90) {
            throw new \Exception("Invalid Geo latitude or longitude values.");
        }
    }
}