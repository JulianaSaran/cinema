<?php

namespace Juliana\Cinema\Domain\Comment;

use Juliana\Cinema\Domain\Movie\Movie;
use Juliana\Cinema\Domain\User\User;

interface CommentRepository
{
    public function findByMovie(Movie $movie): array;

    public function loadById(int $id): Comment;

    public function create(Comment $comment): void;

    public function delete(Comment $comment): void;

    public function getRating(int $movieId): float;
}