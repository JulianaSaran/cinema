<?php

namespace Juliana\Cinema\Domain\Related;

use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Movie\Movie;

interface MovieCategoryRepository
{
    public function related(Movie $movie, Category $category): void;

    //public function unrelated(): void;
    public function findByMovie(Movie $movie): array;
}