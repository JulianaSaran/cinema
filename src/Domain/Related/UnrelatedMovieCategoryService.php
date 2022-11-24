<?php

namespace Juliana\Cinema\Domain\Related;

use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\MovieRepository;

class UnrelatedMovieCategoryService
{
    private MovieCategoryRepository $movieCategoryRepository;
    private MovieRepository $movieRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(
        MovieCategoryRepository $movieCategoryRepository,
        MovieRepository         $movieRepository,
        CategoryRepository      $categoryRepository)
    {
        $this->movieCategoryRepository = $movieCategoryRepository;
        $this->movieRepository = $movieRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function unrelated(int $movieId, int $categoryId): void
    {
        // Carregar movie
        $movie = $this->movieRepository->loadById($movieId);

        //Carregar category
        $category = $this->categoryRepository->loadById($categoryId);

        //Salvar relação
        $this->movieCategoryRepository->unrelated($movie, $category);
    }
}