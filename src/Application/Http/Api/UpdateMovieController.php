<?php

namespace Juliana\Cinema\Application\Http\Api;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\UpdateMovieService;

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
        $response = new Response(200, "", "text/html");
        $response->render();
    }
}

