<?php
// tests/Form/Type/TestedTypeTest.php
namespace App\Tests\Form;

use AppBundle\Form\TaskType;
use AppBundle\Entity\Task;
use Symfony\Component\Form\Test\TypeTestCase;

class TaskTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            'title' => 'title test',
            'content' => 'content test',
        );

        $date = new \DateTime();

        $objectToCompare = new Task();
        // $objectToCompare will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(TaskType::class, $objectToCompare);
        $objectToCompare->setCreatedAt($date);

        $object = new Task();
        $object->setTitle($formData['title']);
        $object->setContent($formData['content']);
        $object->setCreatedAt($date);
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());

        // check that $objectToCompare was modified as expected when the form was submitted
        $this->assertEquals($object, $objectToCompare);

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}