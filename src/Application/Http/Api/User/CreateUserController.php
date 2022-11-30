<?php

namespace Juliana\Cinema\Application\Http\Api\User;

use Juliana\Cinema\Domain\User\CreateUserService;

class CreateUserController
{
    private CreateUserService $service;

    public function __construct(CreateUserService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $this->service->create($_POST);
    }
}