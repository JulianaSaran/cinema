<?php

use Bramus\Router\Router;
use Juliana\Cinema\Application\Http\Api\Category\CreateCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\DeleteCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\ListCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\UpdateCategoryController;
use Juliana\Cinema\Application\Http\Api\Comment\CreateCommentController;
use Juliana\Cinema\Application\Http\Api\Comment\DeleteCommentController;
use Juliana\Cinema\Application\Http\Api\Comment\ListCommentController;
use Juliana\Cinema\Application\Http\Api\Movie\CreateMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\DeleteMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\ListMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\MovieDetailedController;
use Juliana\Cinema\Application\Http\Api\Movie\UpdateMovieController;
use Juliana\Cinema\Application\Http\Api\Related\RelatedMovieCategoryController;
use Juliana\Cinema\Application\Http\Api\Related\UnrelatedMovieCategoryController;
use Juliana\Cinema\Application\Http\Api\User\CreateUserController;
use Juliana\Cinema\Application\Http\Api\User\DeleteUserController;
use Juliana\Cinema\Application\Http\Api\User\ListUserController;
use Juliana\Cinema\Application\Http\Api\User\UpdateUserController;
use Psr\Container\ContainerInterface;

return function (Router $router, ContainerInterface $container): void {
    $router->mount('/api', function () use ($router, $container) {
        $router->mount('/movies', function () use ($router, $container) {
            $router->get('', $container->get(ListMovieController::class));
            $router->post('', $container->get(CreateMovieController::class));

            $router->post('/{movie}/categories/{category}', $container->get(RelatedMovieCategoryController::class));
            $router->delete('/{movie}/categories/{category}', $container->get(UnrelatedMovieCategoryController::class));
            $router->get('/{movie}/comments', $container->get(ListCommentController::class));
            $router->post('/{movie}/comments', $container->get(CreateCommentController::class));
            $router->delete('/{movie}/comments/{id}', $container->get(DeleteCommentController::class));


            $router->post('/{id}', $container->get(UpdateMovieController::class));
            $router->delete('/{id}', $container->get(DeleteMovieController::class));
        });

        $router->mount('/categories', function () use ($router, $container) {
            $router->get('', $container->get(ListCategoryController::class));
            $router->post('', $container->get(CreateCategoryController::class));
            $router->post('/{id}', $container->get(UpdateCategoryController::class));
            $router->delete('/{id}', $container->get(DeleteCategoryController::class));
        });

        $router->get('/users', $container->get(ListUserController::class));
        $router->post('/users', $container->get(CreateUserController::class));
        $router->post('/users/{id}', $container->get(UpdateUserController::class));
        $router->delete('/users/{id}', $container->get(DeleteUserController::class));


        $router->get('/api/movies/{id}', $container->get(MovieDetailedController::class));
    });
};