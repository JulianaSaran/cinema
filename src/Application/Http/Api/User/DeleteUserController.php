<?php

namespace Juliana\Cinema\Application\Http\Api\User;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\DeleteUserService;

class DeleteUserController
{
    private DeleteUserService $service;

    public function __construct(DeleteUserService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id): void
    {
        $this->service->delete($id);

        $response = Response::html(200);
        $response->render();
    }
}