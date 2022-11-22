<?php

use Bramus\Router\Router;
use Juliana\Cinema\Application\Http\Api\Category\CreateCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\ListCategoryController;
use Juliana\Cinema\Application\Http\Api\Movie\CreateMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\DeleteMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\ListMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\UpdateMovieController;
use TinyContainer\TinyContainer;

include_once("../vendor/autoload.php");

$container = new TinyContainer(array_merge(
    include __DIR__ . "/../container/infrastructure.php",
    include __DIR__ . "/../container/movies.php",
    include __DIR__ . "/../container/categories.php",
));

$_SERVER['REQUEST_URI'] = str_replace("index.php/", "", $_SERVER['REQUEST_URI']);

$router = new Router();

$router->get('/api/movies', $container->get(ListMovieController::class));
$router->post('/api/movies', $container->get(CreateMovieController::class));
$router->post('/api/movies/{id}', $container->get(UpdateMovieController::class));
$router->delete('/api/movies/{id}', $container->get(DeleteMovieController::class));
$router->get('/api/categories', $container->get(ListCategoryController::class));
$router->post('/api/categories', $container->get(CreateCategoryController::class));


$router->run();