<?php

namespace Juliana\Cinema\Infra\Related;

use DateTime;
use DateTimeInterface;
use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\Movie;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;
use PDO;

class MySqlMovieCategoryRepository implements MovieCategoryRepository
{
    private PDO $pdo;
    private CategoryRepository $categoryRepository;
    private MovieRepository $movieRepository;

    public function __construct(PDO $pdo, CategoryRepository $categoryRepository, MovieRepository $movieRepository)
    {
        $this->pdo = $pdo;
        $this->categoryRepository = $categoryRepository;
        $this->movieRepository = $movieRepository;
    }

    public function relate(Movie $movie, Category $category): void
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

    public function deleteByMovie (Movie $movie): void
    {
        $query = "DELETE FROM movie_categories WHERE movie_id = :movieId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":movieId"=> $movie->id,
        ]);
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

    public function findByCategory(Category $category): array
    {
        $query = "SELECT * FROM movie_categories WHERE category_id = :categoryId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["categoryId"=> $category->id]);

        $result = $stmt->fetchAll();
        $categories = [];

        foreach($result as $item) {
            $categories[] = $this->movieRepository->loadById($item["movie_id"]);
        }

        return $categories;
    }
}