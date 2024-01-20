<?php

declare(strict_types=1);

namespace App\Fixture;

use App\Factory\CategoryFactory;
use App\Factory\CategoryImageFactory;
use App\Fixture\Data\CategoryData;
use App\Fixture\Data\CategoryImageData;

class CategoryImageFixture implements FixtureInterface
{
    public function __construct(
        private CategoryImageFactory $categoryImageFactory,
    )
    {
    }

    public function generate(): array
    {
        $categoryImages = [];

        foreach (CategoryImageData::get() as $categoryData) {
            $category = $this->categoryImageFactory->createCategoryImage(
                $categoryData["name"],
                $categoryData["categoryName"]
            );

            $categoryImages[] = $category;
        }

        return $categoryImages;
    }
}
