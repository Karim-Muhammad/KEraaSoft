<?php
    // session_start();
    $errors = $_SESSION["errors"] ?? [];
?>

<?php require_once base_path("views/partials/header.php") ?>
<div class="container my-3 w-5">
    <div class="card text-center p-3 bg-secondary my-3 text-white">
        Login
    </div>

    <?php if(validateKey($errors, "login-auth")): ?>
        <div class="alert alert-danger">
            <?= $errors["login-auth"] ?>
        </div>
    <?php endif ?>

    <form method="post" action="/login">
        <div class="mb-3">
            <label for="input-email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="input-email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="input-password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="input-password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember-me">
            <label class="form-check-label" for="remember-me">remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
    unset($_SESSION["errors"]);
?>
<?php require_once base_path("views/partials/footer.php") ?>

