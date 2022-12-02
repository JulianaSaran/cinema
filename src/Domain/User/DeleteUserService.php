<?php

namespace Juliana\Cinema\Domain\User;

class DeleteUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function delete(int $id): void
    {
        $user = $this->userRepository->loadById($id);

        $this->userRepository->delete($user);
    }
}