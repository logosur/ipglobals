<?php
namespace App\Tests\IntegrationTests\Service;

use PHPUnit\Framework\TestCase;
use App\Presentation\Service\RequestData;
use App\Infrastructure\Service\MockDataInterface;
use App\Domain\Dto\PostDto;
use App\Domain\Model\User;

class RequestDataTest extends TestCase
{
    public function testFecthAllPosts()
    {
        $mockDataService = $this->createMock(MockDataInterface::class);
        
        $mockDataService
            ->expects(self::exactly(1))
            ->method('getUser')
            ->will($this->returnValue([
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
            ])
        );

        $mockDataService
            ->expects(self::exactly(1))
            ->method('getPosts')
            ->will($this->returnValue([
                1 => [
                    "userId" => 1,
                    "id" => 1,
                    "title" => "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
                    "body" => "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
                ]
            ])
        );

        $requestDataService = new RequestData($mockDataService);
        $posts = $requestDataService->fetchPosts();
        $this->assertContainsOnlyInstancesOf(PostDto::class, $posts, "Post list don't contain PostDto items");
    }

    public function testFecthPost()
    {
        $mockDataService = $this->createMock(MockDataInterface::class);
        
        $mockDataService
            ->expects(self::exactly(1))
            ->method('getUser')
            ->will($this->returnValue([
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
            ])
        );

        $mockDataService
            ->expects(self::exactly(1))
            ->method('getPost')
            ->with($this->equalTo(1))
            ->will($this->returnValue([
                "userId" => 1,
                "id" => 1,
                "title" => "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
                "body" => "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
            ])
        );

        $requestDataService = new RequestData($mockDataService);
        $post = $requestDataService->fetchPost(1);
        $this->assertInstanceOf(PostDto::class, $post, "Post is not a PostDto class");
    }

    public function testFecthUser()
    {
        $mockDataService = $this->createMock(MockDataInterface::class);
        
        $mockDataService
            ->expects(self::exactly(1))
            ->method('getUser')
            ->with($this->equalTo(1))
            ->will($this->returnValue([
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
            ])
        );

        $requestDataService = new RequestData($mockDataService);
        $user = $requestDataService->fetchUser(1);
        $this->assertInstanceOf(User::class, $user, "User is not a User class");
    }

}
