<?php

declare(strict_types=1);

namespace App\Fixture\Data;

class UserData
{
    private const DATA = [
        [
            "email" => 'paulineaubry85@gmail.com',
            "password" => '123456',
        ],
    ];

    static function get(): array
    {
        return self::DATA;
    }
}