<?php

declare(strict_types=1);

namespace App\Service\User\Fixture;

use App\Entity\User;
use App\Service\User\Factory\UserFactory;

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