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

        $this->userRepository->update($user);
    }

    public function updatePassword(int $id, array $data): void
    {
        $user = $this->userRepository->loadById($id);
        $user->password = password_hash($data["password"], PASSWORD_DEFAULT);

        $this->userRepository->updatePassword($user);
    }
}