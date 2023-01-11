<?php

use Juliana\Cinema\Application\Http\Api\Comment\CreateCommentController;
use Juliana\Cinema\Application\Http\Api\Comment\DeleteCommentController;
use Juliana\Cinema\Application\Http\Api\Comment\ListCommentController;
use Juliana\Cinema\Domain\Comment\CommentRepository;
use Juliana\Cinema\Domain\Comment\CreateCommentService;
use Juliana\Cinema\Domain\Comment\DeleteCommentService;
use Juliana\Cinema\Domain\Comment\ListCommentService;
use Juliana\Cinema\Domain\Movie\MovieRepository;
use Juliana\Cinema\Infra\Comment\MySqlCommentRepository;
use Psr\Container\ContainerInterface;
use TinyContainer\TinyContainer;

return [
    //CONTROLLER
    ListCommentController::class => fn(ContainerInterface $container) => new ListCommentController(
        commentService: $container->get(ListCommentService::class),
    ),
    CreateCommentController::class => fn(ContainerInterface $container) => new CreateCommentController(
        service: $container->get(CreateCommentService::class),
    ),
    DeleteCommentController::class => fn(ContainerInterface $container) => new DeleteCommentController(
        service: $container->get(DeleteCommentService::class),
    ),

    //SERVICE
    ListCommentService::class => fn(ContainerInterface $container) => new ListCommentService(
        movieRepository: $container->get(MovieRepository::class),
        commentRepository: $container->get(CommentRepository::class),
    ),
    CreateCommentService::class => fn(ContainerInterface $container) => new CreateCommentService(
        commentRepository: $container->get(CommentRepository::class),
    ),
    DeleteCommentService::class => fn(ContainerInterface $container) => new DeleteCommentService(
        commentRepository: $container->get(CommentRepository::class),
    ),

    //REPOSITORY
    CommentRepository::class => TinyContainer::resolve(MySqlCommentRepository::class),
];