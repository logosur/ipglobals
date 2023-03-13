<?php

namespace App\Domain\Dto;

use App\Domain\Model\Post;
use App\Domain\Model\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Summary of PostDto
 */
class PostDto
{
    /**
     * Summary of id
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
     * Summary of user
     * @var User
     */
    private User $user;

    /**
     * Summary of __construct
     * @param Post $post|null
     * @param User $user|null
     */
    public function __construct(?Post $post = null, ?User $user = null)
    {
        if (! is_null($post) && ! is_null($user)) {
            $this->id = $post->getId();
            $this->title = $post->getTitle();
            $this->body = $post->getBody();
            $this->user = $user;
        }
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


    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }


    public function getBody(): string
    {
        return $this->body;
    }


    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }


    public function getUser(): User
    {
        return $this->user;
    }


    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }
}
