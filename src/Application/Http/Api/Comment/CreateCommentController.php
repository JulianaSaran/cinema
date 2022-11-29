<?php

namespace Juliana\Cinema\Application\Http\Api\Comment;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Comment\CreateCommentService;

class CreateCommentController
{
    private CreateCommentService $service;

    public function __construct(CreateCommentService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $movie)
    {
        $this->service->create($movie, $_POST);
    }
}