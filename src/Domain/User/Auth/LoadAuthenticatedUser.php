<?php

namespace Juliana\Cinema\Domain\User\Auth;

use Juliana\Cinema\Domain\User\User;
use Juliana\Cinema\Domain\User\UserRepository;

class LoadAuthenticatedUser
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function load(int $user): User
    {
       return $this->userRepository->loadById($user);
    }
}