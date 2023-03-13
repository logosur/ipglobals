<?php

namespace App\Domain\Model;

/**
 * Summary of Company
 */
class Company
{
    /**
     * Summary of id
     * @var int
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
     * @param array $data
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
	public function getName(): string
    {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self
    {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getCatchPhrase(): string
    {
		return $this->catchPhrase;
	}
	
	/**
	 * @param string $catchPhrase 
	 * @return self
	 */
	public function setCatchPhrase(string $catchPhrase): self
    {
		$this->catchPhrase = $catchPhrase;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getBs(): string
    {
		return $this->bs;
	}
	
	/**
	 * @param string $bs 
	 * @return self
	 */
	public function setBs(string $bs): self
    {
		$this->bs = $bs;
		return $this;
	}
}
