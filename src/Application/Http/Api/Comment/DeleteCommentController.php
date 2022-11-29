<?php

namespace Juliana\Cinema\Application\Http\Api\Comment;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Comment\CommentRepository;
use Juliana\Cinema\Domain\Comment\DeleteCommentService;

class DeleteCommentController
{
    private DeleteCommentService $service;

    public function __construct(DeleteCommentService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id)
    {
        $this->service->delete($id);

        $response = Response::html(200);
        $response->render();
    }
}