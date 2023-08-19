<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\SubCategory;
use App\Entity\SubService;

class SubServiceFactory
{
    public function createSubService(
        string $name,
        SubCategory $subCategory,
        int $price = null,
        string $description = null,
        int $duration = null,
        string $image = null,
    ): SubService
    {
        $subService = new SubService();

        $subService->setName($name);
        $subService->setSubCategory($subCategory);

        if ($description) $subService->setDescription($description);
        if ($price) $subService->setPrice($price);
        if ($duration) $subService->setDuration($duration);
        if ($image) $subService->setImage($image);

        return $subService;
    }
}