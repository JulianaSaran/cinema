<?php

namespace Juliana\Cinema\Application\Http\Web;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\ListMovieService;
use Juliana\Cinema\Framework\Blade\Template;

class HomeController
{
    private ListMovieService $service;
    private Template $template;

    public function __construct(ListMovieService $service, Template $template)
    {
        $this->service = $service;
        $this->template = $template;
    }

    public function __invoke()
    {
        $movies = $this->service->getAll();

        $content = $this->template->process("movie.list", ["movies" => $movies]);

        Response::html(200, $content)->render();
    }
}