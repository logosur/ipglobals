<?php

namespace App\Domain\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Summary of Post
 */
class Post
{
    /**
     * Summary of id
     * @var int|null
     */
    private ?int $id;

    /**
     * @Assert\Type(type={"string"})
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "This field is too short, min. 5",
     *      maxMessage = "This field is too short, max. 100"
     * )
     * @var string
     */
    private string $title;

    /**
     * @Assert\Type(type={"string"})
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 3,
     *      max = 2000,
     *      minMessage = "This field is too short, min. 3",
     *      maxMessage = "This field is too short, max. 2000"
     * )
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
     * @param array{
     *      "id": int,
     *      "title": string,
     *      "body": string,
     *      "userId": ?int
     * } $data
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
     * @return Post
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
     * @return Post
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
     * @return Post
     */
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Summary of getUserId
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Summary of setUserId
     * @param int|null $userId
     * @return Post
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
