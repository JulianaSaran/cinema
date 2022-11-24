<?php

namespace Juliana\Cinema\Infra\Related;

use DateTime;
use DateTimeInterface;
use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\Movie;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;
use Juliana\Cinema\Infra\Movie\MySqlMovieRepository;
use PDO;

class MySqlMovieCategoryRepository implements MovieCategoryRepository
{
    private PDO $pdo;
    private CategoryRepository $categoryRepository;

    public function __construct(PDO $pdo, CategoryRepository $categoryRepository)
    {
        $this->pdo = $pdo;
        $this->categoryRepository = $categoryRepository;
    }

    public function related(Movie $movie, Category $category): void
    {
        $query = "INSERT INTO movie_categories(movie_id, category_id, related_at) 
                VALUES (:movieId, :categoryId, :relatedAt)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":movieId" => $movie->id,
            ":categoryId" => $category->id,
            ":relatedAt" => (new DateTime())->format(DateTimeInterface::ATOM),
        ]);
    }

    //A função retorna as categorias do filme
    public function findByMovie(Movie $movie): array
    {
        $query = "SELECT * FROM movie_categories WHERE movie_id = :movieId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":movieId"=> $movie->id,
        ]);
        $result = $stmt->fetchAll();
        $movies = [];

        foreach ($result as $item) {
            $movies[] = $this->categoryRepository->loadById($item["category_id"]);
        }

        return $movies;
    }

    public function unrelated(Movie $movie, Category $category): void
    {
        $query = "DELETE FROM movie_categories WHERE movie_id = :movieId AND category_id = :categoryId";
        $stmt= $this->pdo->prepare($query);
        $stmt->execute([
            "movieId"=> $movie->id,
            "categoryId"=> $category->id,
        ]);

    }
}