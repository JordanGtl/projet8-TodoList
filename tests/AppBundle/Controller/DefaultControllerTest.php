<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends BaseController
{
    public function testIndex()
    {
        $this->offlineClient('GET', '/', 302);

        $this->onlineClient('GET', '/', 200);

        //$this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }
}
