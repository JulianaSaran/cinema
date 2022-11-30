<?php

namespace Juliana\Cinema\Domain\User;

use DateTime;

class CreateUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data):void
    {
        $user = new User(
            id: 0,
            name: $data["name"],
            lastname: $data["lastname"],
            email: $data["email"],
            password: $data["password"],
            image: $data["image"],
            token: $data["token"],
            type: $data["type"],
            createdAt: new DateTime(),
        );

        $this->userRepository->create($user);
    }
}