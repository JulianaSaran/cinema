<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\UpdateMovieService;
use Juliana\Cinema\Framework\Session\Session;

class UpdateMovieController
{
    private UpdateMovieService $service;

    public function __construct(UpdateMovieService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id)
    {
        try {
            $this->service->update($id, $_POST);
        } catch (Exception $e) {
            Response::redirect("dashboard/movies/$id", Session::danger($e->getMessage()));;
        }

        Response::redirect("/movies/$id", Session::success('Atualizado com sucesso'));
    }
}