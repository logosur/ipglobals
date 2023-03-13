<?php

namespace App\Domain\Model;

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
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->street = $data['street'];
        $this->city = $data['city'];
        $this->zipCode = $data['zipcode'];
        $this->geo = (new Geo())->fromArray($data['geo']);

        return $this;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function getStreet(): string
    {
        return $this->street;
    }


    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }


    public function getCity(): string
    {
        return $this->city;
    }


    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }


    public function getZipCode(): string
    {
        return $this->zipCode;
    }


    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;
        return $this;
    }


    public function getGeo(): Geo
    {
        return $this->geo;
    }


    public function setGeo(Geo $geo): self
    {
        $this->geo = $geo;
        return $this;
    }
}
