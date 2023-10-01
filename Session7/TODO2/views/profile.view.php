<?php view("partials/header.php") ?>
<?php
// dd($_SESSION["user"]);
?>


<div class="container h-100">
  <div class="card my-auto">
    <p class="card-body p-3 text-muted">
      Fullname:
      <?= $_SESSION["user"]["fullname"] ?>
    </p>
    <p class="card-body p-3 text-muted">
      Email:
      <?= $_SESSION["user"]["email"] ?>
    </p>
    <div class="row container">
      <h3 class='my-3 text-secondary'>Your Tasks</h3>
      <?php if (count($todos) > 0): ?>
        <?php foreach ($todos as $todo): ?>
          <div class="p-3 card bg-dark text-light col-lg-4 col-sm-12">
            <small class='text-info'>
              <?= $todo['created_at'] ?>
            </small>
            <div class="card-body d-flex justify-content-between align-items-center">
              <p class="card-text">
                <?= $todo['title'] ?>
              </p>
              <a href="/todo/show?id=<?= $todo['id'] ?>" class="btn btn-sm btn-info">Show</a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="alert alert-info">
          No todos yet!
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>


<?php view("partials/footer.php") ?>