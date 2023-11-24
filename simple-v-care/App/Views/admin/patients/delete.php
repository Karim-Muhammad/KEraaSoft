<form id='category-delete' class='inline-block' action='/admin/category' method='POST'>
    <input type='hidden' name='_method' value='DELETE' />
    <input type='hidden' name='user_id' value='<?= Session::get('user')['id'] ?>' />
    <input type='hidden' name='id' value='<?= $category['id'] ?>' />
    <button onclick="remove(this);" type="button" class="text-gray-400 hover:text-gray-100 ml-2">
        <i class="material-icons-round text-base">delete_outline</i>
    </button>
</form>

<script>
    function remove() {
        if (confirm('Are you sure you want to delete this category? All Products that belong to this category will be deleted as well')) {
            this.parentElement.submit()
        }
    }
</script>