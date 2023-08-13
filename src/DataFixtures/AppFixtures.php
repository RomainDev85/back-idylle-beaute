<?php

namespace App\DataFixtures;

use App\Service\User\Fixture\UserFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserFixture $userFixture,
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user = $this->userFixture->generateAdmin();

        $manager->persist($user);
        $manager->flush();
    }
}
