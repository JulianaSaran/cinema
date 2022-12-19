<?php

use Juliana\Cinema\Application\Http\Web\Home\HomeController;
use Juliana\Cinema\Domain\Home\HomeService;
use TinyContainer\TinyContainer;

return [
    //Controller

    HomeController::class => TinyContainer::resolve(HomeController::class),

    //Service

    HomeService::class => TinyContainer::resolve(HomeService::class),

];