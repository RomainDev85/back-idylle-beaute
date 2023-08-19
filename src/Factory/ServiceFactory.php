<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Category;
use App\Entity\Service;

class ServiceFactory
{
    public function createService(
        string $name,
        Category $category,
        int $price,
        ?string $description = null,
        ?int $duration = null,
        ?string $image = null,
    ): Service
    {
        $service = new Service();

        $service->setName($name);
        $service->setCategory($category);
        $service->setPrice($price);
        $service->setDescription($description);
        $service->setImage($image);
        $service->setDuration($duration);

        return $service;
    }
}