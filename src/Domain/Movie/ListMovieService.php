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
     * @return array<MovieDetailed>
     */
    public function getAll()
    {
        return $this->movieRepository->getAll();
    }
}