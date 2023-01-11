<?php

use Bramus\Router\Router;
use Juliana\Cinema\Application\Http\Web;
use Juliana\Cinema\Application\Http\Web\Auth\AuthPageController;
use Juliana\Cinema\Application\Http\Web\Auth\AuthUserController;
use Juliana\Cinema\Application\Http\Web\Auth\UpdateImageController;
use Juliana\Cinema\Application\Http\Web\Home\HomeController;
use Juliana\Cinema\Application\Http\Web\Movie\UpdateMovieController;
use Juliana\Cinema\Application\Http\Web\Movie\ViewMoviePageController;
use Psr\Container\ContainerInterface;

return function (Router $router, ContainerInterface $container): void {
    $router->get('/', $container->get(HomeController::class));

    $router->mount('/account', function () use ($router, $container) {
        $router->get('/', $container->get(Web\Auth\AccountPageController::class));
        $router->post('/', $container->get(Web\Auth\UpdateUserController::class));

        $router->post('/image', $container->get(UpdateImageController::class));
        $router->post('/account/password', $container->get(Web\Auth\UpdatePasswordController::class));
    });

    $router->mount('/movies', function () use ($router, $container) {
        $router->post('/{id}/comments', $container->get(Web\Movie\CreateCommentController::class));
        $router->get('/{id}', $container->get(ViewMoviePageController::class));
        $router->post('/{id}', $container->get(UpdateMovieController::class));
    });

    $router->mount('/auth', function () use ($router, $container) {
        $router->get('/', $container->get(AuthPageController::class));
        $router->post('/', $container->get(AuthUserController::class));
    });

    $router->get('/logout', $container->get(Web\Auth\LogoutPageController::class));
    $router->post('/users', $container->get(Web\Auth\CreateUserController::class));
};

