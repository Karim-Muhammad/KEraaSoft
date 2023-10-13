<?php require_once base_path("views/partials/head.view.php");  ?>
<?php require_once base_path("views/partials/nav.view.php");  ?>
<?php require_once base_path("views/partials/banner.view.php");  ?>

<?php
//    dd($_SESSION);
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input name="_method" value="PATCH" type="hidden"/>
            <input name="user_id" value="<?= $_SESSION['user']['id'] ?? null ?>" type="hidden"/>
            <input name="id" value="<?= $note["id"] ?>" type="hidden"/>

            <textarea name='note-content' class="w-full p-4 h-[50vh]" placeholder="Enter Your Note Here"><?=$note["content"]?></textarea>
            <p class="font-xs text-red-500"><?= $errors["errors"]["content"] ?? "" ?></p>
            <p class="text-xs text-red-500"><?= $errors["string"] ?? "" ?></p>
            <input type="submit" value="Update" class='cursor-pointer px-6 py-3 my-3 bg-green-300 hover:bg-green-400 rounded-lg'/>

            <a href="/note?id=<?= $note['id'] ?>" class="cursor-pointer px-6 py-3 my-3 bg-gray-200 hover:bg-gray-300 rounded-lg">Cancel</a>
        </form>
    </div>
</main>


<?php require_once base_path("views/partials/footer.view.php") ?>
