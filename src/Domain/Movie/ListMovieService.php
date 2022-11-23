<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTimeInterface;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;

class ListMovieService
{
    private MovieRepository $movieRepository;
    private MovieCategoryRepository $movieCategoryRepository;

    public function __construct(MovieRepository $movieRepository, MovieCategoryRepository $movieCategoryRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->movieCategoryRepository = $movieCategoryRepository;
    }

    /**
     * @return array<MovieDetailed>
     */
    public function getAll()
    {
        return array_map(
            fn(Movie $movie) => new MovieDetailed(
                id: $movie->id,
                name: $movie->name,
                launchedAt: $movie->launchedAt->format(DateTimeInterface::ATOM),
                categories: $this->movieCategoryRepository->findByMovie($movie),
            ),
            $this->movieRepository->find(),
        );
    }
}