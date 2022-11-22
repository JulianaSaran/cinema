<?php

namespace Juliana\Cinema\Application\Http\Api\Category;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Category\ListCategoryService;

class ListCategoryController
{
    private ListCategoryService $service;

    public function __construct(ListCategoryService $service)
    {

        $this->service = $service;
    }

    public function __invoke()
    {
        $category = $this->service->getAll();

        $response = Response::json(200, $category);
        $response->render();
    }
}