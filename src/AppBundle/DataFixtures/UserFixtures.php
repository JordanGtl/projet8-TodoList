<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->encoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $array = array(
            ['username' => 'admin1', 'password' => 'admin1', 'email' => 'member1@admin.fr', 'role' => 'ROLE_ADMIN'],
            ['username' => 'member1', 'password' => 'member1', 'email' => 'member2@admin.fr', 'role' => 'ROLE_USER'],
            ['username' => 'member2', 'password' => 'member2', 'email' => 'member3@admin.fr', 'role' => 'ROLE_USER'],
            ['username' => 'member3', 'password' => 'member3', 'email' => 'member4@admin.fr', 'role' => 'ROLE_USER'],
        );

        for ($i = 0; $i < 4; $i++)
        {
            $user = new User();
            $user->setUsername($array[$i]['username']);

            $password = $this->encoder->encodePassword($user, $array[$i]['password']);
            $user->setPassword($password);

            $user->setEmail($array[$i]['email']);
            $user->setRole($array[$i]['role']);

            $manager->persist($user);
            // store for usage later as App\Entity\ClassName_#COUNT#
            $this->addReference(User::class . '_' . $i, $user);
        }

        $manager->flush();
    }
}
