<?php

use Juliana\Cinema\Application\Http\Web\HomeController;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Home\HomeService;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use TinyContainer\TinyContainer;

return [
    //Controller

    HomeController::class => TinyContainer::resolve(HomeController::class),

    //Service

    HomeService::class => TinyContainer::resolve(HomeService::class),

];