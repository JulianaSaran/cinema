<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTime;
use DateTimeInterface;

class Movie
{
    public int $id;
    public string $name;
    public Datetime $launchedAt;
    public DateTime $createdAt;

    public function __construct(int $id, string $name, DateTime $launchedAt, DateTime $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->launchedAt = $launchedAt;
        $this->createdAt = $createdAt;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "launchedAt" => $this->launchedAt->format(DateTimeInterface::ATOM),
            "createdAt" => $this->createdAt->format(DateTimeInterface::ATOM),
        ];
    }
}