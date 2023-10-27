<?php require_once base_path("views/admin/partials/head.php") ?>

<?php
require_once base_path("Core/Session.php");
$category = $category ?? null;
?>

<div class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="col-span-12">
        <?php
        echo (Session::get('errors')['auth-msg'] ?? null)
            ?>

        <div class="overflow-auto lg:overflow-visible ">
            <form action="/admin/category?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='PATCH' />
                <input type='hidden' name='user_id' value='<?= Session::get('user')['id'] ?>' />

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Name</label>
                        <input name="name" value="<?= $category['name'] ?? null ?>" type="text"
                            class="p-2 w-full border mt-2 flex-1" placeholder="Name">
                    </div>
                    <div class="space-y-2">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white hover:bg-blue-700 hover:text-white transition duration-150 ease-in-out">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require_once base_path("views/admin/partials/foot.php") ?>