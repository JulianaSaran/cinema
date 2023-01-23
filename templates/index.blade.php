<?php

use Juliana\Cinema\Domain\Home\Home;
use Juliana\Cinema\Domain\Movie\MovieDetailed;

/**
 * @var Home $home
 * @var MovieDetailed $movieDetailed
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
                            <span class="rating">{{ $movieDetailed->rating }}</span>
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
    <div class="row-cols-2">
        @foreach($home->categories as $category)
            <h2 class="section-title">{{ $category->name }}</h2>
            <div class="row">
                @foreach($category->movies as $movie)
                    <div class="col-3">
                        <div class="card movie-card">
                            <div class="card-img-top"
                                 style="background-image: url('img/movies/{{$movie->getImageMovie()}}')"></div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/movies/{{ $movie->id }}"> {{ $movie->name }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

@include('footer')
