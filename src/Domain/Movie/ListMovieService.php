<?php

namespace Juliana\Cinema\Domain\Movie;

class ListMovieService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @return array<array>
     */
    public function getAll()
    {
        return array_map(
            fn(Movie $movie) => $movie->toArray(),
            $this->movieRepository->find(),
        );
    }
}