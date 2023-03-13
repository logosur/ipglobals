<?php

namespace App\Domain\Model;

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

    /**
     * Summary of __construct
     */
    public function __construct()
    {
    }

    /**
     * Summary of fromArray
     * @param array $data
     * @return Geo
     */
    public function fromArray(array $data): self
    {
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];

        return $this;
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
     * Summary of setLat
     * @param float $lat
     * @return Geo
     */
    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
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
     * Summary of setLng
     * @param float $lng
     * @return Geo
     */
    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }
}
