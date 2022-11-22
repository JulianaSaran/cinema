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


    public function find(): array
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
            name: $item["name"],
            createdAt: new DateTime($item["created_at"]),
        );
    }

    public function create(Category $category): void
    {
        $query = "INSERT INTO categories (name, created_at) VALUES (:name, :createdAt)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":name" => $category->name,
            ":createdAt" => $category->createdAt->format(DateTimeInterface::ATOM),
        ]);
    }
}