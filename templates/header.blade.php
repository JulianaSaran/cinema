<?php

use Juliana\Cinema\Framework\Session\FlashMessage;

$flash = FlashMessage::fromSession();

?>

<html>
<head>
    <title>Movies</title>
    <base href="{{ __BASE_URL__ }}"/>

    <link rel="short icon" href="img/moviestar.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="/" class="navbar-brand">
            <img src="/img/logo.svg" alt="Moviestar" id="logo">
            <span id="moviestar-title">MovieStar</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
                aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar filmes">
                <button class="btn btn-light" type="submit" id="button-addon2">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if($user !== null)
                        <a  href="/dashboard" class="nav-link">Filmes</a>
                        <a href="/account" class="nav-link"><?= $user->name ?></a>
                        <a href="/logout" class="nav-link">Sair</a>
                    @else
                        <a href = "/auth" class="nav-link" >Entrar / Cadastrar</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</header>

@if ($flash->hasMessage())
    <div class="container">
        <div class="alert alert-{{ $flash->type }}" role="alert">
            {{$flash->message }}
        </div>
    </div>
@endif

</body>
</html>