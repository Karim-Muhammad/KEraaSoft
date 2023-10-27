<?php require_once base_path("views/partials/head.php"); ?>
<?php require_once base_path("views/partials/navi.php"); ?>


<div class='container mx-auto'>
    <div class="flex flex-wrap justify-center">
        <div class="w-full">
            <div class="flex flex-col break-words bg-white border-2 shadow-md mt-10">
                <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">
                    <?= $product['name'] ?>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <img src="/uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-64 h-64">

                    <p class="text-gray-700 text-lg mt-4">
                        <?= $product['description'] ?>
                    </p>

                    <p class="text-gray-700 text-lg mt-4">
                        <?= $product['price'] ?>$
                    </p>
                    <?php require_once base_path("views/pages/products/components/add_to_cart.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once base_path("views/partials/foot.php"); ?>