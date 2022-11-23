<?php

namespace Juliana\Cinema\Application\Http\Api\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\DeleteMovieService;

class DeleteMovieController
{
    private DeleteMovieService $service;

    public function __construct(DeleteMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id)
    {
        //invoca a função delete criada no service e deleta pelo id;
        $this->service->delete($id);

        $response = Response::html(200);
        $response->render();
    }
}