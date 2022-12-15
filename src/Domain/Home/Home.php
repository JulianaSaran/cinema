<?php

namespace Juliana\Cinema\Domain\Home;

class Home
{
    public array $movies;
    public array $categories;

    public function __construct(array $movies, array $categories)
    {
        $this->movies = $movies;
        $this->categories = $categories;
    }
}