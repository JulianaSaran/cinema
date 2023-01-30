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
                <div class="form-group">
                    <label for="rating">Nota do filme</label>
                    <b><span id="average">{{ $movie->rating }} </span>/ 5</b>
                    <div class="mb-3">
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                    </div>
                </div>

                <div class="review-container" id="review-form-container">
                    <h4>Envie seu comentário</h4>
                    <div class="page-description">


                        @if($user !== null)
                            <form id="review-form">
                                <label for="review">Seu comentário:</label>
                                <div>
                                    <textarea name="comment" id="comment" rows="3" class="form-control"
                                      placeholder="O que você achou do filme"></textarea>
                                </div>
                                <div>
                                    <select name="rating" id="rating" class="form-select" required>
                                        <option value="">Selecione</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <input type="button" id="comment-btn" class="btn card-btn btn-auto-width"
                                       value="Envie seu comentário">
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

        <script>
            $("#comment-btn").on("click", function () {
                console.log("lll")

                const form = new FormData();
                form.append("comment", $("#comment").val());
                form.append("rating", $("#rating").val());

                axios.post('/movies/{{ $movie->id }}/comments', form)
                    .then(response => {
                        document.location.href='/movies/{{ $movie->id }}';
                    })
            });

            // action="/movies/{{ $movie->id }}/comments"  method="POST"

        </script>

@include('footer')