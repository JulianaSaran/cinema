<?php

use Juliana\Cinema\Domain\User\User;

/**
 * @var User $user
 */

?>

@include('header')
<div id="main-container" class="container-fluid edit-profile-page">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>{{ $user->fullName() }}</h1>
                    <p class="page-description">Altere seus dados:</p>
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome"
                               value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Sobrenome:</label>
                        <input type="text" class="form-control" id="name" name="lastname"
                               placeholder="Digite seu sobrenome" value="{{$user->lastname}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control " id="email" name="email" placeholder="Digite seu email"
                               value="{{$user->email}}">
                    </div>
                    <input type="submit" class="btn card-btn btn-auto-width" value="Alterar">
                </form>
            </div>
            <div class="col-md-4">
                <form action="/account/image" method="POST" enctype="multipart/form-data">
                    <div id="profile-image-container"
                         style="background-image: url('img/users/{{$user->getImageUser()}}')">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto:</label>
                        <input type=file class="form-control-file" name="image">
                    </div>
                    <input type="submit" class="btn card-btn btn-auto-width" value="Alterar imagem">
                </form>
            </div>
        </div>

        <div class="row" id="change-password-container">
            <div class="col-md-4">
                <h2>Alterar senha:</h2>
                <p class="page-description">Digite a nova senha</p>
                <form action="" method="POST">
                    <input type="hidden" name="type" value="changePassword">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Digite sua senha">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirmação de senha</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                               placeholder="Confirme sua senha">
                    </div>
                    <input type="submit" class="btn card-btn btn-auto-width" value="Alterar senha">
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer')