<?php

namespace Juliana\Cinema\Infra\User;

use Exception;
use Juliana\Cinema\Domain\User\User;
use Juliana\Cinema\Domain\User\UserRepository;

class HttpUserFactory
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function fromSession(): User
    {
        return $this->userRepository->loadById(
            $_SESSION["user"] ?? throw new Exception("User not authenticated"),
        );
    }
}