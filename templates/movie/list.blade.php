<?php
/**
 * @var array<Movie> $movies
 */

use Juliana\Cinema\Domain\Movie\Movie;

?>
@extends('app')

@section('title', 'Lista de Filmes')

@section('content')
    @foreach ($movies as $movie)
        <div class="align-items-start">
            <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
            </div>
            <div>
                <h3 class="fs-2">{{ $movie->name }}</h3>
                <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                <a href="movies/{{ $movie->id }}" class="btn btn-primary">
                    Ver Mais...
                </a>
            </div>
        </div>
        <br>
        <br>

    @endforeach
@endsection