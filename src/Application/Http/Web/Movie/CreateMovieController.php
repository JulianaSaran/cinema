<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\CreateMovieService;
use Juliana\Cinema\Framework\Session\Session;

class CreateMovieController
{
    private CreateMovieService $service;

    public function __construct(CreateMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        try {
            $this->service->create($_POST);
        } catch (Exception $e) {
            Response::redirect("dashboard.new", Session::danger($e->getMessage()));
        }

        Response::redirect("dashboard", Session::success("Criado com sucesso"));
    }
}