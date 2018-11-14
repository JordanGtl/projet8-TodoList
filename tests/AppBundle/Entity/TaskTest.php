<?php
namespace App\Tests\Entity;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskTest extends WebTestCase
{
    /** @var Task $task */
    private $task;

    public function setUp()
    {
        $this->task = new Task();
    }

    public function testIdIsNull()
    {
        $this->assertNull($this->task->getId());
    }

    public function testDateIsEmpty()
    {
        $this->assertInstanceOf('\DateTime', $this->task->getCreatedAt());
    }

    public function testDateIsNotEmpty()
    {
        $this->task->setCreatedAt(new \DateTime('now'));

        $this->assertInstanceOf('\DateTime', $this->task->getCreatedAt());
    }

    public function testTitleIsNull()
    {
        $this->assertNull($this->task->getTitle());
    }

    public function testTitleIsNotNull()
    {
        $this->task->setTitle('title test');

        $this->assertEquals('Title test', $this->task->getTitle());
    }

    public function testContentIsNull()
    {
        $this->assertNull($this->task->getContent());
    }

    public function testContentIsNotNull()
    {
        $this->task->setTitle('Content test');

        $this->assertEquals('Content test', $this->task->getContent());
    }

    public function testDoneIsEmpty()
    {
        $this->assertFalse($this->task->isDone());
    }

    public function testDonetIsNotEmpty()
    {
        $this->task->toggle(true);

        $this->assertTrue($this->task->isDone());
    }

    public function testUserIsNull()
    {
        $this->assertNull($this->task->getUser());
    }

    public function testUserIsNotNull()
    {
        $this->task->setUser(new User());

        $this->assertInstanceOf(User::class, $this->task->getUser());
    }
}
?>