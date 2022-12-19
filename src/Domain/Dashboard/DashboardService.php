<?php

namespace Juliana\Cinema\Domain\Dashboard;

use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\MovieRepository;

class DashboardService
{
    private MovieRepository $movieRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(MovieRepository $movieRepository, CategoryRepository $categoryRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function load()
    {
        return new DashboardDetailed(
            movies: $this->movieRepository->getAll(),
            categories: $this->categoryRepository->getAll(),
        );
    }
}