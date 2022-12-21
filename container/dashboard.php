<?php

use Juliana\Cinema\Application\Http\Web\Dashboard\DashboardController;
use Juliana\Cinema\Application\Http\Web\Movie\CreateMovieController;
use Juliana\Cinema\Domain\Dashboard\DashboardService;
use TinyContainer\TinyContainer;

return [

//Controller
    DashboardController::class => TinyContainer::resolve(DashboardController::class),

    CreateMovieController::class =>TinyContainer::resolve(CreateMovieController::class),

    //Service
    DashboardService::class => TinyContainer::resolve(DashboardService::class),

];