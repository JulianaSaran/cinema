<?php

namespace Juliana\Cinema\Domain\Home;

use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Category\CategoryDetailed;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;

class HomeService
{
    private MovieRepository $movieRepository;
    private CategoryRepository $categoryRepository;
    private MovieCategoryRepository $repository;

    public function __construct(MovieRepository $movieRepository,
                                CategoryRepository $categoryRepository,
                                MovieCategoryRepository $repository)
    {
        $this->movieRepository = $movieRepository;
        $this->categoryRepository = $categoryRepository;
        $this->repository = $repository;
    }

    public function getHomeData(): Home
    {
        return new Home(
            movies: $this->movieRepository->find(),
            categories: array_map(
                fn(Category $category) =>$this->getCategoryDetailed($category),
                $this->categoryRepository->find(),
            ),
        );

    }
    private function getCategoryDetailed(Category $category): CategoryDetailed
    {
        return new CategoryDetailed(
            $category->id,
            $category->name,
            $this->repository->findByCategory($category),
        );
    }
}