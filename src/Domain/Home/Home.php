<?php

namespace Juliana\Cinema\Domain\Home;

use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Movie\Movie;

class Home
{
    /** @var array<Movie> */
    public array $movies;

    /** @var array<Category> */
    public array $categories;

    public function __construct(array $movies, array $categories)
    {
        $this->movies = $movies;
        $this->categories = $categories;
    }
}