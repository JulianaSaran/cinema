<?php

use Juliana\Cinema\Domain\Dashboard\DashboardDetailed;

/**
 * @var DashboardDetailed $dashboard
 */
?>

@include('header')

<div id="main-container" class="container-fluid">
    <h2 class="section-title">Dashboard</h2>
    <p class="section-description">Adicione ou Atualize as informações dos filmes:</p>
    <div class="col-md-12" id="add-movie-container">
        <a href="/dashboard/new" class="btn card-btn btn-auto-width">
            <i class="fas fa-plus"></i> Adicionar filme
        </a>
        <div class="col-md-12" id="movies-dashboard">
            <table class="table">
                <thead>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Nota</th>
                <th scope="col" class="action-column"></th>
                </thead>
                <tbody>
                @foreach($dashboard->movies as $movie)
                    <tr>
                        <td scope="row">{{$movie->id}}</td>
                        <td><a href="" class="table-movie-title">{{$movie->name}}</a></td>
                        <td><i class="fas fa-star"></i>5</td>
                        <td class="actions-column">
                            <a href="/dashboard/movies/{{$movie->id}}" class="edit-btn">
                                <i class="far fa-edit"></i> Editar
                            </a>
                            <form action="dashboard/movies/{{ $movie->id }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="delete-btn">
                                    <i class="fas fa-times"></i> Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@include('footer')