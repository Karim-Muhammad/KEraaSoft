<?php require_once base_path("views/admin/partials/head.php") ?>

<!-- component -->
<main class="max-h-full">
    <!-- Create Button -->
    <div class="flex justify-end">
        <a href="/admin/categories/create"
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
                            <th class="p-3">ID</th>
                            <th class="p-3">Name</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td class='p-3'>
                                    <?= $category['id'] ?>
                                </td>

                                <td class='p-3'>
                                    <?= $category['name'] ?>
                                </td>

                                <td class="p-3">
                                    <a href="/admin/category?id=<?= $category['id'] ?>"
                                        class="text-gray-400 hover:text-gray-100 mr-2">
                                        <i class="material-icons-outlined text-base">visibility</i>
                                    </a>
                                    <a href="/admin/category/edit?id=<?= $category['id'] ?>"
                                        class="text-gray-400 hover:text-gray-100 mx-2">
                                        <i class="material-icons-outlined text-base">edit</i>
                                    </a>
                                    <?php require base_path("views/admin/category/delete.php") ?>
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