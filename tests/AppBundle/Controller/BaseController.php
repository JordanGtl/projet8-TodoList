<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseController extends WebTestCase
{
    public function offlineClient($method, $url, $code)
    {
        $client = static::createClient();

        $crawler = $client->request($method, $url);

        $this->assertEquals($code, $client->getResponse()->getStatusCode());

        return $crawler;
        //$this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function onlineClient($method, $url, $code, $data = array())
    {
        $client = static::createClient( array (), array (
            'PHP_AUTH_USER' => 'member1' ,
            'PHP_AUTH_PW'   => 'member1' ,
        ));

        $crawler = $client->request($method, $url, $data);


        $this->assertEquals($code, $client->getResponse()->getStatusCode());

        return $crawler;
        //$this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function onlineAdmin($method, $url, $code, $data = array())
    {
        $client = static::createClient( array (), array (
            'PHP_AUTH_USER' => 'admin1' ,
            'PHP_AUTH_PW'   => 'admin1' ,
        ));

        $crawler = $client->request($method, $url, $data);


        $this->assertEquals($code, $client->getResponse()->getStatusCode());

        return $crawler;
        //$this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function onlineForm($url, $data = array())
    {
        $client = static::createClient( array (), array (
            'PHP_AUTH_USER' => 'member1' ,
            'PHP_AUTH_PW'   => 'member1' ,
        ));

        $crawler = $client->request('GET', $url);

        $buttonCrawlerNode = $crawler->filter('button[type="submit"]');
        $form = $buttonCrawlerNode->form($data);
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();

        return $crawler;
    }

    public function onlineAdminForm($url, $data = array())
    {
        $client = static::createClient( array (), array (
            'PHP_AUTH_USER' => 'admin1' ,
            'PHP_AUTH_PW'   => 'admin1' ,
        ));

        $crawler = $client->request('GET', $url);

        $buttonCrawlerNode = $crawler->filter('button[type="submit"]');
        $form = $buttonCrawlerNode->form($data);
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();

        return $crawler;
    }
}
