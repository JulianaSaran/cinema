<?php

namespace Juliana\Cinema\Domain\Dashboard;


/**
 * Este objeto tem como objetivo carregar todos os valores necessários para desenhar a tela de dashboard
 */
class DashboardDetailed
{
    /** @var array<>  */
    public array $movies;
    /** @var array<>  */
    public array $categories;

    public function __construct(array $movies, array $categories)
    {
        $this->movies = $movies;
        $this->categories = $categories;
    }
}