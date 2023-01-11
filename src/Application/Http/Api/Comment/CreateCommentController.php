<?php

namespace Juliana\Cinema\Application\Http\Api\Comment;

use Juliana\Cinema\Domain\Comment\CreateCommentService;
use Juliana\Cinema\Infra\User\HttpUserFactory;

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