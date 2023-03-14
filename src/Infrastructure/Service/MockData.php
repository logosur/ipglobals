<?php

namespace App\Infrastructure\Service;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Summary of MockData
 */
class MockData implements MockDataInterface
{
    private const POST_URL = 'https://jsonplaceholder.typicode.com/posts';

    private const USER_URL = 'https://jsonplaceholder.typicode.com/users';

    /**
     * @var array
     */
    private const POSTS = [
        1 => [
            "userId" => 1,
            "id" => 1,
            "title" => "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            "body" => "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
        ],
        2 => [
            "userId" => 1,
            "id" => 2,
            "title" => "qui est esse",
            "body" => "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla",
        ],
        3 => [
            "userId" => 2,
            "id" => 3,
            "title" => "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            "body" => "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut",
        ],
        4 => [
            "userId" => 3,
            "id" => 4,
            "title" => "eum et est occaecati",
            "body" => "ullam et saepe reiciendis voluptatem adipisci\nsit amet autem assumenda provident rerum culpa\nquis hic commodi nesciunt rem tenetur doloremque ipsam iure\nquis sunt voluptatem rerum illo velit",
        ],
    ];

    /**
     * @var array
     */
    private const USERS = [
        1 => [
            "id" => 1,
            "name" => "Leanne Graham",
            "username" => "Bret",
            "email" => "Sincere@april.biz",
            "address" => [
                "id" => 1,
                "street" => "Kulas Light",
                "suite" => "Apt. 556",
                "city" => "Gwenborough",
                "zipcode" => "92998-3874",
                "geo" => [
                    "lat" => "-37.3159",
                    "lng" => "81.1496",
                ],
            ],
            "phone" => "1-770-736-8031 x56442",
            "website" => "hildegard.org",
            "company" => [
                "id" => 1,
                "name" => "Romaguera-Crona",
                "catchPhrase" => "Multi-layered client-server neural-net",
                "bs" => "harness real-time e-markets",
            ],
        ],
        2 => [
            "id" => 2,
            "name" => "Ervin Howell",
            "username" => "Antonette",
            "email" => "Shanna@melissa.tv",
            "address" => [
                "id" => 2,
                "street" => "Victor Plains",
                "suite" => "Suite 879",
                "city" => "Wisokyburgh",
                "zipcode" => "90566-7771",
                "geo" => [
                    "lat" => "-43.9509",
                    "lng" => "-34.4618",
                ],
            ],
            "phone" => "010-692-6593 x09125",
            "website" => "anastasia.net",
            "company" => [
                "id" => 2,
                "name" => "Deckow-Crist",
                "catchPhrase" => "Proactive didactic contingency",
                "bs" => "synergize scalable supply-chains",
            ],
        ],
        3 => [
            "id" => 3,
            "name" => "Clementine Bauch",
            "username" => "Samantha",
            "email" => "Nathan@yesenia.net",
            "address" => [
                "id" => 3,
                "street" => "Douglas Extension",
                "suite" => "Suite 847",
                "city" => "McKenziehaven",
                "zipcode" => "59590-4157",
                "geo" => [
                    "lat" => "-68.6102",
                    "lng" => "-47.0653",
                ],
            ],
            "phone" => "1-463-123-4447",
            "website" => "ramiro.info",
            "company" => [
                "id" => 3,
                "name" => "Romaguera-Jacobson",
                "catchPhrase" => "Face to face bifurcated interface",
                "bs" => "e-enable strategic applications",
            ],
        ],
    ];

    /**
     * Summary of client
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;

    /**
     * Summary of __construct
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->client = $httpClient;
    }

    /**
     * Summary of getPosts
     * @return array
     */
    public function getPosts(): array
    {
        return self::POSTS;
        //return $this->fetchPHApi(self::POST_URL);
    }

    /**
     * Summary of getUsers
     * @return array
     */
    public function getUsers(): array
    {
        return self::USERS;
        //return $this->fetchPHApi(self::USER_URL);
    }

    /**
     * Summary of getPost
     * @param int $id
     * @throws \Exception
     * @return array
     */
    public function getPost(int $id): array
    {
        if (! isset(self::POSTS[$id])) {
            throw new \Exception('Post not found.');
        }

        return self::POSTS[$id];
        //return $this->fetchPHApi(self::POST_URL . '/' . $id);
    }

    /**
     * Summary of getUser
     * @param int $id
     * @throws \Exception
     * @return array
     */
    public function getUser(int $id): array
    {
        if (!isset(self::USERS[$id])) {
            throw new \Exception('User not found.');
        }

        return self::USERS[$id];
        //return $this->fetchPHApi(self::USER_URL . '/' . $id);
    }

    /**
     * Summary of fetchPHApi
     * @param string $url
     * @return array
     */
    private function fetchPHApi(string $url): array
    {
        $response = $this->client->request(
            'GET',
            $url,
            [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]
        );

        return (array)json_decode($response->getContent());
    }
}
