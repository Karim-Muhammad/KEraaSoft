<?php view("partials/header.php") ?>
<?php
// dd($_SESSION["user"]);
?>

<main class="h-100">

  <div class="container h-100">
    <div class="card my-auto">
      <p class="card-body p-3">
        <?= $_SESSION["user"]["fullname"] ?>
      </p>
      <p class="card-body p-3">
        <?= $_SESSION["user"]["email"] ?>
      </p>
      <p class="card-body p-3">
        <?= $_SESSION["user"]["password"] ?>
      </p>
    </div>
  </div>

</main>

<?php view("partials/footer.php") ?>