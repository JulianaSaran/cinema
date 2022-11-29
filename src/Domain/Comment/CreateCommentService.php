<?php

namespace Juliana\Cinema\Domain\Comment;

use DateTime;

class CreateCommentService
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create(int $movieId, array $data): void
    {
        $comment = new Comment(
            id: 0,
            movieId: $movieId,
            writer: $data["writer"],
            comment: $data["comment"],
            commentedAt: new DateTime(),
        );
        $this->commentRepository->create($comment);
    }
}