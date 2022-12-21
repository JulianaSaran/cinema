<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\Auth\LoadAuthenticatedUser;
use Juliana\Cinema\Domain\User\CreateUserService;
use Juliana\Cinema\Framework\Blade\Template;
use Juliana\Cinema\Framework\Session\Session;

class AccountPageController
{
    private LoadAuthenticatedUser $service;
    private Template $template;

    public function __construct(Template $template, LoadAuthenticatedUser $service)
    {
        $this->service = $service;
        $this->template = $template;
    }

    public function __invoke()
    {
        try {
            $this->service->load($_SESSION["user"]?? 0);
        } catch (Exception $e) {
            Response::redirect("auth", Session::danger('Usuário não autenticado'));
        }

        $response = Response::html(200, $this->template->process("account"));
        $response->render();
    }
}