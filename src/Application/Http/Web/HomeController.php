<?php

namespace Juliana\Cinema\Application\Http\Web;


use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\ListMovieService;
use Juliana\Cinema\Framework\Blade\Template;

class HomeController
{
    private Template $template;
    private ListMovieService $service;


    public function __construct(ListMovieService $service,Template $template)
    {

        $this->template = $template;

        $this->service = $service;
    }

    public function __invoke()
    {
        $movies = $this->service->getAll();

        $content = $this->template->process("index", ["movies" => $movies]);
        //$content = $this->template->process("index", []);

        Response::html(200, $content)->render();
    }
}