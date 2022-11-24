<?php

namespace Juliana\Cinema\Application\Http\Api\Related;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Related\UnrelatedMovieCategoryService;

class UnrelatedMovieCategoryController
{
    private UnrelatedMovieCategoryService $service;

    public function __construct(UnrelatedMovieCategoryService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $movie, int $category)
    {
       $this->service->unrelated($movie, $category);

       $response = Response:: html(202);
       $response->render();
    }
}