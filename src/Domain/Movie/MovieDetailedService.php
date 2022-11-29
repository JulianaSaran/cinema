<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTimeInterface;
use Juliana\Cinema\Domain\Comment\Comment;
use Juliana\Cinema\Domain\Comment\CommentRepository;
use Juliana\Cinema\Domain\Related\MovieCategoryRepository;

class MovieDetailedService
{
    private MovieRepository $movieRepository;
    private MovieCategoryRepository $movieCategoryRepository;
    private CommentRepository $commentRepository;

    public function __construct(MovieRepository         $movieRepository,
                                MovieCategoryRepository $movieCategoryRepository,
                                CommentRepository       $commentRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->commentRepository = $commentRepository;
        $this->movieCategoryRepository = $movieCategoryRepository;
    }

    public function getMovie(int $movieId): MovieDetailed
    {
        $movie = $this->movieRepository->loadById($movieId);

        return new MovieDetailed(
            id: $movie->id,
            name: $movie->name,
            launchedAt: $movie->launchedAt->format(DateTimeInterface::ATOM),
            categories: $this->movieCategoryRepository->findByMovie($movie),
            comments: array_map(
                function (Comment $comment) {
                    return $comment->toArray();
                },
                $this->commentRepository->findByMovie($movie),
            ),
        );
    }
}