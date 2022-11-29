<?php

namespace Juliana\Cinema\Domain\Comment;

use Juliana\Cinema\Application\Http\Response;

class DeleteCommentService
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function delete(int $id): void
    {
        $comment = $this->commentRepository->loadById($id);

        $this->commentRepository->delete($comment);
    }
}