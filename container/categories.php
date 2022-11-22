<?php

use Juliana\Cinema\Application\Http\Api\Category\CreateCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\ListCategoryController;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Category\CreateCategoryService;
use Juliana\Cinema\Domain\Category\ListCategoryService;
use Juliana\Cinema\Infra\Category\MySqlCategoryRepository;
use Psr\Container\ContainerInterface;

return [
    //CONTROLLERS CATEGORIES
    ListCategoryController::class => fn(ContainerInterface $container) => new ListCategoryController(
        service: $container->get(ListCategoryService::class),
    ),
    CreateCategoryController::class =>fn (ContainerInterface $container) => new CreateCategoryController(
        service: $container->get(CreateCategoryService::class),
    ),

    //SERVICE CATEGORIES
    ListCategoryService::class => fn(ContainerInterface $container) => new ListCategoryService(
        categoryRepository: $container->get(CategoryRepository::class),
    ),
    CreateCategoryService::class => fn(ContainerInterface $container) => new CreateCategoryService(
        categoryRepository: $container->get(CategoryRepository::class),
    ),


    //REPOSITORY CATEGORIES
    CategoryRepository::class => fn(ContainerInterface $container) => new MySqlCategoryRepository(
        pdo: $container->get(PDO::class),
    ),
];