<?php

namespace Juliana\Cinema\Domain\Movie;

class MovieDetailed
{
    public int $id;
    public string $name;
    public string $launchedAt;
    public array $categories;
    public array $comments;

    public function __construct(int $id, string $name, string $launchedAt, array $categories, array $comments)
    {
        $this->id = $id;
        $this->name = $name;
        $this->launchedAt = $launchedAt;
        $this->categories = $categories;
        $this->comments = $comments;
    }
}