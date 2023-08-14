<?php

declare(strict_types=1);

namespace App\Core\Service\Factory;

use App\Entity\Category;
use App\Entity\Service;

class ServiceFactory
{
    public function createService(
        string $name,
        Category $category,
        int $price,
        ?string $description = null,
        ?string $image = null,
        ?int $duration = null,
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