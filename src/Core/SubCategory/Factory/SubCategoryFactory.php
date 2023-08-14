<?php

declare(strict_types=1);

namespace App\Core\SubCategory\Factory;

use App\Entity\Category;
use App\Entity\SubCategory;

class SubCategoryFactory
{
    public function createSubCategory(
        string $name,
        Category $category,
        string $description = null,
        string $image = null,
        int $price = null,
        int $duration = null,
    ): SubCategory
    {
        $subCategory = new SubCategory();

        $subCategory->setName($name);
        $subCategory->setCategory($category);

        if ($description) $subCategory->setDescription($description);
        if ($image) $subCategory->setImage($image);
        if ($price) $subCategory->setPrice($price);
        if ($duration) $subCategory->setDuration($duration);

        return $subCategory;
    }
}