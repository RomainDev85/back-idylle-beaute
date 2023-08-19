<?php

declare(strict_types=1);

namespace App\Fixture\Data;

class SubServiceData
{
    private const DATA = [
        [
            "name" => "Maquillage avec essai + soin du visage + ongles en semi-permanent",
            "subCategoryName" => 'Forfaits mariée',
            "description" => null,
            "price" => 11000,
            "duration" => null,
        ],
        [
            "name" => "Demi jambes + Maillot simple + Aisselles",
            "subCategoryName" => 'Forfaits épilations',
            "description" => null,
            "price" => 3200,
            "duration" => null,
        ],
        [
            "name" => "Demi jambes + Maillot string + Aisselles",
            "subCategoryName" => 'Forfaits épilations',
            "description" => null,
            "price" => 3700,
            "duration" => null,
        ],
        [
            "name" => "Demi jambes + Maillot intégral + Aisselles",
            "subCategoryName" => 'Forfaits épilations',
            "description" => null,
            "price" => 4200,
            "duration" => null,
        ],
        [
            "name" => "Jambes complètes + Maillot simple + Aisselles",
            "subCategoryName" => 'Forfaits épilations',
            "description" => null,
            "price" => 3700,
            "duration" => null,
        ],
        [
            "name" => "Jambes complètes + Maillot string + Aisselles",
            "subCategoryName" => 'Forfaits épilations',
            "description" => null,
            "price" => 4200,
            "duration" => null,
        ],
        [
            "name" => "Jambes complètes + Maillot intégral + Aisselles",
            "subCategoryName" => 'Forfaits épilations',
            "description" => null,
            "price" => 4700,
            "duration" => null,
        ],
    ];

    static function get(): array
    {
        return self::DATA;
    }
}