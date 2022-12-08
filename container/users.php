<?php

use Juliana\Cinema\Application\Http\Api;
use Juliana\Cinema\Application\Http\Web\Auth\AuthController;
use Juliana\Cinema\Domain\User\Auth\AuthUserService;
use Juliana\Cinema\Domain\User\CreateUserService;
use Juliana\Cinema\Domain\User\DeleteUserService;
use Juliana\Cinema\Domain\User\ListUserService;
use Juliana\Cinema\Domain\User\UpdateUserService;
use Juliana\Cinema\Domain\User\UserRepository;
use Juliana\Cinema\Framework\Blade\Template;
use Juliana\Cinema\Infra\User\HttpUserFactory;
use Juliana\Cinema\Infra\User\MySqlUserRepository;
use Psr\Container\ContainerInterface;
use Juliana\Cinema\Application\Http\Web;

return [
    //CONTROLLER
    Api\User\ListUserController::class => fn(ContainerInterface $container) => new Api\User\ListUserController(
        service: $container->get(ListUserService::class),
    ),
    Api\User\CreateUserController::class => fn(ContainerInterface $container) => new Api\User\CreateUserController(
        service: $container->get(CreateUserService::class),
    ),
    Api\User\UpdateUserController::class => fn(ContainerInterface $container) => new Api\User\UpdateUserController(
        service: $container->get(UpdateUserService::class),
    ),
    Api\User\DeleteUserController::class => fn(ContainerInterface $container) => new Api\User\DeleteUserController(
        service: $container->get(DeleteUserService::class),
    ),
    Web\Auth\CreateUserController::class => fn(ContainerInterface $container) => new Web\Auth\CreateUserController(
        service: $container->get(CreateUserService::class),
    ),
    AuthController::class =>fn(ContainerInterface $container) => new AuthController(
        template: $container->get(Template::class),
    ),
    Web\Auth\AuthUserController::class=> fn(ContainerInterface $container) => new Web\Auth\AuthUserController(
        service: $container->get(AuthUserService::class),
    ),

    //SERVICE
    ListUserService::class => fn(ContainerInterface $container) => new ListUserService(
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
    AuthUserService::class => fn(ContainerInterface $container) => new AuthUserService(
        userRepository: $container->get(UserRepository::class),
    ),

    //REPOSITORY
    UserRepository::class => fn(ContainerInterface $container) => new MySqlUserRepository(
        pdo: $container->get(PDO::class),
    ),

    // FACTORIES
    HttpUserFactory::class => fn(ContainerInterface $container) => new HttpUserFactory(
        userRepository: $container->get(UserRepository::class),
    ),
];