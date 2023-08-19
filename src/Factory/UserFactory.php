<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\User;
use App\Enum\User\UserRoles;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFactory
{
    public function __construct(
        private UserPasswordHasherInterface $hasher,
        private readonly UserRoles $userRoles,
    )
    {
    }

    public function createAdmin(string $email, string $password): User
    {
        $user = new User();
        $passwordHashed = $this->hasher->hashPassword($user, $password);

        $user->setEmail($email);
        $user->setRoles([$this->userRoles::ROLE_ADMIN]);
        $user->setPassword($passwordHashed);

        return $user;
    }
}