<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\Movie;
use Juliana\Cinema\Domain\Movie\MovieDetailedService;
use Juliana\Cinema\Framework\Blade\Template;

class ViewMoviePageController
{
    private MovieDetailedService $service;
    private Template $template;

    public function __construct(MovieDetailedService $service, Template $template)
    {
        $this->service = $service;
        $this->template = $template;
    }

    public function __invoke(int $id)
    {
        $movie = $this->service->getMovie($id);

        $content = $this->template->process("movie", ["movie" => $movie]);

        Response::html(200, $content)->render();
    }
}