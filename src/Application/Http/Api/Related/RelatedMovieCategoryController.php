<?php

namespace Juliana\Cinema\Application\Http\Api\Related;

use Juliana\Cinema\Domain\Related\RelatedMovieCategoryService;

class RelatedMovieCategoryController
{
    private RelatedMovieCategoryService $service;

    public function __construct(RelatedMovieCategoryService $service)
    {
        $this->service = $service;
    }

    public function __invoke(int $movie, int $category)
    {
        $this->service->relate($movie, $category);

    }
}