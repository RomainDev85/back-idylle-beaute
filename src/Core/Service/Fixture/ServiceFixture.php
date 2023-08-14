<?php

declare(strict_types=1);

namespace App\Core\Service\Fixture;

use App\Core\FixtureInterface;
use App\Core\Service\Factory\ServiceFactory;
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
            $service = $this->serviceFactory->createService($serviceData["name"], $category, $serviceData["price"]);

            $services[] = $service;
        }

        return $services;
    }
}