<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\DeleteMovieService;
use Juliana\Cinema\Framework\Session\Session;

class DeleteMovieController
{
    private DeleteMovieService $service;

    public function __construct(DeleteMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id)
    {
        try {
            $this->service->delete($id);
        } catch (Exception $e) {
            Response::redirect("dashboard", Session::danger($e->getMessage()));
        }

        Response::redirect("dashboard", Session::success("Deletado com sucesso"));
    }

}