<?php

namespace Juliana\Cinema\Domain\Category;

class ListCategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
       return $this->categoryRepository->find();
    }
}