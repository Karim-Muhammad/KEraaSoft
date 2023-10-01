<?php require_once base_path("views/partials/header.php") ?>
<div class="container my-3 w-5">
    <div class="card text-center p-3 bg-secondary my-3 text-white">
        Show - Todolist
    </div>
    <form method="POST" action="/todo/update">
        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
        <div class="mb-3">
            <label for="input-title" class="form-label">Title</label>
            <input value="<?= $todo["title"] ?? $old['title'] ?? "" ?>" type="text" name="title" class="form-control"
                id="input-title">
        </div>
        <?php for ($i = 0; $i < $fields_count; $i++): ?>
            <div class="mb-3">
                <label for="input-field-<?= $i ?>" class="form-label">Field
                    <?= $i + 1 ?>
                </label>
                <input disabled value="<?= $todo["content"][$i] ?? $old['fields'][$i] ?? "" ?>" type="text" name="fields[]"
                    class="form-control" id="input-field-<?= $i ?>">
            </div>
        <?php endfor ?>
    </form>
</div>

<?php
// $_SESSION["errors"] = null;
// $_SESSION["fields_count"] = null;
// $_SESSION["old"] = null;
?>

<?php require_once base_path("views/partials/footer.php") ?>