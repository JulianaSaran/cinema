<?php

namespace Juliana\Cinema\Infra\Movie;

use DateTime;
use DateTimeInterface;
use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\EntryNotFoundException;
use Juliana\Cinema\Domain\Movie\Movie;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use PDO;
use TinyContainer\NotFoundException;

class MySqlMovieRepository implements MovieRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(): array
    {
        $query = "SELECT * FROM movies";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $movies = [];

        foreach ($result as $item) {
            $movies[] = $this->movieFromItem($item);
        }

        return $movies;
    }

    public function loadById(int $id): Movie
    {
        $query = "SELECT * FROM movies WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":id" => $id]);
        $item = $stmt->fetch();

        if ($item === false)
        {
            throw new EntryNotFoundException();
        }

        return $this->movieFromItem($item);
    }

    public function create(Movie $movie): void
    {
        $query = "INSERT INTO movies (id, name, description, image, trailer, launched_at, created_at) 
                    VALUES (:id, :name, :description, :image, :trailer, :launchedAt, :createdAt)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id" => $movie->id,
            ":name" => $movie->name,
            ":description" => $movie->description,
            "image" => $movie->image,
            "trailer" => $movie->trailer,
            ":launchedAt" => $movie->launchedAt->format(DateTimeInterface::ATOM),
            ":createdAt" => $movie->createdAt->format(DateTimeInterface::ATOM),
        ]);
    }

    public function update(Movie $movie): void
    {
        $query = "UPDATE movies SET id = :id, name = :name, description = :description, image = :image, 
                  trailer = :trailer, launched_at = :launchedAt, created_at = :createdAt 
              WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id" => $movie->id,
            ":name" => $movie->name,
            ":description" => $movie->description,
            "image" => $movie->image,
            "trailer" => $movie->trailer,
            ":launchedAt" => $movie->launchedAt->format(DateTimeInterface::ATOM),
            ":createdAt" => $movie->createdAt->format(DateTimeInterface::ATOM),
        ]);
    }

    public function delete(Movie $movie): void
    {
        $query = "DELETE FROM movies WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":id" => $movie->id]);
    }

    private function movieFromItem(array $item): Movie
    {
        return new Movie(
            id: $item["id"],
            name: $item["name"],
            description: $item ["description"],
            image: $item["image"],
            trailer: $item["trailer"],
            launchedAt: new DateTime($item["launched_at"]),
            createdAt: new DateTime($item["created_at"]),
        );
    }
}