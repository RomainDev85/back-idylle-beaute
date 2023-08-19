<?php

declare(strict_types=1);

namespace App\Fixture;

use App\Factory\UserFactory;
use App\Fixture\Data\UserData;

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