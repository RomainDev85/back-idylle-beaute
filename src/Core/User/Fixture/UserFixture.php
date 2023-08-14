<?php

declare(strict_types=1);

namespace App\Core\User\Fixture;

use App\Core\FixtureInterface;
use App\Core\User\Factory\UserFactory;

class UserFixture implements FixtureInterface
{
    public function __construct(
        private UserFactory $userFactory,
    )
    {
    }

    public function generate(): array
    {
        $users = [];

        foreach (UserData::get() as $user) {
            $users[] = $this->userFactory->createAdmin($user["email"], $user["password"]);
        }

        return $users;
    }
}