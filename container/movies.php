<?php

use Juliana\Cinema\Application\Http\Api\Movie\CreateMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\DeleteMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\ListMovieController;
use Juliana\Cinema\Application\Http\Api\Movie\MovieDetailedController;
use Juliana\Cinema\Application\Http\Api\Movie\UpdateMovieController;
use Juliana\Cinema\Application\Http\Web\Movie\EditMovieController;
use Juliana\Cinema\Application\Http\Web\Movie\EditPageController;
use Juliana\Cinema\Application\Http\Web\Movie\NewMoviePageController;
use Juliana\Cinema\Application\Http\Web\Movie\UpdateImageMovieController;
use Juliana\Cinema\Application\Http\Web\Movie\ViewMoviePageController;
use Juliana\Cinema\Domain\Movie\CreateMovieService;
use Juliana\Cinema\Domain\Movie\DeleteMovieService;
use Juliana\Cinema\Domain\Movie\ListMovieService;
use Juliana\Cinema\Domain\Movie\MovieDetailedService;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use Juliana\Cinema\Domain\Movie\UpdateImageMovieService;
use Juliana\Cinema\Domain\Movie\UpdateMovieService;
use Juliana\Cinema\Framework\Blade\Template;
use Juliana\Cinema\Infra\Movie\MySqlMovieRepository;
use Psr\Container\ContainerInterface;
use TinyContainer\TinyContainer;

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
    MovieDetailedController::class => fn(ContainerInterface $container) => new MovieDetailedController(
        service: $container->get(MovieDetailedService::class),
    ),
    ViewMoviePageController::class => fn(ContainerInterface $container) => new ViewMoviePageController(
        service: $container->get(MovieDetailedService::class),
        template: $container->get(Template::class),
    ),
    NewMoviePageController::class => TinyContainer::resolve(NewMoviePageController::class),

    UpdateImageMovieController::class =>TinyContainer::resolve(UpdateImageMovieController::class),

    EditPageController::class => TinyContainer::resolve(EditPageController::class),

    EditMovieController::class =>TinyContainer::resolve(EditMovieController::class),

    //SERVICE MOVIES
    ListMovieService::class => fn(ContainerInterface $container) => new ListMovieService(
        movieRepository: $container->get(MovieRepository::class),
    ),
    CreateMovieService::class =>TinyContainer::resolve(CreateMovieService::class),

    UpdateMovieService::class=>TinyContainer::resolve(UpdateMovieService::class),

    DeleteMovieService::class => fn(ContainerInterface $container) => new DeleteMovieService(
        movieRepository: $container->get(MovieRepository::class),
    ),
    MovieDetailedService::class => TinyContainer::resolve(MovieDetailedService::class),

    UpdateImageMovieService::class =>TinyContainer::resolve(UpdateImageMovieService::class),

    //REPOSITORY MOVIES
    MovieRepository::class => TinyContainer::resolve(MySqlMovieRepository::class),

];