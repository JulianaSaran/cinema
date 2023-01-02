<?php

namespace Juliana\Cinema\Domain\Dashboard;


use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Movie\Movie;

/**
 * Este objeto tem como objetivo carregar todos os valores necessários para desenhar a tela de dashboard
 */
class DashboardDetailed
{
    /** @var array<<Movie> */
    public array $movies;

    /** @var array<Category>  */
    public array $categories;

    public function __construct(array $movies, array $categories)
    {
        $this->movies = $movies;
        $this->categories = $categories;
    }
}