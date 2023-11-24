<?php require_once base_path("views/admin/partials/head.php") ?>

<?php
$product = $product ?? null;
?>

<main class='p-7 text-white font-cairo'>
    <div class='flex flex-row items-center my-7'>

        <!-- Image -->
        <div class='w-full h-36'>
            <img class='h-full object-contain' src='/uploads/<?= $product['image'] ?>' />
        </div>

        <!-- Product Info -->
        <div class="flex flex-col w-full">
            <h1 class="text-3xl font-bold">
                <span class='text-gray-400'> إسم المنتج </span>
                <span class='text-blue-500'>
                    <?= $product['name'] ?>
                </span>
            </h1>

            <h2 class="my-6 text-xl font-semibold">
                <span class='text-gray-400'> Price </span>
                <span class='text-blue-500'>
                    <?= $product['price'] ?>
                </span>
            </h2>

        </div>

    </div>

    <p class="text-lg">
        <span class='text-gray-400'> Description </span>
        <span class='text-blue-500'>
            <?= $product['description'] ?>
        </span>
    </p>
</main>

<?php require_once base_path("views/admin/partials/foot.php") ?>