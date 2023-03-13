<?php

namespace App\Domain\Dto;

use App\Domain\Model\Post;
use App\Domain\Model\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Summary of PostDto
 */
final class PostDto
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
     * @var User
     */
    private User $user;

    /**
     * Summary of __construct
     * @param Post $post
     * @param User $user
     */
    public function __construct(?Post $post = null, ?User $user = null)
    {
		if ($post && $user) {
			$this->id = $post->getId();
			$this->title = $post->getTitle();
			$this->body = $post->getBody();
			$this->user = $user;
		}
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
	public function getTitle(): string
    {
		return $this->title;
	}
	
	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self
    {
		$this->title = $title;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getBody(): string
    {
		return $this->body;
	}
	
	/**
	 * @param string $body 
	 * @return self
	 */
	public function setBody(string $body): self
    {
		$this->body = $body;
		return $this;
	}

	/**
	 * 
	 * @return User
	 */
	public function getUser(): User
	{
		return $this->user;
	}
	
	/**
	 * 
	 * @param User $user 
	 * @return self
	 */
	public function setUser(User $user): self
	{
		$this->user = $user;
		return $this;
	}
}
