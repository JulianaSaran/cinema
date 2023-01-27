<?php

use Juliana\Cinema\Domain\Movie\Movie
/**
 * @var Movie $movie
 *
 */
?>

@include('header')
<h1 class="search">Resultado da busca:</h1>
<div id="main-container" class="container-fluid">
    <h2 class="section-title">Filmes</h2>
<div class="row">
    @foreach($movies as $movie)
        <div class="col-2">
            <div class="card movie-card">
                <div class="card-img-top"
                     style="background-image: url('img/movies/{{$movie->getImageMovie()}}')"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">{{ $movie->rating }}</span>
                    </p>
                    <h5 class="card-title">
                        <a href="">{{ $movie->name }}</a>
                    </h5>
                    <a href="/movies/{{ $movie->id }}" class="btn btn-primary card-btn">Ver Mais...</a>
                </div>
            </div>
        </div>
@endforeach
</div>

@include('footer')