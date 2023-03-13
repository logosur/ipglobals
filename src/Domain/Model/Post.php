<?php

namespace App\Domain\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Summary of Post
 */
class Post
{
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
     */
    public function fromArray(array $data): self
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->body = $data['body'];
        $this->userId = $data['userId'] ?? null;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function setId(?int $id): self
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


    public function getUserId(): ?int
    {
        return $this->userId;
    }


    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
