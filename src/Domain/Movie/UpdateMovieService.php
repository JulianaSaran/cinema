<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTime;
use Juliana\Cinema\Domain\EntryNotFoundException;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;
use Juliana\Cinema\Domain\Related\RelatedMovieCategoryService;

class UpdateMovieService
{
    private MovieRepository $movieRepository;
    private RelatedMovieCategoryService $relater;


    public function __construct(MovieRepository $movieRepository, RelatedMovieCategoryService $relater)
    {
        $this->movieRepository = $movieRepository;
        $this->relater = $relater;
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

        $this->relater->relate($movie->id, $data['category']);
    }
}