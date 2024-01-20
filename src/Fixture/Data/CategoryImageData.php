<?php

declare(strict_types=1);

namespace App\Fixture\Data;

class CategoryImageData
{
    private const DATA = [
        [
            "name" => "epilation-65ac3fde0cadd547464837.webp",
            "categoryName" => 'Epilation',
        ],
        [
            "name" => "epilation2.jpg",
            "categoryName" => 'Epilation',
        ],
        [
            "name" => "epilation3.jpg",
            "categoryName" => 'Epilation',
        ],
        [
            "name" => "epilation4.jpg",
            "categoryName" => 'Epilation',
        ],
        [
            "name" => "epilation5.jpg",
            "categoryName" => 'Epilation',
        ],
    ];

    static function get(): array
    {
        return self::DATA;
    }
}
