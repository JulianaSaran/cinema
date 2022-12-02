<?php

namespace Juliana\Cinema\Infra\User;

use DateTime;
use DateTimeInterface;
use Juliana\Cinema\Domain\User\User;
use Juliana\Cinema\Domain\User\UserRepository;
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
            $user[] = $this->userFromItens($item);
        }
        return $user;
    }

    private function userFromItens(array $item): User
    {
        return new User(
            id: $item["id"],
            name: $item["name"],
            lastname: $item["lastname"],
            email: $item["email"],
            password: $item["password"],
            image: $item["image"],
            token: $item["token"],
            type: $item["type"],
            createdAt: new DateTime($item["created_at"]),
        );
    }


    public function create(User $user): void
    {
        $query = "INSERT INTO users (id, name, lastname, email, password, image, token, type, created_at) 
                    VALUES (:id, :name, :lastname, :email, :password, :image, :token, :type, :createdAt)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id" => $user->id,
            ":name" => $user->name,
            ":lastname" => $user->lastname,
            ":email" => $user->email,
            ":password" => $user->password,
            ":image" => $user->image,
            ":token" => $user->token,
            ":type" => $user->type,
            ":createdAt" => $user->createdAt->format(DateTimeInterface::ATOM),
        ]);
    }

    public function update(User $user): void
    {
        $query = "UPDATE users SET id = :id, name = :name, lastname = :lastname, email = :email, password = :password, 
                image = :image, token = :token, type = :type, created_at =:createdAt WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["id" => $user->id,
            "name" => $user->name,
            ":lastname" => $user->lastname,
            ":email" => $user->email,
            ":password" => $user->password,
            ":image" => $user->image,
            "token" => $user->token,
            "type" => $user->type,
            "createdAt" => $user->createdAt->format(DateTimeInterface::ATOM),
        ]);

    }

    public function loadById(int $id): User
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["id"=> $id]);
        $result = $stmt->fetch();

          return $this->userFromItens($result);
    }

    public function delete(User $user): void
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["id"=>$user->id]);
    }
}