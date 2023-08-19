<?php

declare(strict_types=1);

namespace App\Fixture;

use App\Factory\SubServiceFactory;
use App\Fixture\Data\SubServiceData;
use App\Repository\SubCategoryRepository;

class SubServiceFixture implements FixtureInterface
{
    public function __construct(
        private readonly SubServiceFactory $subServiceFactory,
        private readonly SubCategoryRepository $subCategoryRepository,
    )
    {
    }

    public function generate(): array
    {
        $subServices = [];

        foreach (SubServiceData::get() as $subServiceData) {
            $subCategory = $this->subCategoryRepository->findOneBy(["name" => $subServiceData["subCategoryName"]]);
            $subService = $this->subServiceFactory->createSubService($subServiceData["name"], $subCategory, $subServiceData["price"], $subServiceData["description"], $subServiceData["duration"]);

            $subServices[] = $subService;
        }

        return $subServices;
    }
}