<?php

use Juliana\Cinema\Application\Http\Web\Home\HomeController;
use Juliana\Cinema\Application\Http\Web\Home\SearchController;
use Juliana\Cinema\Application\Http\Web\Home\SearchPageController;
use Juliana\Cinema\Domain\Home\HomeService;
use Juliana\Cinema\Domain\Home\SearchService;
use TinyContainer\TinyContainer;

return [
    //Controller

    HomeController::class => TinyContainer::resolve(HomeController::class),
    SearchController::class =>TinyContainer::resolve(SearchController::class),
    SearchPageController::class => TinyContainer::resolve(SearchPageController::class),

    //Service

    HomeService::class => TinyContainer::resolve(HomeService::class),
    SearchService::class => TinyContainer::resolve(SearchService::class),

];