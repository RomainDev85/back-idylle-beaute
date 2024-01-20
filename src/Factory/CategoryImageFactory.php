<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Category;
use App\Entity\CategoryImage;
use App\Repository\CategoryRepository;
use Gedmo\Sluggable\Util\Urlizer as Sluggable;
use Symfony\Component\HttpFoundation\File\File;

class CategoryImageFactory
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private string $projectDir,
    )
    {
    }

    public function createCategoryImage(string $name, string $categoryName): CategoryImage
    {
        $categoryImage = new CategoryImage();
        $category = $this->categoryRepository->findOneBy(['name' => $categoryName]);

        $categoryImage->setName($name);
        $categoryImage->setCategory($category);
        $categoryImage->setFile(new File($this->projectDir . '/public/upload/images/category/' . $name));

        return $categoryImage;
    }
}
