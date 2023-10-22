<?php require_once base_path("views/admin/partials/head.php") ?>

<?php
// dd($products);
?>


<!-- component -->
<main class="max-h-full">
    <!-- Create Button -->
    <div class="flex justify-end">
        <a href="/admin/products/create"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-3 mx-3">
            Create
        </a>
    </div>
    <div class="py-5">
        <div class="col-span-12">
            <div class="overflow-x-auto w-full">
                <table class="mx-auto max-w-4xl w-full rounded-sm bg-white divide-y divide-gray-300 overflow-hidden">
                    <thead class="bg-gray-800 text-gray-500">
                        <tr>
                            <th class="p-3">Brand</th>
                            <th class="p-3">ID</th>
                            <th class="p-3">Name</th>
                            <th class="p-3 text-left">Category</th>
                            <th class="p-3 text-left">Price</th>
                            <th class="p-3 text-left">Description</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td class='p-3'>
                                    <img src=" <?= $product['image'] ?>" />
                                </td>

                                <td class='p-3'>
                                    <?= $product['id'] ?>
                                </td>

                                <td class='p-3'>
                                    <?= $product['name'] ?>
                                </td>

                                <td class='p-3'>
                                    <?= $product['category_id'] ?>
                                </td>

                                <td class='p-3'>
                                    <?= $product['price'] ?>
                                </td>

                                <td class='p-3'>
                                    <?= $product['description'] ?>
                                </td>

                                <td class="p-3">
                                    <a href="/admin/products/show" class="text-gray-400 hover:text-gray-100 mr-2">
                                        <i class="material-icons-outlined text-base">visibility</i>
                                    </a>
                                    <a href="/admin/products/edit" class="text-gray-400 hover:text-gray-100 mx-2">
                                        <i class="material-icons-outlined text-base">edit</i>
                                    </a>
                                    <a href="/admin/products/delete" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require_once base_path("views/admin/partials/foot.php") ?>