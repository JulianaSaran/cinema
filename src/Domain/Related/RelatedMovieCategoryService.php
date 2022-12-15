<?php

namespace Juliana\Cinema\Domain\Related;

use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\MovieRepository;

class RelatedMovieCategoryService
{
    private MovieRepository $movieRepository;
    private CategoryRepository $categoryRepository;
    private MovieCategoryRepository $movieCategoryRepository;

    public function __construct(
        MovieRepository         $movieRepository,
        CategoryRepository      $categoryRepository,
        MovieCategoryRepository $movieCategoryRepository,
    )
    {
        $this->movieRepository = $movieRepository;
        $this->categoryRepository = $categoryRepository;
        $this->movieCategoryRepository = $movieCategoryRepository;
    }

    public function relate(int $movieId, int $categoryId): void
    {
        // Carregar movie
        $movie = $this->movieRepository->loadById($movieId);

        //Carregar category
        $category = $this->categoryRepository->loadById($categoryId);

        //Salvar relação
        $this->movieCategoryRepository->relate($movie, $category);
    }
}