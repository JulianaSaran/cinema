<?php

use Juliana\Cinema\Framework\Blade\Template;
use Juliana\Cinema\Infra\User\HttpUserFactory;
use Psr\Container\ContainerInterface;

return [
    //INFRA
    PDO::class => fn(ContainerInterface $container) => new PDO(
        "mysql:host=localhost;dbname=cinema",
        "root",
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    ),

    //Framework
    Template::class => fn(ContainerInterface $container) => new Template(
        $container->get(HttpUserFactory::class),
    ),
];