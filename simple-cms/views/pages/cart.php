<!-- cart view -->
<?php require_once base_path("views/partials/head.php"); ?>
<?php require_once base_path("views/partials/navi.php"); ?>
<?php #dd($cart); ?>
<?php
$products = $cart;
?>



<div class='container'>
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Remove
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 rounded-full" src="/uploads/<?= $product['image'] ?>"
                                            alt="<?= $product['name'] ?>">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?= $product['name'] ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    <?= $product['quantity'] ?? 1 ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">
                                    <?= $product['price'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <form action="/cart" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <input type="hidden" name="user_id" value="<?= (int) $product['user_id'] ?>">
                                    <button type="submit" class='text-red-500'>Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="2"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                        </td>
                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            $
                            <?= (double) array_sum(array_column($products, 'price')) ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <form method='POST'>
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="user_id" value="<?= Session::get('user')['id'] ?? null ?>">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Checkout
                </button>
            </form>
        </div>
    </div>
</div>
<?php require_once base_path("views/partials/foot.php"); ?>