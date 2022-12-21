<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Framework\Session\Session;

class LogoutPageController
{
    public function __invoke()
    {
        unset($_SESSION['user']);

        Response::redirect("", Session::success("Logout realizado com sucesso"));
    }
}