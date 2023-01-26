<?php

namespace Juliana\Cinema\Application\Http\Web\Home;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Home\SearchService;
use Juliana\Cinema\Domain\Movie\ListMovieService;
use Juliana\Cinema\Framework\Blade\Template;

class SearchPageController
{
    private Template $template;
    private SearchService $service;

    public function __construct(SearchService $service, Template $template)
{
    $this->template = $template;
    $this->service = $service;
}

    public function __invoke(string $name)
    {
        $movies = $this->service->findMovie($name);
        $content = $this->template->process("search", ['movies' => $movies ]);

        Response::html(200, $content)->render();
    }

}