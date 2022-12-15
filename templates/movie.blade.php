<?php

use Juliana\Cinema\Domain\Movie\Movie;
/**
 * @var Movie $movie
 */

?>

@include('header')

<div id="main-container" class="container-fluid">
    <h1>{{ $movie->name }}</h1>

    {{ print_r($movie, true) }}
</div>

@include('footer')