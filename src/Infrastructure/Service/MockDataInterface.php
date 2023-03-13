<?php

namespace App\Infrastructure\Service;

/**
 * Summary of MockDataInterface
 */
interface MockDataInterface
{
    /**
     * Summary of getPosts
     * @return array
     */
    public function getPosts(): array;

    /**
     * Summary of getUsers
     * @return array
     */
    public function getUsers(): array;

    /**
     * Summary of getPost
     * @param int $id
     * @return array
     */
    public function getPost(int $id): array;

    /**
     * Summary of getUser
     * @param int $id
     * @return array
     */
    public function getUser(int $id): array;

}
