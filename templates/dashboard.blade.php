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
                <th scope="col" class="action-column">Ações</th>
                </thead>
                <tbody>
                @foreach($dashboard->movies as $movie)
                    <tr>
                        <td scope="row">{{$movie->id}}</td>
                        <td><a href="" class="table-movie-title">{{$movie->name}}</a></td>
                        <td><i class="fas fa-star"></i>9</td>
                        <td class="actions-column">
                            <a href="" class="edit-btn">
                                <i class="far fa-edit"></i> Editar
                            </a>
                            <form action="">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="">
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