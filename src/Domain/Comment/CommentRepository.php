<?php

namespace Juliana\Cinema\Domain\Comment;

use Juliana\Cinema\Domain\Movie\Movie;

interface CommentRepository
{
    public function findByMovie(Movie $movie): array;

    public function loadById(int $id): Comment;

    public function create(Comment $comment): void;

    public function delete(Comment $comment): void;
}