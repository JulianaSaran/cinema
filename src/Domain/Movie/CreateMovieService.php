<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTime;

/**
 * Acessa o repositorio
 */
class CreateMovieService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**+
     * Cria um novo filme com todas as informações que são pedidas no repositorio
     */
    public function create(array $data): void
    {
        $movie = new Movie(
            id:0,
            name: $data["name"],
            launchedAt: new DateTime($data["launchedAt"]),
            createdAt: new DateTime(),
        );

        $this->movieRepository->create($movie);
    }
}