<?php

use Juliana\Cinema\Application\Http\Api\Related\RelatedMovieCategoryController;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;
use Juliana\Cinema\Domain\Related\RelatedMovieCategoryService;
use Juliana\Cinema\Infra\Related\MySqlMovieCategoryRepository;
use Psr\Container\ContainerInterface;

return [
    //CONTROLLERS
    RelatedMovieCategoryController::class => fn(ContainerInterface $container) => new RelatedMovieCategoryController(
        service: $container->get(RelatedMovieCategoryService::class),
    ),

    //SERVICE
    RelatedMovieCategoryService::class => fn(ContainerInterface $container) => new RelatedMovieCategoryService(
        movieRepository: $container->get(MovieRepository::class),
        categoryRepository: $container->get(CategoryRepository::class),
        movieCategoryRepository: $container->get(MovieCategoryRepository::class),
    ),

    //REPOSITORY
    MovieCategoryRepository::class =>fn(ContainerInterface $container) => new MySqlMovieCategoryRepository(
        pdo: $container->get(PDO::class),
        categoryRepository: $container->get(CategoryRepository::class),
    ),
];
