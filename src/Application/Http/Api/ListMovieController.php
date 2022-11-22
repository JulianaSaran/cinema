<?php

namespace Juliana\Cinema\Application\Http\Api;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\ListMovieService;

class ListMovieController
{
    private ListMovieService $service;

    public function __construct(ListMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $movies = $this->service->getAll();

        Response::json(200, $movies)->render();
    }
}