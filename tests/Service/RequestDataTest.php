<?php
namespace Tests\Services;

use PHPUnit\Framework\TestCase;
use App\Presentation\Service\RequestDataInterface;
use App\Domain\Dto\PostDto;
use App\Domain\Model\Post;
use App\Domain\Model\User;

class RequestDataTest extends TestCase
{
    public function testFecthAllPosts()
    {
        $requestDataService = $this->createMock(RequestDataInterface::class);
        
        $posts = $requestDataService->fetchPosts();
        $this->assertIsArray($posts, "Post list is not an array.");
        $this->assertContainsOnlyInstancesOf(PostDto::class, $posts, "Post list don't contain PostDto items");
    }

    public function testFecthPost()
    {
        $requestDataService = $this->createMock(RequestDataInterface::class);
        
        $post = $requestDataService->fetchPost(1);
        $this->assertInstanceOf(PostDto::class, $post, "Post is not a PostDto class");
    }

    public function testFecthAllUsers()
    {
        $requestDataService = $this->createMock(RequestDataInterface::class);
        
        $posts = $requestDataService->fetchUsers();
        $this->assertIsArray($posts, "User list is not an array.");
        $this->assertContainsOnlyInstancesOf(User::class, $posts, "User list don't contain User items");
    }

    public function testFecthUser()
    {
        $requestDataService = $this->createMock(RequestDataInterface::class);
        
        $user = $requestDataService->fetchUser(1);
        $this->assertInstanceOf(User::class, $user, "User is not a User class");
    }
}
