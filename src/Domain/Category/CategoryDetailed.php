<?php

namespace Juliana\Cinema\Domain\Category;

class CategoryDetailed
{
    public int $id;
    public string $name;
    public array $movies;

    public function __construct(int $id, string $name, array $movies)
    {
        $this->id = $id;
        $this->name = $name;
        $this->movies = $movies;
    }
}