<?php

namespace App\Domain\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Summary of Post
 */
class Post
{
    /**
     * @var int
     */
    private int $id;

    /**
	 * @Assert\Type(type={"string"})
     * @var string
     */
    private string $title;

    /**
	 * @Assert\Type(type={"string"})
     * @var string
     */
    private string $body;
    
	/**
	 * Summary of userId
	 * @var int
	 */
	private ?int $userId;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
    }

    /**
     * Summary of fromArray
     * @param array $data
     * @return Post
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->body = $data['body'];
		$this->userId = $data['userId'] ?? null;

        return $this;
    }

	/**
	 * 
	 * @return int|null
	 */
	public function getId(): ?int
    {
		return $this->id;
	}
	
	/**
	 * 
	 * @param int $id|null
	 * @return self
	 */
	public function setId(?int $id): self
    {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getTitle(): string
    {
		return $this->title;
	}
	
	/**
	 * 
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self
    {
		$this->title = $title;
		return $this;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getBody(): string
    {
		return $this->body;
	}
	
	/**
	 * 
	 * @param string $body 
	 * @return self
	 */
	public function setBody(string $body): self
    {
		$this->body = $body;
		return $this;
	}


	/**
	 * @return int|null
	 */
	public function getUserId(): ?int
	{
		return $this->userId;
	}
	
	/**
	 * @param int|null $userId
	 * @return self
	 */
	public function setUserId(?int $userId): self
	{
		$this->userId = $userId;
		
		return $this;
	}
}