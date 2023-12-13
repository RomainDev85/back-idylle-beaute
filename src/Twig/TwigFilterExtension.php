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
        return ( $value / 60 ) . ' min';
    }
}
