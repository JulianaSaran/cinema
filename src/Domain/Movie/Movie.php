<?php

namespace Juliana\Cinema\Domain\Movie;

use DateTime;
use DateTimeInterface;

class Movie
{
    public int $id;
    public string $name;
    public Datetime $launchedAt;
    public DateTime $createdAt;
    public string $description;
    public string $image;
    public string $trailer;
    public float $rating;

    public function __construct(int      $id,
                                string   $name,
                                string   $description,
                                string   $image,
                                string   $trailer,
                                DateTime $launchedAt,
                                DateTime $createdAt,
                                float $rating
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->launchedAt = $launchedAt;
        $this->createdAt = $createdAt;
        $this->description = $description;
        $this->image = $image;
        $this->trailer = $trailer;
        $this->rating = $rating;
    }

    public function getImageMovie():string
    {
        if ($this->image === "") {

            return "movie_cover.jpg";
        }

        return $this->image;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description"=> $this->description,
            "image"=> $this->image,
            "trailer"=> $this->trailer,
            "launchedAt" => $this->launchedAt->format(DateTimeInterface::ATOM),
            "createdAt" => $this->createdAt->format(DateTimeInterface::ATOM),
            "rating" => $this->rating,
        ];
    }
}