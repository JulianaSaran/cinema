<?php

use Juliana\Cinema\Domain\Category\Category;

/**
 * @var array<Category> $categories
 */
?>

@include('header')

<div id="main-container" class="container-fluid">
    <div class="offset-md-4 col-md-4 new-movie-container">
        <h1 class="page-title">Novo Filme</h1>
        <p class="page-description">Adicione ou atualize as informações dos filmes:</p>
        <form action="dashboard/movies" id="add-movie-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o título do filme">
            </div>
            <div class="form-group mt-3">
                <label for="category">Categoria</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="description">Sinopse</label>
                <textarea name="description" id="description" rows="5" class="form-control"
                          placeholder="Descreva o filme"></textarea>
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
                <input type="submit" class="btn card-btn btn-auto-width " value="Adicionar">
            </div>
        </form>
    </div>

</div>

@include('footer')