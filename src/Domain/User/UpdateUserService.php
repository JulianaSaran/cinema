<?php

namespace Juliana\Cinema\Domain\User;

class UpdateUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function update(int $id, array $data): void
    {
        //Carrega os usuários pelo Id
        $user = $this->userRepository->loadById($id);

        $user->name = $data["name"];
        $user->lastname = $data["lastname"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->image = $data["image"];
        $user->type = $data["type"];

        $this->userRepository->update($user);
    }
}