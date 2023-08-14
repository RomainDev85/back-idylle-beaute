<?php

declare(strict_types=1);

namespace App\Core\User\Fixture;

use App\Entity\User;
use App\Core\User\Factory\UserFactory;

class UserFixture
{
    public function __construct(
        private UserFactory $userFactory,
    )
    {
    }

    public function generateAdmin(): User
    {
        return $this->userFactory->createAdmin('paulineaubry85@gmail.com', '123456');
    }
}