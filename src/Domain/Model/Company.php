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
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->catchPhrase = $data['catchPhrase'];
        $this->bs = $data['bs'];

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


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }


    public function getCatchPhrase(): string
    {
        return $this->catchPhrase;
    }


    public function setCatchPhrase(string $catchPhrase): self
    {
        $this->catchPhrase = $catchPhrase;
        return $this;
    }


    public function getBs(): string
    {
        return $this->bs;
    }


    public function setBs(string $bs): self
    {
        $this->bs = $bs;
        return $this;
    }
}
