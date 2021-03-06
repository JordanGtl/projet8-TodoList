<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    private $encoder;

    public function __construct()
    {
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 30; $i++)
        {
            $task = new Task();
            $task->setTitle($faker->text(30));
            $task->setContent($faker->text(200));
            $task->setCreatedAt($faker->dateTimeBetween('-100 days', 'now'));

            if($i == 0)
                $task->setUser(null);
            else if($i == 1)
                $task->setUser($this->getReference('AppBundle\Entity\User_2'));
            else
                $task->setUser((rand(1, 5) > 2) ? $this->getReference('AppBundle\Entity\User_'.rand(0, 3)) : null);

            $manager->persist($task);
            // store for usage later as App\Entity\ClassName_#COUNT#
            $this->addReference(Task::class . '_' . $i, $task);

        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
