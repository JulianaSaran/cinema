<?php

use Juliana\Cinema\Domain\Home\Home;
use Juliana\Cinema\Domain\Movie\Movie;

/**
 * @var Home $home
 */

?>
@include('header')

<div id="main-container" class="container-fluid">
    <h2 class="section-title">Filmes</h2>
    <p class="section-description">Veja as críticas:</p>
    <div class="movie-container"></div>
    <div class="row">
        @foreach($home->movies as $movie)
            <div class="col-3">
                <div class="card movie-card">
                    <div class="card-img-top"
                         style="background-image: url('img/movies/{{$movie->getImageMovie()}}')"></div>
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

    <div class="row">
        @foreach($home->categories as $category)
            <div class="col-3">
                <h2 class="section-title">{{ $category->name }}</h2>

                @foreach($category->movies as $movie)
                    <div class="section-title">{{ $movie->name }}</div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

@include('footer')
