<?php

namespace Juliana\Cinema\Domain\User;

interface UserRepository
{
    public function find(): array;

    public function loadById(int $id): User;

    public function create(User $user): void;

    public function update(User $user): void;

    public function delete(User $user): void;


}