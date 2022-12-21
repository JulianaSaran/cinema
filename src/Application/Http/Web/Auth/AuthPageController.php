<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Framework\Blade\Template;

class AuthPageController
{
    private Template $template;

    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    public function __invoke()
    {
        $content = $this->template->process("auth", []);

        Response::html(200, $content)->render();
    }
}