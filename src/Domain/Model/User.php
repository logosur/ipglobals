<?php

namespace App\Domain\Model;

use OpenApi\Annotations as OA;

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
     * @OA\Property(type="string", maxLength=255)
     */
    private string $userName;

    /**
     * Summary of email
	 * @var string
     * @OA\Property(type="string", maxLength=255)
     */
    private string $email;

    /**
     * Summary of address
	 * @var Address
     * @OA\Property(type="Address::class")
     */
    private Address $address;

    /**
     * Summary of phone
	 * @var string
     * @OA\Property(type="string", maxLength=30)
     */
    private string $phone;

    /**
     * Summary of website
	 * @var string
     * @OA\Property(type="string", maxLength=512)
     */
    private string $website;

    /**
     * Summary of company
	 * @var Company
     * @OA\Property(type="Company::class")
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
     * @param array{
     *      "id": int,
     *      "username": string,
     *      "email": string,
     *      "phone": string,
     *      "website": string,
     *      "address": array{
     *          "id": int,
     *          "street": string,
     *          "city": string,
     *          "zipcode": string,
     *          "geo": array{
     *              "lat": float,
     *              "lng": float
     *          }
     *      },
     *      "company": array{
     *          "id": integer,
     *          "name": string,
     *          "catchPhrase": string,
     *          "bs": string,
     *      }
     * } $data
     * @return User
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
     * @return User
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Summary of getUserName
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * Summary of setUserName
     * @param string $userName
     * @return User
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * Summary of getEmail
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Summary of setEmail
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Summary of getAddress
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * Summary of setAddress
     * @param Address $address
     * @return User
     */
    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Summary of getPhone
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Summary of setPhone
     * @param string $phone
     * @return User
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Summary of getWebsite
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * Summary of setWebsite
     * @param string $website
     * @return User
     */
    public function setWebsite(string $website): self
    {
        $this->website = $website;
        return $this;
    }

    /**
     * Summary of getCompany
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * Summary of setCompany
     * @param Company $company
     * @return User
     */
    public function setCompany(Company $company): self
    {
        $this->company = $company;
        return $this;
    }
}
