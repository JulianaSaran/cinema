<?php

use Bramus\Router\Router;
use Psr\Container\ContainerInterface;
use Juliana\Cinema\Application\Http\Web;

return function (Router $router, ContainerInterface $container): void {
    $router->mount('/dashboard', function () use ($router, $container) {
        $router->get('', $container->get(Web\Dashboard\DashboardController::class));
        $router->get('/new', $container->get(Web\Movie\CreateMoviePageController::class));
        $router->post('/movies', $container->get(Web\Movie\CreateMovieController::class));
        $router->get('/movies/{id}', $container->get(Web\Movie\UpdatePageController::class));
    });
};
