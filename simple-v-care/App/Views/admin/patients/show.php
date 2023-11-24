<?php require_once base_path("views/admin/partials/head.php") ?>

<?php
$category = $category ?? null;
?>

<div class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="col-span-12">
        <?php
        // echo (Session::get('errors')['auth-msg'] ?? null)
        ?>

        <div class="overflow-auto lg:overflow-visible ">
            <form>
                <input type='hidden' name='_method' value='POST' />
                <!-- <input type='hidden' name='user_id' value='<?= Session::get('user')['id'] ?>' /> -->

                <div class="grid grid-cols-1 space-y-6">
                    <div class="grid grid-cols-1 space-y-2">
                        <label disabled class="text-sm font-semibold text-gray-500 py-2">Name</label>
                        <input disabled name="name" type="text" class="input w-full border mt-2 flex-1"
                            value="<?= $category['name'] ?? null ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require_once base_path("views/admin/partials/foot.php") ?>