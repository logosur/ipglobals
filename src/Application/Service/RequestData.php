<?php

namespace App\Application\Service;

use App\Domain\Dto\PostDto;
use App\Domain\Model\Post;
use App\Domain\Model\User;
use App\Infrastructure\Service\MockDataInterface;

/**
 * Summary of RequestData
 */
class RequestData implements RequestDataInterface
{
    /**
     * Summary of mockData
     */
    private MockDataInterface $mockData;

    public function __construct(MockDataInterface $MockData)
    {
        $this->mockData = $MockData;
    }

    /**
     * @return PostDto[]
     */
    public function fetchPosts(): array
    {
        $postsDto = [];
        $users = [];
        $posts = $this->mockData->getPosts();

        foreach ($posts as $id => $post) {
            $post = (array) $post;
            $userId = $post['userId'];

            // Cache users to avoid redundant requests.
            if (!isset($users[$userId])) {
                $user = (array) $this->mockData->getUser($userId);
                $users[$userId] = (new User())->fromArray($user);
            }
            
            $postsDto[] = new PostDto(
                (new Post())->fromArray($post),
                $users[$userId]
            );
        }

        return $postsDto;
    }


    /**
     * Summary of fetchPost
     * @param int $id
     * @return PostDto
     */
    public function fetchPost(int $id): PostDto
    {
        $post = $this->mockData->getPost($id);
        $user = $this->mockData->getUser($post['userId']);
        $users[$post['userId']] = (new User())->fromArray($user);

        return new PostDto(
            (new Post())->fromArray($post),
            $users[$post['userId']]
        );
    }

    /**
     * @return User[]
     */
    public function fetchUsers(): array
    {
        $usersArr = [];
        $users = $this->mockData->getUsers();

        foreach ($users as $id => $user) {
            $usersArr[] = (new User())->fromArray($user);
        }

        return $usersArr;
    }

    /**
     * @param int $id
     * @return User
     */
    public function fetchUser(int $id): User
    {
        return (new User())->fromArray($this->mockData->getUser($id));
    }
}
