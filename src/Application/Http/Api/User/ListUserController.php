<?php

namespace Juliana\Cinema\Application\Http\Api\User;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\ListUserService;

class ListUserController
{
    private ListUserService $service;

    public function __construct(ListUserService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $user = $this->service->getUsers();

        $response = Response::json(200, $user);
        $response->render();
    }
}