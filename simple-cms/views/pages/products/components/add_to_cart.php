<form action="/cart" method="POST">
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
    <input type="hidden" name="user_id" value="<?= Session::get('user')['id'] ?? null ?>" />
    <input type="hidden" name="quantity" value="1" />

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
        Add to Cart
    </button>
</form>