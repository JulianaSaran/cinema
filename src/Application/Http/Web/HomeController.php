<?php

namespace Juliana\Cinema\Application\Http\Web;


use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Home\HomeService;
use Juliana\Cinema\Domain\Movie\ListMovieService;
use Juliana\Cinema\Framework\Blade\Template;

class HomeController
{
    private Template $template;
    private HomeService $service;


    public function __construct(HomeService $service,Template $template)
    {
        $this->template = $template;
        $this->service = $service;
    }

    public function __invoke()
    {
        $home = $this->service->getHomeData();

        $content = $this->template->process("index", ["home" => $home]);

        Response::html(200, $content)->render();
    }
}