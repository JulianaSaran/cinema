<?php

namespace Juliana\Cinema\Infra\Comment;

use DateTime;
use DateTimeInterface;
use Juliana\Cinema\Domain\Comment\Comment;
use Juliana\Cinema\Domain\Comment\CommentRepository;
use Juliana\Cinema\Domain\Movie\Movie;
use Juliana\Cinema\Domain\User\UserRepository;
use PDO;

class MySqlCommentRepository implements CommentRepository
{
    private PDO $pdo;
    private UserRepository $repository;

    public function __construct(PDO $pdo, UserRepository $repository)
    {
        $this->pdo = $pdo;
        $this->repository = $repository;
    }

    public function findByMovie(Movie $movie): array
    {
        $query = "SELECT * FROM comments WHERE movie_id = :movieId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":movieId" => $movie->id]);
        $result = $stmt->fetchAll();

        $comments = [];

        foreach($result as $item)
        {
            $comments[] = $this->commentFromItem($item);
        }

        return $comments;
    }

    public function commentFromItem(array $item): Comment
    {
        return new Comment(
            id: $item["id"],
            movieId: $item["movie_id"],
            writer: $this->repository->loadById($item["writer"]),
            comment: $item["comment"],
            rating: $item["rating"],
            commentedAt: new DateTime($item["commented_at"]) ,
        );
    }

    public function create(Comment $comment): void
    {
        $query = "INSERT INTO comments (id, movie_id, writer, comment, rating, commented_at) 
                    VALUES (:id, :movieId, :writer, :comment, :rating, :commentedAt)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id"=> $comment->id,
            ":movieId"=> $comment->getMovieId(),
            ":writer"=> $comment->writer->id,
            ":comment"=> $comment->comment,
            ":rating"=> $comment->rating,
            ":commentedAt"=> $comment->commentedAt->format(DateTimeInterface::ATOM),
        ]);
    }


    public function loadById(int $id): Comment
    {
        $query = "SELECT * FROM comments WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":id" => $id]);
        $result = $stmt->fetch();

        return $this->commentFromItem($result);
    }

    public function delete(Comment $comment): void
    {
     $query = "DELETE FROM comments WHERE id = :id";
     $stmt = $this->pdo->prepare($query);
     $stmt->execute(["id"=>$comment->id]);
    }

    public function getRating(Movie $movie): float
    {
        $query = "SELECT avg(rating) as rating FROM comments WHERE movie_id = :movieId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":movieId" => $movie->id]);
        $result = $stmt->fetch();

        return $result["rating"];

    }
}