<?php

namespace Juliana\Cinema\Application\Http\Api\Category;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Category\UpdateCategoryService;

class UpdateCategoryController
{
    private UpdateCategoryService $service;

    public function __construct(UpdateCategoryService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $id)
    {
        $this->service->update($id, $_POST);

        $response = Response::html(200);
        $response->render();
    }
}