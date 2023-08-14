<?php

declare(strict_types=1);

namespace App\Core\Category\Fixture;

class CategoryData
{
    private const DATA = [
        [
            "name" => "Epilation",
            "image" => 'epilation.webp',
            "description" => null,
        ],
        [
            "name" => "Soins du corps",
            "image" => 'soin-du-corps.webp',
            "description" => null,
        ],
        [
            "name" => "Soins du visage",
            "image" => 'soin-du-visage.webp',
            "description" => null,
        ],
        [
            "name" => "Manucure",
            "image" => 'manucure.webp',
            "description" => null,
        ],
        [
            "name" => "Autres prestations",
            "image" => 'autres-prestations.webp',
            "description" => null,
        ],
    ];

    static function get(): array
    {
        return self::DATA;
    }
}