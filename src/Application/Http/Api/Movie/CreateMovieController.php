<?php

namespace Juliana\Cinema\Application\Http\Api\Movie;

use Juliana\Cinema\Domain\Movie\CreateMovieService;

class CreateMovieController
{
    private CreateMovieService $service;

    public function __construct(CreateMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $this->service->create($_POST);
    }

}