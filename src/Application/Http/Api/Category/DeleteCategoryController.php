<?php

namespace Juliana\Cinema\Application\Http\Api\Category;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Category\DeleteCategoryService;
use Juliana\Cinema\Domain\Movie\DeleteMovieService;

class DeleteCategoryController
{
    private DeleteCategoryService $service;

    public function __construct(DeleteCategoryService $service)
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