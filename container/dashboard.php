<?php

use Juliana\Cinema\Application\Http\Web\Dashboard\DashboardPageController;
use Juliana\Cinema\Application\Http\Web\Movie\CreateMovieController;
use Juliana\Cinema\Domain\Dashboard\DashboardService;
use TinyContainer\TinyContainer;

return [

//Controller
    DashboardPageController::class => TinyContainer::resolve(DashboardPageController::class),

    CreateMovieController::class =>TinyContainer::resolve(CreateMovieController::class),

    //Service
    DashboardService::class => TinyContainer::resolve(DashboardService::class),

];