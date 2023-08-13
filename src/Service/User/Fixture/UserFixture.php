<?php

declare(strict_types=1);

namespace App\Service\User\Fixture;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher,
    )
    {
    }

    public function generateAdmin(): User
    {
        $user = new User();
        $password = $this->hasher->hashPassword($user, '123456');

        $user->setEmail('paulineaubry85@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($password);

        return $user;
    }
}