<?php

declare(strict_types=1);

namespace App\Fixture;

use App\Factory\ServiceFactory;
use App\Fixture\Data\ServiceData;
use App\Repository\CategoryRepository;

class ServiceFixture implements FixtureInterface
{
    public function __construct(
        private ServiceFactory $serviceFactory,
        private CategoryRepository $categoryRepository,
    )
    {
    }

    public function generate(): array
    {
        $services = [];

        foreach (ServiceData::get() as $serviceData) {
            $category = $this->categoryRepository->findOneBy(["name" => $serviceData["categoryName"]]);
            $service = $this->serviceFactory->createService($serviceData["name"], $category, $serviceData["price"], $serviceData["description"], $serviceData["duration"]);

            $services[] = $service;
        }

        return $services;
    }
}