<?php

namespace App\Infrastructure\Service;

/**
 * Summary of MockDataInterface
 */
interface MockDataInterface
{
    /**
     * Summary of getPosts
     * @return self::POSTS
     */
    public function getPosts(): array;

    /**
     * Summary of getUsers
     * @return self::USERS
     */
    public function getUsers(): array;

    /**
     * Summary of getPost
     * @param int $id
     * @throws \Exception
     * @return array{
     *          "userId": int,
     *          "id": int,
     *          "title": string,
     *          "body": string
     *      }
     */
    public function getPost(int $id): array;

    /**
     * Summary of getUser
     * @param int $id
     * @throws \Exception
     * @return array{
     *      "id": int,
     *      "username": string,
     *      "email": string,
     *      "phone": string,
     *      "website": string,
     *      "address": array{
     *          "id": int,
     *          "street": string,
     *          "city": string,
     *          "zipcode": string,
     *          "geo": array{
     *              "lat": float,
     *              "lng": float
     *          }
     *      },
     *      "company": array{
     *          "id": int,
     *          "name": string,
     *          "catchPhrase": string,
     *          "bs": string,
     *      }
     * }
     */
    public function getUser(int $id): array;

}
