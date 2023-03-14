<?php

namespace App\Domain\Model;

/**
 * Summary of User
 */
class User
{
    /**
     * Summary of id
	 * @var integer
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
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->userName = $data['username'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->website = $data['website'];
        $this->address = (new Address())->fromArray((array) $data['address']);
        $this->company = (new Company())->fromArray((array) $data['company']);

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


    public function getUserName(): string
    {
        return $this->userName;
    }


    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    public function getAddress(): Address
    {
        return $this->address;
    }


    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }


    public function getPhone(): string
    {
        return $this->phone;
    }


    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }


    public function getWebsite(): string
    {
        return $this->website;
    }


    public function setWebsite(string $website): self
    {
        $this->website = $website;
        return $this;
    }


    public function getCompany(): Company
    {
        return $this->company;
    }


    public function setCompany(Company $company): self
    {
        $this->company = $company;
        return $this;
    }
}
