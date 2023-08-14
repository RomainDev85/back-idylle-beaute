<?php

declare(strict_types=1);

namespace App\Core\Category\Fixture;

use App\Core\Category\Factory\CategoryFactory;
use App\Core\FixtureInterface;

class CategoryFixture implements FixtureInterface
{
    public function __construct(
        private CategoryFactory $categoryFactory,
    )
    {
    }

    public function generate(): array
    {
        $categories = [];

        foreach (CategoryData::get() as $categoryData) {
            $category = $this->categoryFactory->createCategory(
                $categoryData["name"],
                $categoryData["image"],
                $categoryData["description"]
            );

            $categories[] = $category;
        }

        return $categories;
    }
}