<?php

namespace Juliana\Cinema\Domain;

class UpdateMovieService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function update(int $id, array $data):void
    {
        //Carrega os filmes pelo Id
        $movie = $this->movieRepository->loadById($id);

        //Altera as propriedades do objeto carregado
        $movie->name=$data["name"];
        $movie->lauchedAt=$data["launchedAt"];

        //Atualiza os dados do filme atraves da função update do MySqlMovieRepository
        $this->movieRepository->update($movie);
    }
}