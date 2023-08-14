<?php

declare(strict_types=1);

namespace App\Core;

interface FixtureInterface
{
    public function generate(): array;
}