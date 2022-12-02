<?php

use Juliana\Cinema\Application\Http\Api\User\CreateUserController;
use Juliana\Cinema\Application\Http\Api\User\DeleteUserController;
use Juliana\Cinema\Application\Http\Api\User\ListUserController;
use Juliana\Cinema\Application\Http\Api\User\UpdateUserController;
use Juliana\Cinema\Domain\User\CreateUserService;
use Juliana\Cinema\Domain\User\DeleteUserService;
use Juliana\Cinema\Domain\User\ListUserService;
use Juliana\Cinema\Domain\User\UpdateUserService;
use Juliana\Cinema\Domain\User\UserRepository;
use Juliana\Cinema\Infra\User\MySqlUserRepository;
use Psr\Container\ContainerInterface;

return[
    //CONTROLLER
    ListUserController::class => fn(ContainerInterface $container)=> new ListUserController(
        service: $container->get(ListUserService::class),
    ),
    CreateUserController::class => fn(ContainerInterface $container) => new CreateUserController(
        service: $container->get(CreateUserService::class),
    ),
    UpdateUserController::class => fn(ContainerInterface $container) => new UpdateUserController(
        service: $container->get(UpdateUserService::class),
    ),
    DeleteUserController::class => fn(ContainerInterface $container) => new DeleteUserController(
        service: $container->get(DeleteUserService::class),
    ),

    //SERVICE
    ListUserService::class => fn (ContainerInterface $container) => new ListUserService(
        userRepository: $container->get(UserRepository::class),
    ),
    CreateUserService::class => fn(ContainerInterface $container) => new CreateUserService(
        userRepository: $container->get(UserRepository::class),
    ),
    UpdateUserService::class => fn(ContainerInterface $container) => new UpdateUserService(
        userRepository: $container->get(UserRepository::class),
    ),
    DeleteUserService::class => fn(ContainerInterface $container) => new DeleteUserService(
        userRepository: $container->get(UserRepository::class),
    ),

    //REPOSITORY
    UserRepository::class => fn(ContainerInterface $container) => new MySqlUserRepository(
        pdo: $container->get(PDO::class),
    ),
];