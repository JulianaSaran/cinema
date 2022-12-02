<html>
<head>
    <title>Movies</title>
    <base href="http://localhost/curso_php/21_Cinema/public/"/>

    <link rel="short icon" href="img/moviestar.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="index.php" class="navbar-brand">
            <img src="img/logo.svg" alt="Moviestar" id="logo">
            <span id="moviestar-title">MovieStar</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
                aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
            <input type="text" name="q" id="search" class="form-control mr-sm-2"
                   placeholder="Buscar filmes" aria-label="Search" >
            <button class="btn my-2 my-sm-0" type="submit" >
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="auth.php" class="nav-link"> Entrar / Cadastrar</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div id="main-container" class="container-fluid">
    <h1>Corpo do site</h1>
</div>
<footer id="footer">
    <div class="social-container">
        <ul>
            <li>
                <a href="#"><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </li>
        </ul>
    </div>
    <div id="footer-links-container">
        <ul>
            <li>
                <a href="#">Adicionar filmes</a>
            </li>
            <li>
                <a href="#">Adicionar crítica</a>
            </li>
            <li>
                <a href="#">Entrar/Registrar</a>
            </li>
        </ul>
    </div>
    <p>&copy; 2022 MovieStar</p>

</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.js"></script>
</body>
</html>