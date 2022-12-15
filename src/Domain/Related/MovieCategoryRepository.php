<?php

namespace Juliana\Cinema\Domain\Related;

use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Movie\Movie;

interface MovieCategoryRepository
{
    public function relate(Movie $movie, Category $category): void;

    public function unrelated(Movie $movie, Category $category): void;

    public function findByMovie(Movie $movie): array;

    public function findByCategory(Category $category): array;
}