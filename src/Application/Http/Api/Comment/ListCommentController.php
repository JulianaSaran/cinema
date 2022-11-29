<?php

namespace Juliana\Cinema\Application\Http\Api\Comment;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Comment\ListCommentService;

class ListCommentController
{
    private ListCommentService $commentService;

    public function __construct(ListCommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function __invoke(int $movie)
    {
        $comment = $this->commentService->getAll($movie);

        $response = Response::json(200, $comment);
        $response->render();
    }
}