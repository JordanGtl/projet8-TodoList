<?php
namespace App\Tests\Entity;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTest extends WebTestCase
{
    /** @var User $user */
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testIdIsNull()
    {
        $this->assertNull($this->user->getId());
    }

    public function testUsernameIsNull()
    {
        $this->assertNull($this->user->getUsername());
    }

    public function testUsernameIsNotNull()
    {
        $this->user->setUsername('username');

        $this->assertEquals('username', $this->user->getUsername());
    }

    public function testPasswordIsNull()
    {
        $this->assertNull($this->user->getPassword());
    }

    public function testPasswordIsNotNull()
    {
        $this->user->setPassword('password');

        $this->assertEquals('password', $this->user->getPassword());
    }

    public function testEmailIsNull()
    {
        $this->assertNull($this->user->getEmail());
    }

    public function testEmailIsNotNull()
    {
        $this->user->setEmail('email');

        $this->assertEquals('email', $this->user->getEmail());
    }

    public function testRoleIsEmpty()
    {
        $this->assertCount(1, $this->user->getRoles());

        $this->assertEquals('ROLE_USER', $this->user->getRole());
    }

    public function testRoleIsNotNull()
    {
        $this->user->setRole('ROLE_ADMIN');

        $this->assertCount(1, $this->user->getRoles());

        $this->assertEquals('ROLE_ADMIN', $this->user->getRole());
    }


}
?>