<?php

namespace Juliana\Cinema\Application\Http\Api;


use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\DeleteMovieService;

class DeleteMovieController
{
    private DeleteMovieService $service;

    public function __construct(DeleteMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id)
    {
        $this->service->delete($id);

        $response = Response::html(200);
        $response->render();
    }
}