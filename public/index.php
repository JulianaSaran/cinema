<?php

use Bramus\Router\Router;
use Juliana\Cinema\Application\Http\Web;
use Juliana\Cinema\Framework\Route\JuRouter;
use TinyContainer\TinyContainer;

include_once("../vendor/autoload.php");

session_start();
const __PUBLIC_DIR__ = __DIR__;
const __BASE_URL__ = 'http://localhost:8000';
$_SERVER['REQUEST_URI'] = str_replace("index.php/", "", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_METHOD'] = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$container = new TinyContainer(array_merge(
    include __DIR__ . "/../container/account.php",
    include __DIR__ . "/../container/infrastructure.php",
    include __DIR__ . "/../container/movies.php",
    include __DIR__ . "/../container/categories.php",
    include __DIR__ . "/../container/movieCategory.php",
    include __DIR__ . "/../container/comments.php",
    include __DIR__ . "/../container/users.php",
    include __DIR__ . "/../container/home.php",
    include __DIR__ . "/../container/dashboard.php",
));

(new JuRouter(new Router(), $container))
    ->register(include __DIR__ . "/../routes/web.php")
    ->register(include __DIR__ . "/../routes/dashboard.php")
    ->register(include __DIR__ . "/../routes/api.php")
    ->run();
