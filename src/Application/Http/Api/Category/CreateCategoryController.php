<?php

namespace Juliana\Cinema\Application\Http\Api\Category;

use Juliana\Cinema\Domain\Category\CreateCategoryService;

class CreateCategoryController
{
    private CreateCategoryService $service;

    public function __construct(CreateCategoryService $service)
    {
        $this->service = $service;
    }

    public function __invoke():void
    {
        $this->service->create($_POST);
    }
}