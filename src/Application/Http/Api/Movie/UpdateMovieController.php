<?php

namespace Juliana\Cinema\Application\Http\Api\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\EntryNotFoundException;
use Juliana\Cinema\Domain\Movie\UpdateMovieService;

class UpdateMovieController
{
    private UpdateMovieService $service;

    public function __construct(UpdateMovieService $service)
    {
        $this->service = $service;
    }

    /**
     * invoca a função update do UpdateMovieService
     */
    public function __invoke(int $id)
    {
        try {
            $this->service->update($id, $_POST);
        } catch (EntryNotFoundException $e) {
            $response = Response::json(404, ["message" => "Movie not found"]);
            $response->render();
        }

        $response = Response::html(200, "");
        $response->render();
    }
}

