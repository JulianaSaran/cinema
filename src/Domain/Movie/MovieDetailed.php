<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTime;
use DateTimeInterface;
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
    public float $rating;

    public function __construct(int $id, string $name, string $description, string $image, string $trailer,
                                string $launchedAt, array $categories, array $comments, float $rating)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->trailer = $trailer;
        $this->launchedAt = $launchedAt;
        $this->categories = $categories;
        $this->comments = $comments;

        $this->rating = $rating;
    }

    /**
     * @return string
     */
    public function getLaunchedAt(): DateTime
    {
        return new DateTime($this->launchedAt);
    }


}