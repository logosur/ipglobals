<?php

namespace App\Domain\Model;

use App\Domain\ValueObject\Geo;

/**
 * Summary of Address
 */
class Address
{
    /**
     * Summary of id
     * @var integer
     */
    private int $id;

    /**
     * Summary of street
     * @var string
     */
    private string $street;

    /**
     * Summary of city
     * @var string
     */
    private string $city;

    /**
     * Summary of zipCode
     * @var string
     */
    private string $zipCode;

    /**
     * Summary of geo
     * @var Geo
     */
    private Geo $geo;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
    }

    /**
     * Summary of fromArray
     * @param array{
     *      "id": int,
     *      "street": string,
     *      "city": string,
     *      "zipcode": string,
     *      "geo": array{
     *          "lat": float,
     *          "lng": float
     *      }
     * } $data
     * @return Address
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->street = $data['street'];
        $this->city = $data['city'];
        $this->zipCode = $data['zipcode'];
        $this->geo = new Geo($data['geo']['lat'], $data['geo']['lng']);

        return $this;
    }

    /**
     * Summary of getId
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Summary of setId
     * @param int $id
     * @return Address
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Summary of getStreet
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * Summary of setStreet
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Summary of getCity
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Summary of setCity
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Summary of getZipCode
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * Summary of setZipCode
     * @param string $zipCode
     * @return Address
     */
    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * Summary of getGeo
     * @return Geo
     */
    public function getGeo(): Geo
    {
        return $this->geo;
    }

    /**
     * Summary of setGeo
     * @param Geo $geo
     * @return Address
     */
    public function setGeo(Geo $geo): self
    {
        $this->geo = $geo;
        return $this;
    }
}
