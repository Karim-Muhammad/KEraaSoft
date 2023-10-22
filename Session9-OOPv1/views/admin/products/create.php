<?php require_once base_path("views/admin/partials/head.php") ?>

<?php
require_once base_path("Models/Category.php");
require_once base_path("Core/Session.php");
$categories = Category::all();

?>

<!-- component -->
<!-- Create View -->

<div class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="col-span-12">
        <?php
        echo (Session::get('errors')['auth-msg'] ?? null)
            ?>

        <div class="overflow-auto lg:overflow-visible ">
            <form action="/admin/products" method="POST" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='POST' />
                <input type='hidden' name='user_id' value='<?= Session::get('user')['id'] ?>' />

                <div class="grid grid-cols-1 space-y-6">
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Name</label>
                        <input name="name" type="text" class="input w-full border mt-2 flex-1" placeholder="Name">
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Price</label>
                        <input name="price" type="text" class="input w-full border mt-2 flex-1" placeholder="Price">
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Description</label>
                        <input name="description" type="text" class="input w-full border mt-2 flex-1"
                            placeholder="Description">
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Image</label>
                        <input name="file_upload" type="file" class="input w-full border mt-2 flex-1"
                            placeholder="Image">
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Category</label>
                        <select name='category_id'>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>">
                                    <?= $category['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <button type="submit"
                            class="btn bg-blue-600 text-white hover:bg-blue-700 hover:text-white transition duration-150 ease-in-out">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require_once base_path("views/admin/partials/foot.php") ?>