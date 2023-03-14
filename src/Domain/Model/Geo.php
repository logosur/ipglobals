<?php

namespace App\Domain\Model;

/**
 * Summary of Geo
 */
class Geo
{
    /**
     * Summary of lat
     * @var string
     */
    private string $lat;

    /**
     * Summary of lng
     * @var string
     */
    private string $lng;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
    }

    /**
     * Summary of fromArray
     * @param array{"lat": string, "lng": string} $data
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
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }


    /**
     * Summary of setLat
     * @param string $lat
     * @return Geo
     */
    public function setLat(string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }


    /**
     * Summary of getLng
     * @return string
     */
    public function getLng(): string
    {
        return $this->lng;
    }


    /**
     * Summary of setLng
     * @param string $lng
     * @return Geo
     */
    public function setLng(string $lng): self
    {
        $this->lng = $lng;

        return $this;
    }
}
