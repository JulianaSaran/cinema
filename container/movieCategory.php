<?php

use Juliana\Cinema\Application\Http\Api\Related\RelatedMovieCategoryController;
use Juliana\Cinema\Application\Http\Api\Related\UnrelatedMovieCategoryController;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;
use Juliana\Cinema\Domain\Related\RelatedMovieCategoryService;
use Juliana\Cinema\Domain\Related\UnrelatedMovieCategoryService;
use Juliana\Cinema\Infra\Related\MySqlMovieCategoryRepository;
use Psr\Container\ContainerInterface;
use TinyContainer\TinyContainer;

return [
    //CONTROLLERS
    RelatedMovieCategoryController::class => fn(ContainerInterface $container) => new RelatedMovieCategoryController(
        service: $container->get(RelatedMovieCategoryService::class),
    ),
    UnrelatedMovieCategoryController::class =>fn(ContainerInterface $container) => new UnrelatedMovieCategoryController(
        service: $container->get(UnrelatedMovieCategoryService::class),
    ),

    //SERVICE
    RelatedMovieCategoryService::class => fn(ContainerInterface $container) => new RelatedMovieCategoryService(
        movieRepository: $container->get(MovieRepository::class),
        categoryRepository: $container->get(CategoryRepository::class),
        movieCategoryRepository: $container->get(MovieCategoryRepository::class),
    ),
    UnrelatedMovieCategoryService::class => fn(ContainerInterface $container) => new UnrelatedMovieCategoryService(
        movieCategoryRepository: $container->get(MovieCategoryRepository::class),
        movieRepository: $container->get(MovieRepository::class),
        categoryRepository: $container->get(CategoryRepository::class),
    ),

    //REPOSITORY
    MovieCategoryRepository::class => TinyContainer::resolve(MySqlMovieCategoryRepository::class),
];
