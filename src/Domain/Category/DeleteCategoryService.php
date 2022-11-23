<?php

namespace Juliana\Cinema\Domain\Category;

class DeleteCategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function delete(int $id)
    {
        $category = $this->categoryRepository->loadById($id);

        $this->categoryRepository->delete($category);
    }

}