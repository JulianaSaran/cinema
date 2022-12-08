<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Juliana\Cinema\Application\Http\Response;

class LogoutUserController
{
    public function __invoke()
    {
        unset($_SESSION['user']);

        Response::redirect("index.php/");
    }
}