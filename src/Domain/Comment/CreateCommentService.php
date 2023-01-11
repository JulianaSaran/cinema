<?php

namespace Juliana\Cinema\Domain\Comment;

use DateTime;
use Juliana\Cinema\Domain\User\User;

class CreateCommentService
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create(User $writer, int $movieId, array $data): void
    {
        $comment = new Comment(
            id: 0,
            movieId: $movieId,
            writer: $writer,
            comment: $data["comment"],
            rating: $data["rating"],
            commentedAt: new DateTime(),
        );
        $this->commentRepository->create($comment);
    }
}