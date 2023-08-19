<?php

namespace App\Doctrine\DataFixtures;

use App\Fixture\CategoryFixture;
use App\Fixture\FixtureInterface;
use App\Fixture\ServiceFixture;
use App\Fixture\SubCategoryFixture;
use App\Fixture\UserFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserFixture $userFixture,
        private readonly CategoryFixture $categoryFixture,
        private readonly SubCategoryFixture $subCategoryFixture,
        private readonly ServiceFixture $serviceFixture,
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        $entitiesFixture = [
            $this->userFixture,
            $this->categoryFixture,
            $this->subCategoryFixture,
            $this->serviceFixture,
        ];

        foreach ($entitiesFixture as $entityFixture) {
            $this->createEntities($entityFixture, $manager);
        }
    }

    private function createEntities(FixtureInterface $fixture, ObjectManager $manager): void
    {
        $objects = $fixture->generate();

        foreach ($objects as $object) {
            $manager->persist($object);
        }

        $manager->flush();
    }
}
