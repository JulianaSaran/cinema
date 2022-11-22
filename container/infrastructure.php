<?php

use Psr\Container\ContainerInterface;

return [
    //INFRA
    PDO::class => fn(ContainerInterface $container) => new PDO(
        "mysql:host=localhost;dbname=cinema",
        "root",
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    ),
];