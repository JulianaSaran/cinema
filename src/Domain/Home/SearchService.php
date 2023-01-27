<?php

namespace Juliana\Cinema\Domain\Home;

use Juliana\Cinema\Domain\Movie\MovieRepository;

class SearchService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function findMovie($name)
    {
        return $this->movieRepository->findByName($name);
    }
}