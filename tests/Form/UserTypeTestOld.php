<?php
// tests/Form/Type/TestedTypeTest.php
namespace App\Tests\Form;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\Form\Test\TypeTestCase;

class UserTypeTest extends TypeTestCase
{
    /*public function testSubmitValidData()
    {
        $formData = array(
            'username' => 'member1u',
            'password' => ['first' => 'member1p', 'second' => 'member1p'],
            'email' => 'member1@member1.fr',
            'role' => 'ROLE_USER',
        );

        $objectToCompare = new User();
        // $objectToCompare will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(UserType::class, $objectToCompare);

        $object = new User();
        $object->setUsername($formData['username']);
        $object->setPassword($formData['password']);
        $object->setEmail($formData['email']);
        $object->setRole($formData['role']);
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
    }*/
}