<?php

declare(strict_types=1);

namespace App\Core\Category\Factory;

use App\Entity\Category;
use Gedmo\Sluggable\Util\Urlizer as Sluggable;

class CategoryFactory
{
    public function createCategory(string $name, string $image, ?string $description): Category
    {
        $category = new Category();

        $slug = Sluggable::urlize($name);

        $category->setName($name);
        $category->setUrl($slug);
        $category->setImage($image);
        $category->setDescription($description);

        return $category;
    }
}