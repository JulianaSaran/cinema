<?php

namespace Juliana\Cinema\Application\Http\Api;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\CreateMovieService;

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