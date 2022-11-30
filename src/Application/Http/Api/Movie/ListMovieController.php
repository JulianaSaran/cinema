<?php

namespace Juliana\Cinema\Application\Http\Api\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\ListMovieService;
use Juliana\Cinema\Domain\Movie\Movie;

class ListMovieController
{
    private ListMovieService $service;

    public function __construct(ListMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $movies =  array_map(
            fn (Movie $movie) => $movie->toArray(),
            $this->service->getAll(),
        );

        Response::json(200, $movies)->render();
    }
}