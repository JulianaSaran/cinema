<?php

use Bramus\Router\Router;
use Juliana\Cinema\Application\Http\Api\CreateMovieController;
use Juliana\Cinema\Application\Http\Api\DeleteMovieController;
use Juliana\Cinema\Application\Http\Api\ListMovieController;
use Juliana\Cinema\Application\Http\Api\UpdateMovieController;
use Juliana\Cinema\Domain\CreateMovieService;
use Juliana\Cinema\Domain\DeleteMovieService;
use Juliana\Cinema\Domain\ListMovieService;
use Juliana\Cinema\Domain\MovieRepository;
use Juliana\Cinema\Domain\UpdateMovieService;
use Juliana\Cinema\Infra\MySqlMovieRepository;
use Psr\Container\ContainerInterface;
use TinyContainer\TinyContainer;

include_once("../vendor/autoload.php");

$container = new TinyContainer([
    //INFRA
    PDO::class => fn(ContainerInterface $container) => new PDO(
        "mysql:host=localhost;dbname=cinema",
        "root",
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    ),

    //CONTROLLERS
    ListMovieController::class => fn(ContainerInterface $container) => new ListMovieController(
        service: $container->get(ListMovieService::class),
    ),
    CreateMovieController::class => fn(ContainerInterface $container) => new CreateMovieController(
        service: $container->get(CreateMovieService::class),
    ),
    UpdateMovieController::class => fn(ContainerInterface $container) => new UpdateMovieController(
        service: $container->get(UpdateMovieService::class),
    ),
    DeleteMovieController::class => fn(ContainerInterface $container) => new DeleteMovieController(
        service: $container->get(DeleteMovieService::class),
    ),

    //SERVICE
    ListMovieService::class => fn(ContainerInterface $container) => new ListMovieService(
        movieRepository: $container->get(MovieRepository::class),
    ),
    CreateMovieService::class => fn(ContainerInterface $container) => new CreateMovieService(
        movieRepository: $container->get(MovieRepository::class),
    ),
    UpdateMovieService::class => fn(ContainerInterface $container) => new UpdateMovieService(
        movieRepository: $container->get(MovieRepository::class),
    ),
    DeleteMovieService::class => fn(ContainerInterface $container) => new DeleteMovieService(
        movieRepository: $container->get(MovieRepository::class),
    ),

    //REPOSITORY
    MovieRepository::class => fn(ContainerInterface $container) => new MySqlMovieRepository(
        pdo: $container->get(PDO::class),
    ),
]);

$_SERVER['REQUEST_URI'] = str_replace("index.php/", "", $_SERVER['REQUEST_URI']);

$router = new Router();

$router->get('/api/movies', $container->get(ListMovieController::class));
$router->post('/api/movies', $container->get(CreateMovieController::class));
$router->post('/api/movies/{id}', $container->get(UpdateMovieController::class));
$router->delete('/api/movies/{id}', $container->get(DeleteMovieController::class));


$router->run();