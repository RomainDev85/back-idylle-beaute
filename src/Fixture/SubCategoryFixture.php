<?php

declare(strict_types=1);

namespace App\Fixture;

use App\Entity\Category;
use App\Factory\SubCategoryFactory;
use App\Fixture\Data\SubCategoryData;
use App\Repository\CategoryRepository;

class SubCategoryFixture implements FixtureInterface
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly SubCategoryFactory $subCategoryFactory,
    )
    {
    }

    public function generate(): array
    {
        $categories = [];

        foreach (SubCategoryData::get() as $subCategoryData) {
            $category = $this->getCategory($subCategoryData["categoryName"]);
            $subCategory = $this->subCategoryFactory->createSubCategory($subCategoryData["name"], $category);

            $categories[] = $subCategory;
        }

        return $categories;
    }

    private function getCategory(string $name): ?Category
    {
        return $this->categoryRepository->findOneBy(["name" => $name]);
    }
}