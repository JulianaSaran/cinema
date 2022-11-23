<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTime;
use Juliana\Cinema\Domain\EntryNotFoundException;

class UpdateMovieService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @throws EntryNotFoundException
     */
    public function update(int $id, array $data): void
    {
        //Carrega os filmes pelo Id
        $movie = $this->movieRepository->loadById($id);

        //Altera as propriedades do objeto carregado
        $movie->name = $data["name"];
        $movie->launchedAt = new DateTime( $data["launchedAt"]);

        //Atualiza os dados do filme através da função update do MySqlMovieRepository
        $this->movieRepository->update($movie);
    }
}