<?php

namespace Juliana\Cinema\Application\Http\Web\Home;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Home\SearchService;
use Juliana\Cinema\Domain\Movie\MovieDetailed;
use Juliana\Cinema\Domain\Movie\MovieDetailedService;
use Juliana\Cinema\Framework\Blade\Template;
use Juliana\Cinema\Framework\Session\Session;

class SearchController
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    public function __invoke($id)
    {
        try {
            $this->service->findMovie($name);
        } catch (Exception $e) {
            Response::redirect("movies/$id", Session::danger($e->getMessage()));
        }

        Response::redirect("movies/$id");


    }
}