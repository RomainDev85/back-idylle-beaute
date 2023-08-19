<?php

declare(strict_types=1);

namespace App\Formater;

class MoneyFormater
{
    public function format(int $price, string $currency = 'EUR'): string
    {
        $floatPrice = ($price / 100);
        $numberFormatter = new \NumberFormatter('fr_FR', \NumberFormatter::CURRENCY);

        return $numberFormatter->formatCurrency($floatPrice, $currency);
    }
}