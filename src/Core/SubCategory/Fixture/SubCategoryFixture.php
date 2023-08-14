<?php

declare(strict_types=1);

namespace App\Core\SubCategory\Fixture;

use App\Core\FixtureInterface;
use App\Core\SubCategory\Factory\SubCategoryFactory;
use App\Entity\Category;
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