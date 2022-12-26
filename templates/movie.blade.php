<?php

use Juliana\Cinema\Domain\Movie\Movie;
use Juliana\Cinema\Domain\Movie\MovieDetailed;

/**
 * @var array<MovieDetailed> $movie
 */
?>

@include('header')

<div id="main-container" class="container-fluid">
    <div class="row">
        <div class="offset-md-1 col-md-6 movie-container">
            <h1 class="page-title">{{ $movie->name }}</h1>
            <div class="movie-details">
                <p>Lançamento: {{ $movie->launchedAt }}</p>
                <p>Categorias: {{implode("/ ", $movie->categories)}}</p>
                <span><i class="fas fa-star"> 9</i></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="movie-image-container"
                 style="background-image: url('img/movies/{{ $movie->image }}')">
            </div>
            <div class="offset-md-1 col-md-10" id="reviews-container">
                <h3 id="reviews-title">Comentários</h3>
                <div class="col-md-12" id="review-form-container">
                    <h4>Envie seu comentário</h4>
                    <p class="page-description">Preencha a nota e o comentário sobre o filme</p>
                    <form action="" id="review-form-id" method="POST">
                        <input type="hidden" name="type" value="create">
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <div class="form-group">
                            <label for="rating">Nota do filme</label>
                            <select name="rating" id="rating" class="form-select">
                                <option value="">Selecione</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="review">Seu comentário:</label>
                            <textarea name="reviews" id="reviews" rows="3" class="from-control"
                                      placeholder="O que vocêachou do filme"></textarea>
                        </div>
                        <input type="submit" class="btn card-btn btn-auto-width" value="Enviar comentário">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')