<?php

namespace Juliana\Cinema\Domain\Category;

use DateTime;

class Category
{
    public string $name;
    private DateTime $createdAt;

    public function __construct(string $name, DateTime $createdAt)
    {
        $this->name = $name;
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}