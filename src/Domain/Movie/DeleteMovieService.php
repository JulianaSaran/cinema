<?php

namespace Juliana\Cinema\Domain\Movie;

class DeleteMovieService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function delete(int $id): void
    {
        //Carrega o filme pelo repositório de filme através da função que carrega uma linha pelo id
       $movie = $this->movieRepository->loadById($id);

       //Deleta o filme pela função delete que foi configurada no MySqlMovieRepository
       $this->movieRepository->delete($movie);

    }
}