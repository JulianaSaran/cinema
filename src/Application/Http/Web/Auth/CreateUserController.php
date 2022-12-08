<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\CreateUserService;
use Juliana\Cinema\Framework\Session\Session;

class CreateUserController
{
    private CreateUserService $service;

    public function __construct(CreateUserService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        try {
            $this->service->create($_POST);
        } catch (Exception $e) {
            Response::redirect("auth", Session::danger($e->getMessage()));
        }

        Response::redirect("auth", Session::success("Criado com sucesso"));
    }
}