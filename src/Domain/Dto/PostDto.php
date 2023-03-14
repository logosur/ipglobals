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
     * @var int|null
     */
    private ?int $id;

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

    /**
     * Summary of getId
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Summary of setId
     * @param int|null $id
     * @return PostDto
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Summary of getTitle
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Summary of setTitle
     * @param string $title
     * @return PostDto
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Summary of getBody
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Summary of setBody
     * @param string $body
     * @return PostDto
     */
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Summary of getUser
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Summary of setUser
     * @param User $user
     * @return PostDto
     */
    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }
}
