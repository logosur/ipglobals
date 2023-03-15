<?php

namespace App\Tests\ApplicationTests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class BlogApiTest extends WebTestCase
{
    public function testgGetPostList(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/list');

        $this->assertResponseIsSuccessful();
    }

    public function testFailedGetPostItem(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/item/1000');

        $this->assertNotEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testSuccessfulGetPostItem(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/item/1');

        $this->assertResponseIsSuccessful();
    }

    public function testSuccessfulGetUser(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/user/1');

        $this->assertResponseIsSuccessful();
    }

    public function testFailedGetUser(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/user/1000');

        $this->assertNotEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testSuccessfulPost(): void
    {
        $client = static::createClient();
        $crawler = $client->request(
            'POST',
            '/api/item', [
                'post_form' => [
                    'title' => 'test title',
                    'body' => 'test body',
                ],
            ],
        );

        $this->assertResponseIsSuccessful();
    }

    public function testFailedPostTitle(): void
    {
        $client = static::createClient();
        $crawler = $client->request(
            'POST',
            '/api/item', [
                'post_form' => [
                    'title' => 'te',
                    'body' => 'test body',
                ],
            ],
        );

        $this->assertNotEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
  
    public function testFailedPostBody(): void
    {
        $client = static::createClient();
        $crawler = $client->request(
            'POST',
            '/api/item', [
                'post_form' => [
                    'title' => 'test title',
                    'body' => 'te',
                ],
            ],
        );

        $this->assertNotEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testEmptyPost(): void
    {
        $client = static::createClient();
        $crawler = $client->request(
            'POST',
            '/api/item', [
            ],
        );

        $this->assertNotEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
