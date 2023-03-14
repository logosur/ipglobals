<?php

namespace App\Application\Service;

use App\Domain\Dto\PostDto;
use App\Domain\Model\User;

/**
 * Summary of RequestDataInterface
 */
interface RequestDataInterface
{
    /**
     * @return PostDto[]
     */
    public function fetchPosts(): array;

    /**
     * Summary of fetchPost
     * @param int $id
     * @return PostDto
     */
    public function fetchPost(int $id): PostDto;

    /**
     * @return User[]
     */
    public function fetchUsers(): array;

    /**
     * @param int $id
     * @return User
     */
    public function fetchUser(int $id): User;
}
