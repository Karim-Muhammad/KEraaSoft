<?php require_once "partials/header.php" ?>
<?php
    // session_start();
    $old = $_SESSION["old"] ?? [];
    $errors = $_SESSION["errors"] ?? [];
?>

<div class="container my-3 w-5">
    <div class="card text-center p-3 bg-secondary my-3 text-white">
        Register
    </div>
    <?php if(validateKey($errors, "auth")): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errors["register-auth"] ?>
        </div>
    <?php endif; ?>
    <form method="post" action="/register">
        <div class="mb-3">
            <label for="input-name" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" id="input-name" value="<?= $old["fullname"]?? "" ?>">
            <p class="text-danger"><?= $errors["fullname"] ?? "" ?></p>
        </div>
        
        <div class="mb-3">
            <label for="input-email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="input-email" value="<?= $old["email"]?? "" ?>">
            <p class="text-danger"><?= $errors["email"] ?? "" ?></p>
        </div>

        <div class="mb-3">
            <label for="input-password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="input-password" value="<?= $old["password"]?? "" ?>">
            <p class="text-danger"><?= $errors["password"] ?? "" ?></p>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="cookie" class="form-check-input" id="remember-me">
            <label class="form-check-label" for="remember-me">remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
    unset($_SESSION["errors"]);
    unset($_SESSION["old"]);
?>
<?php require_once "partials/footer.php" ?>

