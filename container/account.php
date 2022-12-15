<?php

use Juliana\Cinema\Application\Http\Web\Auth\AccountController;
use Juliana\Cinema\Application\Http\Web\Auth\LogoutUserController;
use Juliana\Cinema\Application\Http\Web\Auth\UpdatePasswordController;
use Juliana\Cinema\Application\Http\Web\Auth\UpdateUserController;
use Juliana\Cinema\Domain\User\Auth\LoadAuthenticatedUser;
use Juliana\Cinema\Domain\User\UserRepository;
use Juliana\Cinema\Framework\Blade\Template;
use Juliana\Cinema\Infra\User\MySqlUserRepository;
use Psr\Container\ContainerInterface;
use TinyContainer\TinyContainer;

return [

    //CONTROLLERS
    AccountController::class => fn(ContainerInterface $container) => new AccountController(
        template: $container->get(Template::class),
        service: $container->get(LoadAuthenticatedUser::class),
    ),

    LogoutUserController::class => fn(ContainerInterface $container) => new LogoutUserController(),

    UpdateUserController::class => TinyContainer::resolve(UpdateUserController::class),

    UpdatePasswordController::class => TinyContainer::resolve(UpdatePasswordController::class),

    //SERVICE
    LoadAuthenticatedUser::class => fn(ContainerInterface $container) => new LoadAuthenticatedUser(
        userRepository: $container->get(UserRepository::class),
    ),

    //REPOSITORY

    UserRepository::class => fn(ContainerInterface $container) => new MySqlUserRepository(
        pdo: $container->get(PDO::class),
    ),
];