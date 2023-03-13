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
	 * @return float
	 */
	public function getLat(): float
    {
		return $this->lat;
	}
	
	/**
	 * @param float $lat 
	 * @return self
	 */
	public function setLat(float $lat): self
    {
		$this->lat = $lat;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getLng(): float
    {
		return $this->lng;
	}
	
	/**
	 * @param float $lng 
	 * @return self
	 */
	public function setLng(float $lng): self
    {
		$this->lng = $lng;
		return $this;
	}
}
