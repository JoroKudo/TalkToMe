<?php

if ("$_SERVER[REQUEST_URI]" != "/chat") { ?>
<!doctype html>
<?php } ?>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/style.css">


    <title><?= $title; ?> | Bbc MVC</title>
</head>
<body>


<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Bbc MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <?php if (isset($_SESSION["IsLoggedIn"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/user">User</a>
                    </li>
                <?php } ?>
                <?php if (!isset($_SESSION["IsLoggedIn"])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/user/login">Login</a>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION["IsLoggedIn"]) == false) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/user/create">SignUp</a>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION["IsLoggedIn"]) == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/chat">Chat</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION["IsLoggedIn"]) == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/logout">logout</a>
                    </li>
                <?php } ?>
            </ul>
            </ul>
        </div>
    </nav>
</header>

<?php

if ("$_SERVER[REQUEST_URI]" != "/chat" ) { ?>

<main class="container">
    <h1><?= $heading; ?></h1>




        <?php } ?>

<?php if (isset($_GET["login"])) {?>
    <div class="alert alert-warning" role="alert">
        You loggin failed!
    </div>
<?php } ?>
