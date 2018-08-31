<?php
session_start();
?>
    <html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Digital lib</title>
    </head>

<body>

<div>
    <h1>Meni:</h1>

        <?php if (!isset($_SESSION['userId'])) { ?>
            <ul>
                <li><a href="/user/login">Login</a> </li>
                <li><a href="/user/register">Registracija</a> </li>
            </ul>
        <?php } else { ?>

                <li><a href="/user/logout">Logout</a> </li>

                <h2>Show All</h2>
            <ul>
                <li><a href="/authors/showAll">Show All Authors</a> </li>
                <li><a href="/book/showAll">Show All Books</a> </li>
                <li><a href="/genre/showAll">Show All Genres</a> </li>
                <li><a href="/lending/showAll">Show All Lendings</a> </li>
                <li><a href="/user/showAll">Show All Users</a> </li>
            </ul>

            <h2>Create</h2>
            <ul>
                <li><a href="/authors/create">Create Author</a> </li>
                <li><a href="/book/create">Create Book</a> </li>
                <li><a href="/genre/create">Create Genre</a> </li>
                <li><a href="/user/create">Create User</a> </li>
            </ul>
            <hr>
        <?php } ?>

</div>

<?php

require_once "core/autoload.php";
require_once "core/BaseController.php";
require_once "core/Connection.php";

$routes = require_once "routes.php";

if (isset($_SERVER['PATH_INFO'])) {
    $requestUri = $_SERVER['PATH_INFO'];
} elseif (isset($_SERVER['REDIRECT_URL'])) {
    $requestUri = $_SERVER['REDIRECT_URL'];
} else {
    $requestUri = $_SERVER['REQUEST_URI'];
}

$controllerAndMethod = getControllerAndMethodFromUri($requestUri, $routes);

if ($controllerAndMethod != null) {
    $controllerAndMethod = explode(':', $controllerAndMethod);
}

$controllerClass = $controllerAndMethod[0];
$method = $controllerAndMethod[1];

$fullClassName = "\\Controllers\\" . $controllerClass;

$controller = new $fullClassName;

$controller->$method();

function getControllerAndMethodFromUri($requestUri, $routes) {

    foreach ($routes as $route => $controllerAndMethod) {
        if ($route === $requestUri) {
            return $controllerAndMethod;
        }
    }

    return null;
}

/*
use Controllers\AuthorController;
$authorController = new AuthorController();
$nesto = new AuthorController();
*/

?>

<h3>ovo je footer </h3>
</body>
    </html>