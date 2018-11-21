<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends BaseController
{
    private $userid;

    public function setUp()
    {
        parent::setUp();

        $page = $this->onlineAdmin('GET', '/users', 200);

        $this->userid = explode('/', $page->filter('.btn-sm')->getNode(0)->getAttribute('href'))[2];
    }

    public function testUserList()
    {
        $this->offlineClient('GET', '/users', 302);
        $this->onlineClient('GET', '/users', 403);
        $this->onlineAdmin('GET', '/users', 200);
    }

    public function testUserCreate()
    {
        $this->offlineClient('GET', '/users/create', 302);
        $this->onlineClient('GET', '/users/create', 403);

        $this->onlineAdmin('GET', '/users/create', 200);

        $crawler = $this->onlineAdminForm('/users/create', array(
            'user[password][first]'    => 'test',
            'user[password][second]'   => 'test',
            'user[username]'           => 'test',
            'user[email]'              => 'test@test.fr',
            'user[role]'               => 'ROLE_USER',
        ));

        $this->assertEquals(1, $crawler->filter('html:contains("L\'utilisateur a bien été ajouté.")')->count());
    }

    public function testUserEdit()
    {
        $this->offlineClient('GET', '/users/5/edit', 302);
        $this->onlineClient('GET', '/users/5/edit', 403);
        $this->onlineAdmin('GET', '/users/5/edit', 200);

        $crawler = $this->onlineAdminForm('/users/5/edit', array(
            'user[password][first]'    => 'test2',
            'user[password][second]'   => 'test2',
            'user[username]'           => 'test2',
            'user[email]'              => 'test2@test2.fr',
            'user[role]'               => 'ROLE_USER',
        ));

        $this->assertEquals(1, $crawler->filter('html:contains("L\'utilisateur a bien été modifié")')->count());
    }
}
