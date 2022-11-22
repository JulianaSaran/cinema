<?php

use Juliana\Cinema\Application\Http\Api\Movie\CreateMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\DeleteMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\ListMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\UpdateMovieController;
use Juliana\Cinema\Domain\Movie\CreateMovieService;
use Juliana\Cinema\Domain\Movie\DeleteMovieService;
use Juliana\Cinema\Domain\Movie\ListMovieService;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use Juliana\Cinema\Domain\Movie\UpdateMovieService;
use Juliana\Cinema\Infra\Movie\MySqlMovieRepository;
use Psr\Container\ContainerInterface;

return [
    //CONTROLLERS MOVIES
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

    //SERVICE MOVIES
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

    //REPOSITORY MOVIES
    MovieRepository::class => fn(ContainerInterface $container) => new MySqlMovieRepository(
        pdo: $container->get(PDO::class),
    ),
];