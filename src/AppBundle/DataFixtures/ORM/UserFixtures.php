<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        
        $manager->persist($admin);
        $manager->flush();
    }

}
