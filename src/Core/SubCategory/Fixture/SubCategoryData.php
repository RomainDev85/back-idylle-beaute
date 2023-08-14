<?php

declare(strict_types=1);

namespace App\Core\SubCategory\Fixture;

class SubCategoryData
{
    private const DATA = [
        [
            "name" => "Forfaits épilations",
            "categoryName" => "Epilation",
        ],
    ];

    static function get(): array
    {
        return self::DATA;
    }
}