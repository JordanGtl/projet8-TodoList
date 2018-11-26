<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends BaseController
{
    private $taskid;
    private $taskowner;

    public function setUp()
    {
        parent::setUp();

        $this->taskid = 0;
        $this->taskowner = 0;

        $page = $this->onlineClient('GET', '/tasks', 200);

        $this->taskid = explode('/', $page->filter('.thumbnail div form')->attr('action'))[2];
        $this->taskowner = explode('/', $page->filter('.btn-danger')->getNode(1)->parentNode->getAttribute('action'))[2];
    }

    public function testTaskList()
    {
        $this->offlineClient('GET', '/tasks', 302);

        $page = $this->onlineClient('GET', '/tasks', 200);
    }

    public function testTaskCreate()
    {
        $this->offlineClient('GET', '/tasks/create', 302);

        $page = $this->onlineClient('GET', '/tasks/create', 200);

        $this->assertContains('Title', $page->filter('.control-label')->text());

        ////////////////////////////////////////////////////
         $crawler = $this->onlineForm('/tasks/create', array(
                   'task[content]'    => 'Content Ft',
                   'task[title]'      => 'Title Ft',
               ));

        $this->assertEquals(1, $crawler->filter('html:contains("La tâche a été bien été ajoutée.")')->count());
    }

    public function testTaskEdit()
    {
        $this->offlineClient('GET', '/tasks/'.$this->taskid.'/edit', 302);

        $page = $this->onlineClient('GET', '/tasks/'.$this->taskid.'/edit', 200);

        $this->assertContains('Title', $page->filter('.control-label')->text());

        $crawler = $this->onlineForm('/tasks/'.$this->taskid.'/edit', array(
            'task[content]'    => 'Content Ft',
            'task[title]'      => 'Title Ft',
        ));

        $this->assertEquals(1, $crawler->filter('html:contains("La tâche a bien été modifiée.")')->count());
    }

    public function testTaskToggle()
    {
        $this->offlineClient('GET', '/tasks/'.$this->taskid.'/toggle', 302);

        $page = $this->onlineClient('GET', '/tasks/'.$this->taskid.'/toggle', 302);
    }

    public function testTaskDelete()
    {
        $this->onlineClient('GET', '/tasks/1/delete', 302);

        $this->onlineClient('GET', '/tasks/2/delete', 302);

        $this->onlineClient('GET', '/tasks/'.$this->taskid.'/delete', 302);

        $this->onlineAdmin('GET', '/tasks/'.$this->taskid.'/delete', 302);
    }
}
