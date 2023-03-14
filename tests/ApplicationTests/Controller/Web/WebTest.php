<?php

namespace App\Tests\ApplicationTests\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WebTest extends WebTestCase
{
    public function testHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Blog Ipglobals (By Iván López)');
    }

    public function testItemPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/viewPost/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Blog Ipglobals - View Post (By Iván López)');
    }
}
