<?php

namespace App\Domain\Model;

use App\Domain\Model\Geo;

/**
 * Summary of Address
 */
class Address
{
    /**
     * Summary of id
     * @var int
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
     * @param array $data
     * @return Address
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

	/**
	 * @return int
	 */
	public function getId(): int
    {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self
    {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getStreet(): string
    {
		return $this->street;
	}
	
	/**
	 * @param string $street 
	 * @return self
	 */
	public function setStreet(string $street): self
    {
		$this->street = $street;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getCity(): string
    {
		return $this->city;
	}
	
	/**
	 * @param string $city 
	 * @return self
	 */
	public function setCity(string $city): self
    {
		$this->city = $city;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getZipCode(): string
    {
		return $this->zipCode;
	}
	
	/**
	 * @param string $zipCode 
	 * @return self
	 */
	public function setZipCode(string $zipCode): self
    {
		$this->zipCode = $zipCode;
		return $this;
	}
	
	/**
	 * @return Geo
	 */
	public function getGeo(): Geo
    {
		return $this->geo;
	}
	
	/**
	 * @param Geo $geo 
	 * @return self
	 */
	public function setGeo(Geo $geo): self
    {
		$this->geo = $geo;
		return $this;
	}
}
