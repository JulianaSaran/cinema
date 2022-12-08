<?php

namespace Juliana\Cinema\Domain\User;

use DateTime;
use Exception;

class CreateUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): void
    {
        if ($data['confirmpassword'] !== $data['password']) {
            throw new Exception("As senhas informadas são diferentes");
        }

        if ($this->userRepository->findByEmail($data['email']) !==  null) {
            throw new Exception("Email já cadastrado");
        }

        $user = new User(
            id: 0,
            name: $data["name"],
            lastname: $data["lastname"],
            email: $data["email"],
            password:  password_hash($data["password"], PASSWORD_DEFAULT),
            image: $data["image"]?? "",
            type: UserType::USER,
            createdAt: new DateTime(),
        );

        $this->userRepository->create($user);
    }
}