<?php

namespace Juliana\Cinema\Domain\Movie;

interface MovieRepository
{

    /**
     * @return array<Movie>
     */

    public function create(Movie $movie): void;

    public function find(): array;

    public function update(Movie $movie): void;

    public function delete(Movie $movie): void;

    public function loadById(int $id): Movie;
}