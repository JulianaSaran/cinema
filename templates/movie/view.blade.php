<?php
/**
 * @var MovieDetailed $movie
 */

use Juliana\Cinema\Domain\Movie\MovieDetailed;

?>
@extends('app')

@section('title', $movie->name)

@section('content')
    <div class="align-items-start">
        <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
            <svg class="bi" width="1em" height="1em">
                <use xlink:href="#toggles2"></use>
            </svg>
        </div>
        <div>
            <h3 class="fs-2">{{ $movie->name }}</h3>
            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and
                probably just keep going until we run out of words.</p>
        </div>

    </div>
    <br>

    <div>
        <h5>Comentários:</h5>
        @foreach($movie->comments as $comment)
            <div>
                <p>{{$comment->writer}}: {{$comment->comment}}
                </p>
            </div>
        @endforeach
    </div>
    <br>
    <div>
        <h5>Categorias:</h5>
        <p>foreach</p>
    </div>
    <a href="" class="btn btn-primary">
        Voltar
    </a>
@endsection