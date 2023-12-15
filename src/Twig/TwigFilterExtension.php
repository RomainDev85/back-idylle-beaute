<?php

declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigFilterExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('app_time', [$this, 'formatTime']),
        ];
    }

    public function formatTime(int $value): string
    {
        $hoursSecondCount = 3600;

        if ($value >= $hoursSecondCount) {
            $hours = (int)floor($value / $hoursSecondCount);
            $lastMinuts = ($value - ($hoursSecondCount * $hours)) / 60;

            return $hours . ' h ' . sprintf("%02d", $lastMinuts);
        }

        return ( $value / 60 ) . ' min';
    }
}
