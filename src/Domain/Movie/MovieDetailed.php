<?php

namespace Juliana\Cinema\Domain\Movie;

use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Comment\Comment;

class MovieDetailed
{
    public int $id;
    public string $name;
    public string $description;
    public string $image;
    public string $trailer;
    public string $launchedAt;

    /** @var array<Category> */
    public array $categories;

    /** @var array<Comment> */
    public array $comments;

    public function __construct(int $id, string $name, string $description, string $image, string $trailer,
                                string $launchedAt, array $categories, array $comments)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->trailer = $trailer;
        $this->launchedAt = $launchedAt;
        $this->categories = $categories;
        $this->comments = $comments;

    }
}