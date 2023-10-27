<form id='product-delete' class='inline-block' action='/admin/product' method='POST'>
    <input type='hidden' name='_method' value='DELETE' />
    <input type='hidden' name='user_id' value='<?= Session::get('user')['id'] ?>' />
    <input type='hidden' name='id' value='<?= $product['id'] ?>' />
    <button onclick="remove(this);" type="button" class="text-gray-400 hover:text-gray-100 ml-2">
        <i class="material-icons-round text-base">delete_outline</i>
    </button>
</form>

<script>
    function remove(el) {
        if (confirm('Are you sure you want to delete this Product?')) {
            el.parentElement.submit()
        }
    }
</script>