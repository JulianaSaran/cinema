<?php

use Juliana\Cinema\Domain\Movie\MovieDetailed;

/**
 * @var MovieDetailed $movie
 */
?>

@include('header')

<div id="main-container" class="container">
    <h1 class="page-title">{{ $movie->name }}</h1>
    <div class="row">
        <div class="col-md-5">
            <div class="movie-detailed-container">
                <div class="image-container">
                    <img src="img/movies/{{ $movie->image }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="movie-details">
                <div class="label-container">
                    <label>Categorias: </label>
                    <div>{{implode("/ ", $movie->categories)}}</div>
                </div>
                <div class="label-container">
                    <label>Lançamento:</label>
                    <div>{{ $movie->getLaunchedAt()->format("d/m/Y") }}</div>
                </div>
                <div class="label-container">
                    <label>Sinopse:</label>
                    <div class="description-title"> {{$movie->description}}</div>
                </div>
                <p><i class="fas fa-star fa-lg"> 5 </i></p>
            </div>
            <div class="review-container" id="review-form-container">
                <h4>Envie seu comentário</h4>
                <div class="page-description">
                    <label for="review">Seu comentário:</label>
                    <div>
                            <textarea name="reviews" id="reviews" rows="3" class="form-control"
                                      placeholder="O que você achou do filme"></textarea>
                    </div>
                    <input type="submit" class="btn card-btn btn-auto-width" value="Envie seu comentario">
                    <form action="" id="review-form" method="POST">
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
                        <input type="submit" class="btn card-btn btn-auto-width" value="Envie sua nota">
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('footer')