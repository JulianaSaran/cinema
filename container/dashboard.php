<?php

use Juliana\Cinema\Application\Http\Web\Dashboard\DashboardController;
use Juliana\Cinema\Application\Http\Web\Movie\AddMovieController;
use Juliana\Cinema\Domain\Dashboard\DashboardService;
use TinyContainer\TinyContainer;

return [

//Controller
    DashboardController::class => TinyContainer::resolve(DashboardController::class),

    AddMovieController::class =>TinyContainer::resolve(AddMovieController::class),

    //Service
    DashboardService::class => TinyContainer::resolve(DashboardService::class),

];