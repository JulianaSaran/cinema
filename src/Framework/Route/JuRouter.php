<?php

namespace Juliana\Cinema\Framework\Route;

use Bramus\Router\Router;
use Psr\Container\ContainerInterface;

class JuRouter
{
    private Router $router;
    private ContainerInterface $container;

    public function __construct(Router $router, ContainerInterface $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function register(callable $configure): self
    {
        $configure($this->router, $this->container);

        return $this;
    }

    public function run(): void
    {
        $this->router->run();
    }
}