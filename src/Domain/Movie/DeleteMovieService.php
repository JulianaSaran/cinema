<?php

namespace Juliana\Cinema\Domain\Movie;

use Juliana\Cinema\Domain\Related\MovieCategoryRepository;

class DeleteMovieService
{
    private MovieRepository $movieRepository;
    private MovieCategoryRepository $movieCategoryRepository;

    public function __construct(MovieRepository $movieRepository, MovieCategoryRepository $movieCategoryRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->movieCategoryRepository = $movieCategoryRepository;
    }

    public function delete(int $id): void
    {
        //Carrega o filme pelo repositório de filme através da função que carrega uma linha pelo id
       $movie = $this->movieRepository->loadById($id);

        //Deleta as categorias daquele filme
        $this->movieCategoryRepository->deleteByMovie($movie);

       //Deleta o filme pela função delete que foi configurada no MySqlMovieRepository
       $this->movieRepository->delete($movie);
    }
}