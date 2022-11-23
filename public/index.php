<?php

use Bramus\Router\Router;
use Juliana\Cinema\Application\Http\Api\Category\CreateCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\DeleteCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\ListCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\UpdateCategoryController;
use Juliana\Cinema\Application\Http\Api\Movie\CreateMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\DeleteMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\ListMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\UpdateMovieController;
use Juliana\Cinema\Application\Http\Api\Related\RelatedMovieCategoryController;
use TinyContainer\TinyContainer;

include_once("../vendor/autoload.php");

$container = new TinyContainer(array_merge(
    include __DIR__ . "/../container/infrastructure.php",
    include __DIR__ . "/../container/movies.php",
    include __DIR__ . "/../container/categories.php",
    include __DIR__ . "/../container/movieCategory.php",
));

$_SERVER['REQUEST_URI'] = str_replace("index.php/", "", $_SERVER['REQUEST_URI']);

$router = new Router();
$router->post('/api/movies/{movie}/categories/{category}', $container->get(RelatedMovieCategoryController::class));
//$router->delete('/api/movies/{movie}/categories/{category}', $container->get(UnrelatedMovieCategoryController::class));

$router->get('/api/movies', $container->get(ListMovieController::class));
$router->post('/api/movies', $container->get(CreateMovieController::class));
$router->post('/api/movies/{id}', $container->get(UpdateMovieController::class));
$router->delete('/api/movies/{id}', $container->get(DeleteMovieController::class));
$router->get('/api/categories', $container->get(ListCategoryController::class));
$router->post('/api/categories', $container->get(CreateCategoryController::class));
$router->post('/api/categories/{id}', $container->get(UpdateCategoryController::class));
$router->delete('/api/categories/{id}', $container->get(DeleteCategoryController::class));




$router->run();