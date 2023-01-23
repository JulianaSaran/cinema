<?php

namespace Juliana\Cinema\Application\Http\Web\Home;


use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Home\HomeService;
use Juliana\Cinema\Domain\Movie\MovieDetailed;
use Juliana\Cinema\Framework\Blade\Template;

class HomeController
{
    private Template $template;
    private HomeService $service;
    private MovieDetailed $movieDetailed;


    public function __construct(HomeService $service, Template $template, MovieDetailed $movieDetailed)
    {
        $this->template = $template;
        $this->service = $service;
        $this->movieDetailed = $movieDetailed;
    }

    public function __invoke()
    {
        $home = $this->service->getHomeData();

        $content = $this->template->process("index", ["home" => $home]);

        Response::html(200, $content)->render();
    }
}