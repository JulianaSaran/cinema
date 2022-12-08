<?php

namespace Juliana\Cinema\Infra\User;

use DateTime;
use DateTimeInterface;
use Exception;
use Juliana\Cinema\Domain\User\User;
use Juliana\Cinema\Domain\User\UserRepository;
use Juliana\Cinema\Domain\User\UserType;
use PDO;

class MySqlUserRepository implements UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(): array
    {
        $query = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $user = [];

        foreach ($result as $item) {
            $user[] = $this->builtUser($item);
        }
        return $user;
    }

    public function create(User $user): void
    {
        $query = "INSERT INTO users (id, name, lastname, email, password, image, type, created_at) 
                    VALUES (:id, :name, :lastname, :email, :password, :image, :type, :createdAt)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($this->buildParams($user));
    }

    public function update(User $user): void
    {
        $query = "UPDATE users SET id = :id, name = :name, lastname = :lastname, email = :email, password = :password, 
                image = :image, type = :type, created_at =:createdAt WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($this->buildParams($user));
    }

    public function loadById(int $id): User
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["id" => $id]);
        $result = $stmt->fetch();

        if ($result === false) {
            throw new Exception("Usuário não encontrado");
        }

        return $this->builtUser($result);
    }

    public function delete(User $user): void
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["id" => $user->id]);
    }

    public function findByEmail(string $email): ?User
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["email" => $email]);
        $result = $stmt->fetch();

        if ($result === false) {
            return null;
        }

        return $this->builtUser($result);
    }

    public function loadByEmail(string $email): User
    {
        return $this->findByEmail($email) ?? throw new Exception("Usuário não encontrado");
    }

    private function builtUser(array $item): User
    {
        return new User(
            id: $item["id"],
            name: $item["name"],
            lastname: $item["lastname"],
            email: $item["email"],
            password: $item["password"],
            image: $item["image"],
            type: UserType::from($item["type"]),
            createdAt: new DateTime($item["created_at"]),
        );
    }

    private function buildParams(User $user): array
    {
        return [
            ":id" => $user->id,
            ":name" => $user->name,
            ":lastname" => $user->lastname,
            ":email" => $user->email,
            ":password" => $user->password,
            ":image" => $user->image,
            ":type" => $user->type->value,
            ":createdAt" => $user->createdAt->format(DateTimeInterface::ATOM),
        ];
    }


}