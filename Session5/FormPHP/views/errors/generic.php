<?php require_once base_path("views/partials/header.php") ?>

<div class="container mt-4">
  <h1 class="text-danger fs-1">
    <?= $code ?>

    <span class="fs-4">
      <?= $code == 404 ? "Page Not Found" : "Internal Server Error" ?>
    </span>
  </h1>
  <p>
    <a class="btn btn-primary" href="/">Go Back</a>
  </p>
</div>

<?php require_once base_path("views/partials/footer.php") ?>