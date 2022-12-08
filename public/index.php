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
use Juliana\Cinema\Application\Http\Web;
use Juliana\Cinema\Application\Http\Web\Auth\AuthController;
use Juliana\Cinema\Application\Http\Web\Auth\AuthUserController;
use Juliana\Cinema\Application\Http\Web\HomeController;
use Juliana\Cinema\Application\Http\Web\Movie\ViewMovieController;
use TinyContainer\TinyContainer;

include_once("../vendor/autoload.php");
session_start();

$container = new TinyContainer(array_merge(
    include __DIR__ . "/../container/account.php",
    include __DIR__ . "/../container/infrastructure.php",
    include __DIR__ . "/../container/movies.php",
    include __DIR__ . "/../container/categories.php",
    include __DIR__ . "/../container/movieCategory.php",
    include __DIR__ . "/../container/comments.php",
    include __DIR__ . "/../container/users.php",
));

$_SERVER['REQUEST_URI'] = str_replace("index.php/", "", $_SERVER['REQUEST_URI']);

$router = new Router();

/**
 * ROTAS DO PORTAL
 */
$router->get('/', $container->get(HomeController::class));
$router->get('/movies/{id}', $container->get(ViewMovieController::class));


$router->get('/auth', $container->get(AuthController::class));
$router->post('/auth', $container->get(AuthUserController::class));
$router->get('/logout', $container->get(Web\Auth\LogoutUserController::class));
$router->post('/users', $container->get(Web\Auth\CreateUserController::class));
$router->get('/account', $container->get(Web\Auth\AccountController::class));

/**
 * ROTAS DE API
 */
$router->post('/api/movies/{movie}/categories/{category}', $container->get(RelatedMovieCategoryController::class));
$router->delete('/api/movies/{movie}/categories/{category}', $container->get(UnrelatedMovieCategoryController::class));

$router->get('/api/movies/{movie}/comments', $container->get(ListCommentController::class));
$router->post('/api/movies/{movie}/comments', $container->get(CreateCommentController::class));
$router->delete('/api/comments/{id}', $container->get(DeleteCommentController::class));

$router->get('/api/movies', $container->get(ListMovieController::class));
$router->post('/api/movies', $container->get(CreateMovieController::class));
$router->post('/api/movies/{id}', $container->get(UpdateMovieController::class));
$router->delete('/api/movies/{id}', $container->get(DeleteMovieController::class));
$router->get('/api/categories', $container->get(ListCategoryController::class));
$router->post('/api/categories', $container->get(CreateCategoryController::class));
$router->post('/api/categories/{id}', $container->get(UpdateCategoryController::class));
$router->delete('/api/categories/{id}', $container->get(DeleteCategoryController::class));
$router->get('/api/users', $container->get(ListUserController::class));
$router->post('/api/users', $container->get(CreateUserController::class));
$router->post('/api/users/{id}', $container->get(UpdateUserController::class));
$router->delete('/api/users/{id}', $container->get(DeleteUserController::class));


$router->get('/api/movies/{id}', $container->get(MovieDetailedController::class));


$router->run();