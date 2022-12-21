<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTime;
use Juliana\Cinema\Domain\Related\RelatedMovieCategoryService;
use Juliana\Cinema\Domain\UploadImageService;

/**
 * Acessa o repositorio
 */
class CreateMovieService
{
    private MovieRepository $movieRepository;
    private UploadImageService $uploader;
    private RelatedMovieCategoryService $relater;

    public function __construct(MovieRepository $movieRepository,
                                UploadImageService $uploader,
                                RelatedMovieCategoryService $relater)
    {
        $this->movieRepository = $movieRepository;
        $this->uploader = $uploader;
        $this->relater = $relater;
    }

    /**+
     * Cria um novo filme com todas as informações que são pedidas no repositório
     */
    public function create(array $data): void
    {
        $image = $this->uploader->upload('image', __PUBLIC_DIR__.'/img/movies/');

        $movie = new Movie(
            id:0,
            name: $data["name"],
            description: $data ["description"],
            image: $image,
            trailer: $data["trailer"],
            launchedAt: new DateTime($data["launchedAt"]),
            createdAt: new DateTime(),
        );

        $movieId = $this->movieRepository->create($movie);

        $this->relater->relate($movieId, $data['category']);
    }
}