<?php
    // session_start();
    global $ROUTES;
    $_Routes = array_filter($ROUTES, function($route) {
        return !str_starts_with($route["name"], "!");
    });
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">PHP Auth</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php foreach($_Routes as $route => $info) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $route ?>"><?= $info["name"] ?></a>
                    </li>
                <?php endforeach; ?>
                <?php if(validateKey($_SESSION, "user")) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/profile">profile</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
