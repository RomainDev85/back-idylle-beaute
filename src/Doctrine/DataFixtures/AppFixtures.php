<?php

namespace App\Doctrine\DataFixtures;

use App\Fixture\CategoryFixture;
use App\Fixture\CategoryImageFixture;
use App\Fixture\FixtureInterface;
use App\Fixture\ServiceFixture;
use App\Fixture\SubCategoryFixture;
use App\Fixture\SubServiceFixture;
use App\Fixture\UserFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(
//        private readonly UserFixture $userFixture,
        private readonly CategoryFixture $categoryFixture,
        private readonly CategoryImageFixture $categoryImageFixture,
        private readonly SubCategoryFixture $subCategoryFixture,
        private readonly ServiceFixture $serviceFixture,
        private readonly SubServiceFixture $subServiceFixture,
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        $entitiesFixture = [
//            $this->userFixture,
            $this->categoryFixture,
            $this->categoryImageFixture,
            $this->subCategoryFixture,
            $this->serviceFixture,
            $this->subServiceFixture,
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
