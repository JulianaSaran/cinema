<?php

namespace Juliana\Cinema\Domain\Movie;

use Juliana\Cinema\Domain\UploadImageService;

class UpdateImageMovieService
{
    private MovieRepository $repository;
    private UploadImageService $uploader;

    public function __construct(MovieRepository $repository, UploadImageService $uploader)
    {
        $this->repository = $repository;
        $this->uploader = $uploader;
    }

    public function updateImage(int $id)
    {
        $movie = $this->repository->loadById($id);
        $movie->image = $this->uploader->upload('image', __PUBLIC_DIR__.'/img/movies/');

        $this->repository->update($movie);

    }
}