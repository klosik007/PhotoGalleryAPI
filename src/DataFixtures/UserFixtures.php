<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName("Przemysław Kłos");
        $user->setDescription("mój opis");
        $user->setAvatar(null);
        $user->setNickname("call_me_przemo");

        $user2 = new User();
        $user2->setName("Iwona Kłos");
        $user2->setDescription("mój opis vol2");
        $user2->setAvatar(null);
        $user2->setNickname("geogeo465");

        $user3 = new User();
        $user3->setName("Tomasz Kłos");
        $user3->setDescription("mój opis vol3");
        $user3->setAvatar(null);
        $user3->setNickname("elektrykjk");

        $user->addFollower($user2);
        $user->addFollower($user3);

        $user2->addFollower($user3);

        $user3->addFollowing($user);

        $manager->persist($user);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->flush();
    }
}
