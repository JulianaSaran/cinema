<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Movie\UpdateImageMovieService;
use Juliana\Cinema\Framework\Session\Session;

class UpdateImageMovieController
{
    private UpdateImageMovieService $service;

    public function __construct(UpdateImageMovieService $service)
    {
        $this->service = $service;
    }

    public function update(int $id)
    {
        $this->service->updateImage($id);

        Response::redirect("dashboard", Session::success('Atualizado com sucesso'));
    }
}