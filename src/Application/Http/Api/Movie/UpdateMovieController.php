<?php

namespace Juliana\Cinema\Application\Http\Api\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\UpdateMovieService;

class UpdateMovieController
{
    private UpdateMovieService $service;

    public function __construct(UpdateMovieService $service)
    {
        $this->service = $service;
    }

    /**
     * inova a função update do UpdateMovieService
     */
    public function __invoke(int $id)
    {
        $this->service->update($id, $_POST);

        $response = Response::html(200, "");
        $response->render();
    }
}

