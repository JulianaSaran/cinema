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
                    <div>{{ implode("/ ", $movie->categories) }}</div>
                </div>
                <div class="label-container">
                    <label>Lançamento</label>
                    <div>{{ $movie->getLaunchedAt()->format("d/m/Y") }}</div>
                </div>
                <div class="label-container">
                    <label>Sinopse</label>
                    <div class="description-title"> {{ $movie->description }}</div>
                </div>
                <p><i class="fas fa-star fa-lg"> {{$movie->rating}} </i></p>
            </div>

            <div class="review-container" id="review-form-container">
                <h4>Envie seu comentário</h4>
                <div class="page-description">
                    @if($user !== null)
                        <form action="/movies/{{ $movie->id }}/comments" id="review-form" method="POST">
                            <label for="review">Seu comentário:</label>
                            <div>
                            <textarea name="comment" id="comment" rows="3" class="form-control"
                                      placeholder="O que você achou do filme"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Nota do filme</label>
                                <b><span id="average">0.0 </span>/ 5</b>
                                <div class="mb-3">
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                </div>
                                <div class="col-sm-4">
                                    <p>
                                        <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                        </div>
                                        <div class="progress-label-right">(<span id="total_five_star_review">0</span>)
                                        </div>
                                     </p>
                                    <p>
                                        <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                        </div>
                                        <div class="progress-label-right">(<span id="total_four_star_review">0</span>)
                                        </div>
                                    </p>
                                    <p>
                                        <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                        </div>
                                        <div class="progress-label-right">(<span id="total_three_star_review">0</span>)
                                        </div>
                                    </p>
                                    <p>
                                        <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                        </div>
                                        <div class="progress-label-right">(<span id="total_two_star_review">0</span>)
                                        </div>
                                    </p>
                                    <p>
                                        <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                        </div>
                                        <div class="progress-label-right">(<span id="total_one_star_review">0</span>)
                                        </div>
                                    </p>
                                </div>


{{--                                <select name="rating" id="rating" class="form-select" required>--}}
{{--                                    <option value="">Selecione</option>--}}
{{--                                    <option value="5">5</option>--}}
{{--                                    <option value="4">4</option>--}}
{{--                                    <option value="3">3</option>--}}
{{--                                    <option value="2">2</option>--}}
{{--                                    <option value="1">1</option>--}}
{{--                                </select>--}}
                            </div>
                            <input type="submit" class="btn card-btn btn-auto-width" value="Envie seu comentário">
                        </form>
                    @else
                        <div class="cadastrar">
                            <a href="/auth" class="btn card-btn btn-auto-width">Entrar / Cadastrar</a>
                        </div>
                    @endif

                    <div class="col-md-12 review">
                        <div class="card mb-3" style="background: #333">
                            @foreach($movie->comments as $comment)
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="img/users/{{ $comment->writer->image }}" alt=""
                                             style="max-width: 100%; border-radius: 100%">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $comment->writer->name }}</h5>
                                            <p><i class="fas fa-star"></i>{{ $comment->rating }}</p>
                                            <p class="card-text">
                                                {{ $comment->comment }}
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('footer')