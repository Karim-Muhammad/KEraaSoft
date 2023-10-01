<?php
// session_start();
global $LINKS;
$_Routes = array_filter($LINKS, function ($route) {
    $user = $_SESSION["user"] ?? null;
    return $route["role"] === ($user ? "auth" : "guest");
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
                <?php foreach ($_Routes as $route): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $route['path'] ?>">
                            <?= $route["name"] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>