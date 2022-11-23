<?php

use Juliana\Cinema\Application\Http\Api\Category\CreateCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\DeleteCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\ListCategoryController;
use Juliana\Cinema\Application\Http\Api\Category\UpdateCategoryController;
use Juliana\Cinema\Domain\Category\CategoryRepository;
use Juliana\Cinema\Domain\Category\CreateCategoryService;
use Juliana\Cinema\Domain\Category\DeleteCategoryService;
use Juliana\Cinema\Domain\Category\ListCategoryService;
use Juliana\Cinema\Domain\Category\UpdateCategoryService;
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
    UpdateCategoryController::class => fn(ContainerInterface $container) => new UpdateCategoryController(
        service: $container->get(UpdateCategoryService::class),
    ),
    DeleteCategoryController::class => fn(ContainerInterface $container) => new DeleteCategoryController(
        service: $container->get(DeleteCategoryService::class),
    ),

    //SERVICE CATEGORIES
    ListCategoryService::class => fn(ContainerInterface $container) => new ListCategoryService(
        categoryRepository: $container->get(CategoryRepository::class),
    ),
    CreateCategoryService::class => fn(ContainerInterface $container) => new CreateCategoryService(
        categoryRepository: $container->get(CategoryRepository::class),
    ),
    UpdateCategoryService::class => fn(ContainerInterface $container) => new UpdateCategoryService(
        categoryRepository: $container->get(CategoryRepository::class),
    ),
    DeleteCategoryService::class => fn(ContainerInterface $container) => new DeleteCategoryService(
        categoryRepository: $container->get(CategoryRepository::class),
    ),

    //REPOSITORY CATEGORIES
    CategoryRepository::class => fn(ContainerInterface $container) => new MySqlCategoryRepository(
        pdo: $container->get(PDO::class),
    ),
];