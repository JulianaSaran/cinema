<?php

use Juliana\Cinema\Domain\Movie\MovieDetailed;
use Juliana\Cinema\Domain\User\User;

/**
 * @var MovieDetailed $movie
 * @var User $user
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
                    <label>Categorias </label>
                    <div>{{implode("/ ", $movie->categories)}}</div>
                </div>
                <div class="label-container">
                    <label>Lançamento</label>
                    <div>{{ $movie->getLaunchedAt()->format("d/m/Y") }}</div>
                </div>
                <div class="label-container">
                    <label>Sinopse</label>
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
                    <div class="col-md-12 review">
                        <div class="card mb-3" style="background: #333">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="img/users/{{$user->image}}" alt=""
                                         style="max-width: 100%; border-radius: 100%">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$user->name}}</h5>
                                        <p><i class="fas fa-star"></i>5</p>
                                        <p class="card-text">Este é o comentário do usuário</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('footer')