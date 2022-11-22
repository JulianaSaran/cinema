<?php

namespace Juliana\Cinema\Domain\Movie;

class DeleteMovieService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function delete(int $id)
    {
       $movie = $this->movieRepository->loadById($id);

       $this->movieRepository->delete($movie);

    }
}