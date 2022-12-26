<?php

use Juliana\Cinema\Domain\Category\Category;
use Juliana\Cinema\Domain\Movie\MovieDetailed;

/**
 * @var array<Category> $categories
 * @var MovieDetailed $movie
 */
?>

@include('header')

<div id="main-container" class="container-fluid">
    <div class="offset-md-4 col-md-4 new-movie-container">
        <h1 class="page-title">Atualize o filme</h1>
        <p class="page-description">Atualize as informações dos filmes:</p>
        <form action="/movies/{{$movie->id}}" id="add-movie-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o título do filme"
                value="{{$movie->name}}">
            </div>
            <div class="form-group mt-3">
                <label for="category">Categoria</label>
                <select name="category" id="category" class="form-control" required >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                               {{ in_array($category, $movie->categories) ? 'selected' : '' }}
                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="description">Sinopse</label>
                <textarea name="description" id="description" rows="5" class="form-control"
                          placeholder="Descreva o filme">{{$movie->description}}</textarea>
            </div>
            <div class="form-group mt-3">
                <label for="trailer">Trailer</label>
                <input type="text" class="form-control" id="trailer" name="trailer"
                       placeholder="Insira o link do trailer">
            </div>
            <div class="form-group mt-3">
                <label for="title">Imagem</label>
                <input type="file" class="form-control form-control-file" name="image">
            </div>
            <div class="mt-2">
                <input type="submit" class="btn card-btn btn-auto-width " value="Atualizar">
            </div>
        </form>
    </div>
</div>

@include('footer')