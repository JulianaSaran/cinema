<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\Auth\AuthUserService;
use Juliana\Cinema\Framework\Session\Session;

class AuthUserController
{
    private AuthUserService $service;

    public function __construct(AuthUserService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        try {
            $user = $this->service->auth($_POST);
        } catch (Exception $e) {
            Response::redirect(
                location: "auth",
                session: Session::danger($e->getMessage()),
            );
        }

        Response::redirect(
            location: "",
            session: Session::success("Bem vindo!", ["user" => $user->id]),
        );
    }
}