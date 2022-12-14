<?php

namespace Juliana\Cinema\Domain\User;

use DateTime;
use DateTimeInterface;
use JsonSerializable;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Framework\Session\Session;

class User implements JsonSerializable
{
    public int $id;
    public string $name;
    public string $lastname;
    public string $email;
    public string $password;
    public string $image;
    public UserType $type;
    public DateTime $createdAt;

    public function __construct(
        int      $id,
        string   $name,
        string   $lastname,
        string   $email,
        string   $password,
        string   $image,
        UserType   $type,
        DateTime $createdAt,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
        $this->type = $type;
        $this->createdAt = $createdAt;
    }

    public function fullName(): string
    {
        return $this->name . " " . $this->lastname;
    }

    public function getImageUser():string
    {
        if ($this->image === "")
        {
            return "user.png";
        }

        return $this->image;
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
            "type" => UserType::from($this->type),
            "createdAt" => $this->createdAt->format(DateTimeInterface::ATOM),
        ];
    }
}