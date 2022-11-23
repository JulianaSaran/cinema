<?php

namespace Juliana\Cinema\Domain\Category;

class UpdateCategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function update(int $id, array $data)
    {
        ////Carrega as categorias do repositório de categorias pelo Id
        $category = $this->categoryRepository->loadById($id);

        ////Altera as propriedades do objeto carregado
        $category->name = $data["name"];

        //Atualiza os dados do filme através do repositório de categorias e
        // da função update do MySqlCategoryRepository
        $this->categoryRepository->update($category);
    }
}