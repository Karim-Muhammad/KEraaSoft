<?php require_once base_path("App/Views/partials/head.php"); ?>

<?php
// dd(Session::has('auth-msg'));
?>

<div class="page-wrapper">
    <?php require_once base_path("App/Views/partials/navi.php"); ?>

    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">login</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
            <?php if (isset($errors['auth-msg'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errors['auth-msg'] ?>
                </div>
            <?php endif; ?>

            <?php if (Session::has('auth-msg')): ?>
                <div class="alert alert-success" role="alert">
                    <?= Session::get('auth-msg') ?>
                </div>
            <?php endif; ?>
            <form class="form" method='post' action="/auth/login">

                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name='email' required>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="password">password</label>
                    <input type="password" class="form-control" id="password" name='password' required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                <span>don't have an account?</span><a class="link" href="/auth/register">create account</a>
            </div>
        </div>

    </div>
</div>

<?php require_once base_path("App/Views/partials/footer.php") ?>
<?php require_once base_path("App/Views/partials/foot.php") ?>