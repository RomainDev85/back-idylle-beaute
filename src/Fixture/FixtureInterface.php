<?php

declare(strict_types=1);

namespace App\Fixture;

interface FixtureInterface
{
    public function generate(): array;
}