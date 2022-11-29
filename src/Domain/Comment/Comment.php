<?php

namespace Juliana\Cinema\Domain\Comment;

use DateTime;

class Comment
{
    public int $id;
    private int $movieId;
    public string $writer;
    public string $comment;
    public DateTime $commentedAt;

    public function __construct(int $id, int $movieId, string $writer, string $comment, DateTime $commentedAt)
    {
        $this->id = $id;
        $this->movieId = $movieId;
        $this->writer = $writer;
        $this->comment = $comment;
        $this->commentedAt = $commentedAt;
    }

    public function getMovieId(): int
    {
        return $this->movieId;
    }

    public function toArray():array
    {
        return[
            "id" => $this->id,
            "writer" => $this->writer,
            "comment" => $this->comment,
            "commentedAt" => $this->commentedAt->format(\DateTimeInterface::ATOM),
        ];

    }
}