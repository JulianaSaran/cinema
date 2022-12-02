<?php

namespace Juliana\Cinema\Application\Http\Api\User;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\UpdateUserService;

class UpdateUserController
{
    private UpdateUserService $service;

    public function __construct(UpdateUserService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id)
    {
        $this->service->update($id, $_POST);

        $response = Response::html(200);
        $response->render();
    }
}