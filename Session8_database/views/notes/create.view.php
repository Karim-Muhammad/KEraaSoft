<?php require_once base_path("views/partials/head.view.php"); ?>
<?php require_once base_path("views/partials/nav.view.php"); ?>
<?php require_once base_path("views/partials/banner.view.php"); ?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <form method="POST" action="/notes">
      <input name="user_id" value="<?= $_SESSION['user']['id'] ?>" type="hidden" />
      <textarea name='note-content' class="w-full p-4 h-[50vh]" placeholder="Enter Your Note Here"></textarea>
      <p class="text-xs text-red-500">
        <?= $errors["string"] ?? "" ?>
      </p>
      <input type="submit" value="create"
        class='cursor-pointer px-6 py-3 my-3 bg-green-300 hover:bg-green-400 rounded-lg' />
    </form>
  </div>
</main>


<?php require_once base_path("views/partials/footer.view.php") ?>