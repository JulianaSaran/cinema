<?php

namespace Juliana\Cinema\Domain\User;

interface UserRepository
{
    public function find(): array;

    public function loadById(int $id): User;

    public function findByEmail(string $email): ?User;

    public function loadByEmail(string $email): User;

    public function create(User $user): void;

    public function update(User $user): void;

    public function delete(User $user): void;


}