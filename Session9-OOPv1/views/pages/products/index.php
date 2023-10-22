<?php require_once base_path("views/partials/head.php") ?>
<?php require_once base_path("views/partials/navi.php") ?>

<?php
require_once base_path("Models/Product.php");
$products = Product::all();
// dd($products);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Products</h1>
            <a href="/products/create" class="btn btn-primary">Create</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>
                                <?= $product['id'] ?>
                            </td>
                            <td>
                                <?= $product['name'] ?>
                            </td>
                            <td>
                                <?= $product['price'] ?>
                            </td>
                            <td>
                                <a href="/products/edit?id=<?= $product['id'] ?>" class="btn btn-warning">Edit</a>
                                <form action="/products/edit?id=<?= $product['id'] ?>" method="post"
                                    style="display:inline-block">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once base_path("views/partials/foot.php") ?>