<?php

declare(strict_types=1);

namespace App\Doctrine\ORM\EventListener;

use App\Entity\Category;
use Gedmo\Sluggable\Util\Urlizer as Sluggable;

class CategoryListener
{
    public function prePersist(Category $category): void
    {
        $category->setUrl(Sluggable::urlize($category->getName(), '-'));
    }
}