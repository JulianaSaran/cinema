<?php

namespace Juliana\Cinema\Domain\Category;

interface CategoryRepository
{
    /**
     * @return array<Category>
     */
    public function loadById(int $id): Category;

    public function find(): array;

    public function create(Category $category): void;

    public function update(Category $category): void;

    public function delete(Category $category): void;


}