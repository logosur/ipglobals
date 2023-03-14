<?php

namespace App\Domain\Model;

/**
 * Summary of Company
 */
class Company
{
    /**
     * Summary of id
     * @var integer
     */
    private int $id;

    /**
     * Summary of name
     * @var string
     */
    private string $name;

    /**
     * Summary of catchPhrase
     * @var string
     */
    private string $catchPhrase;

    /**
     * Summary of bs
     * @var string
     */
    private string $bs;

    public function __construct()
    {
    }

    /**
     * Summary of fromArray
     * @param array{
     *      "id": integer,
     *      "name": string,
     *      "catchPhrase": string,
     *      "bs": string,
     * } $data
     * @return Company
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->catchPhrase = $data['catchPhrase'];
        $this->bs = $data['bs'];

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
     * @return Company
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Summary of getName
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Summary of setName
     * @param string $name
     * @return Company
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Summary of getCatchPhrase
     * @return string
     */
    public function getCatchPhrase(): string
    {
        return $this->catchPhrase;
    }

    /**
     * Summary of setCatchPhrase
     * @param string $catchPhrase
     * @return Company
     */
    public function setCatchPhrase(string $catchPhrase): self
    {
        $this->catchPhrase = $catchPhrase;
        return $this;
    }

    /**
     * Summary of getBs
     * @return string
     */
    public function getBs(): string
    {
        return $this->bs;
    }


    /**
     * Summary of setBs
     * @param string $bs
     * @return Company
     */
    public function setBs(string $bs): self
    {
        $this->bs = $bs;
        return $this;
    }
}
