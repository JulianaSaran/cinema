<?php

namespace Juliana\Cinema\Infra\Category;

use DateTime;
use DateTimeInterface;
use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use PDO;

class MySqlCategoryRepository implements CategoryRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function getAll(): array
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $category = [];

        foreach ($result as $item) {
            $category[] = $this->categoryFromItem($item);
        }

        return $category;
    }

    private function categoryFromItem(array $item): Category
    {
        return new Category (
            id: $item["id"],
            name: $item["name"],
            createdAt: new DateTime($item["created_at"]),
        );
    }

    public function create(Category $category): void
    {
        $query = "INSERT INTO categories (id,name, created_at) VALUES (:id, :name, :createdAt)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id" => $category->id,
            ":name" => $category->name,
            ":createdAt" => $category->getCreatedAt()->format(DateTimeInterface::ATOM),
        ]);
    }

    public function loadById(int $id): Category
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":id" => $id]);
        $result = $stmt->fetch();

        return $this->categoryFromItem($result);
    }

    public function update(Category $category): void
    {
        $query = "UPDATE categories SET name = :name, created_at = :createdAt WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id" => $category->id,
            ":name" => $category->name,
            ":createdAt" => $category->getcreatedAt()->format(DateTimeInterface::ATOM),
        ]);
    }

    public function delete(Category $category): void
    {
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":id" => $category->id]);
    }
}