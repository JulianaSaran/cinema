<?php

namespace Juliana\Cinema\Domain\User;

use DateTime;
use DateTimeInterface;
use JsonSerializable;

class User implements JsonSerializable
{
    public int $id;
    public string $name;
    public string $lastname;
    public string $email;
    public string $password;
    public string $image;
    public string $token;
    public string $type;
    public DateTime $createdAt;

    public function __construct(
        int      $id,
        string   $name,
        string   $lastname,
        string   $email,
        string   $password,
        string   $image,
        string   $token,
        string   $type,
        DateTime $createdAt,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
        $this->token = $token;
        $this->type = $type;
        $this->createdAt = $createdAt;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "lastname" => $this->lastname,
            "email" => $this->email,
            "password" => $this->password,
            "image" => $this->image,
            "token" => $this->token,
            "type" => $this->type,
            "createdAt" => $this->createdAt->format(DateTimeInterface::ATOM),
        ];
    }
}