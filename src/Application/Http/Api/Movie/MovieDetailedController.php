<?php

namespace Juliana\Cinema\Application\Http\Api\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\MovieDetailedService;

class MovieDetailedController
{
    private MovieDetailedService $service;

    public function __construct(MovieDetailedService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $movieId)
    {
        $movie = $this->service->getMovie($movieId);

        $response = Response::json(200, $movie);
        $response->render();
    }
}