<?php

declare(strict_types=1);

namespace App\Enum\Service;

class ServiceDuration
{
    public const DURATIONS =  [
        '10 min' => 600,
        '15 min' => 900,
        '20 min' => 1200,
        '30 min' => 1800,
        '45 min' => 2400,
        '1 h' => 3600,
        '1 h 15' => 4500,
        '1 h 30' => 5400,
        '1 h 45' => 6300,
        '2 h' => 7200,
    ];
}