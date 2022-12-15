<?php

use Juliana\Cinema\Domain\Movie\Movie;

/**
 * @var Movie[] $movies
 */

?>
@include('header')

<div id="main-container" class="container-fluid">
    <h2 class="section-title">Filmes</h2>
    <p class="section-description">Veja as críticas:</p>
    <div class="movie-container"></div>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-3">
                <div class="card movie-card">
                    <div class="card-img-top" style="background-image: url('img/movies/{{$movie->getImageMovie()}}')"></div>
                    <div class="card-body">
                        <p class="card-rating">
                            <i class="fas fa-star"></i>
                            <span class="rating">9</span>
                        </p>
                        <h5 class="card-title">
                            <a href="#">{{ $movie->name }}</a>
                        </h5>
                        <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
                        <a href="/movies/{{ $movie->id }}" class="btn btn-primary card-btn">Conhecer</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>


    <h2 class="section-title">Animação</h2>
    <p class="section-description">Veja as melhores animações:</p>
    <div class="movie-container"></div>

    <h2 class="section-title">Drama</h2>
    <p class="section-description">Veja os melhores dramas:</p>
    <div class="movie-container"></div>
</div>

@include('footer')
