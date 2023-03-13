<?php

namespace App\Infrastructure\Service;

/**
 * Summary of MockDataInterface
 */
interface MockDataInterface
{
    /**
     * @return array
     */
    public function getPosts(): array;

    /**
     * @return array
     */
    public function getUsers(): array;

    /**
     * @param int $id
     * @return array
     */
    public function getPost(int $id): array;

    /**
     * @param int $id
     * @return array
     */
    public function getUser(int $id): array;
}
