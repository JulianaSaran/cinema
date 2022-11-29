<?php

namespace Juliana\Cinema\Domain\Comment;

use Juliana\Cinema\Domain\Movie\MovieRepository;

class ListCommentService
{
    private MovieRepository $movieRepository;
    private CommentRepository $commentRepository;

    public function __construct(MovieRepository $movieRepository, CommentRepository $commentRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->commentRepository = $commentRepository;
    }

    public function getAll(int $movieId)
    {
        $movie = $this->movieRepository->loadById($movieId);
        $comments = $this->commentRepository->findByMovie($movie);

        return array_map(
            fn(Comment $comment) => $comment->toArray(),
            $comments,
        );
    }
}