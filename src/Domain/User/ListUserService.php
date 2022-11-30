<?php

namespace Juliana\Cinema\Domain\User;

class ListUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
       return $this->userRepository->find();
    }
}