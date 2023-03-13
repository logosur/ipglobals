<?php

namespace App\Domain\Model;

use App\Domain\Model\Address;
use App\Domain\Model\Company;
/**
 * Summary of User
 */
class User
{
    /**
     * Summary of id
     * @var int
     */
    private int $id;

    /**
     * Summary of userName
     * @var string
     */
    private string $userName;

    /**
     * Summary of email
     * @var string
     */
    private string $email;

    /**
     * Summary of address
     * @var Address
     */
    private Address $address;

    /**
     * Summary of phone
     * @var string
     */
    private string $phone;

    /**
     * Summary of website
     * @var string
     */
    private string $website;

    /**
     * Summary of company
     * @var Company
     */
    private Company $company;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
    }

    /**
     * Summary of fromArray
     * @param array $data
     * @return User
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->userName = $data['username'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->website = $data['website'];
        $this->address = (new Address())->fromArray($data['address']);
        $this->company = (new Company())->fromArray($data['company']);

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
	public function getUserName(): string
    {
		return $this->userName;
	}
	
	/**
	 * @param string $userName 
	 * @return self
	 */
	public function setUserName(string $userName): self
    {
		$this->userName = $userName;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getEmail(): string
    {
		return $this->email;
	}
	
	/**
	 * @param string $email 
	 * @return self
	 */
	public function setEmail(string $email): self
    {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return Address
	 */
	public function getAddress(): Address
    {
		return $this->address;
	}
	
	/**
	 * @param Address $address 
	 * @return self
	 */
	public function setAddress(Address $address): self
    {
		$this->address = $address;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getPhone(): string
    {
		return $this->phone;
	}
	
	/**
	 * @param string $phone 
	 * @return self
	 */
	public function setPhone(string $phone): self
    {
		$this->phone = $phone;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getWebsite(): string
    {
		return $this->website;
	}
	
	/**
	 * @param string $website 
	 * @return self
	 */
	public function setWebsite(string $website): self
    {
		$this->website = $website;
		return $this;
	}
	
	/**
	 * @return Company
	 */
	public function getCompany(): Company
    {
		return $this->company;
	}
	
	/**
	 * @param Company $company 
	 * @return self
	 */
	public function setCompany(Company $company): self
    {
		$this->company = $company;
		return $this;
	}
}