<?php

namespace Juliana\Cinema\Domain\Movie;

use Juliana\Cinema\Domain\EntryNotFoundException;

interface MovieRepository
{

    /**
     * @return array<Movie>
     */

    public function create(Movie $movie): void;

    public function getAll(): array;

    public function update(Movie $movie): void;

    public function delete(Movie $movie): void;

    /**
     * @throws EntryNotFoundException
     */
    public function loadById(int $id): Movie;
}