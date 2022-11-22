<?php

namespace Juliana\Cinema\Domain\Category;

use DateTime;

class CreateCategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(array $data): void
    {
        $category = new Category (
            name: $data["name"],
            createdAt: new DateTime(),
        );

        $this->categoryRepository->create($category);
    }
}