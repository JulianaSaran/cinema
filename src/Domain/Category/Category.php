<?php

namespace Juliana\Cinema\Domain\Category;

use DateTime;

class Category
{
    public int $id;
    public string $name;
    private DateTime $createdAt;

    public function __construct(int $id, string $name, DateTime $createdAt)
    {
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->id = $id;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}