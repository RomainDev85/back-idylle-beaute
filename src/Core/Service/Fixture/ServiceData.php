<?php

declare(strict_types=1);

namespace App\Core\Service\Fixture;

class ServiceData
{
    private const DATA = [
        [
            "name" => "Maillot",
            "categoryName" => 'Epilation',
            "price" => 1200,
        ],
    ];

    static function get(): array
    {
        return self::DATA;
    }
}