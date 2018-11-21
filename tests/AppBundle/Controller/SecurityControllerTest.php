<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\SecurityController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends BaseController
{
    public function testLogin()
    {
        $this->offlineClient('GET', '/login', 200);

        $this->onlineClient('GET', '/login', 200);
    }

    public function testLoginCheck()
    {
        $securityController = new SecurityController();

        $this->assertNull($securityController->loginCheck());
    }

    public function testLogout()
    {
        $securityController = new SecurityController();

        $this->assertNull($securityController->logoutCheck());
    }
}
