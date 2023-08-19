<?php

declare(strict_types=1);

namespace App\Fixture\Data;

class SubCategoryData
{
    private const DATA = [
        [
            "name" => "Forfaits épilations",
            "categoryName" => "Epilation",
        ],
        [
            "name" => "Forfaits épilations",
            "categoryName" => "Autres prestations",
        ]
    ];

    static function get(): array
    {
        return self::DATA;
    }
}