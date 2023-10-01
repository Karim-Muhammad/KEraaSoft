<?php require_once base_path("views/partials/header.php") ?>
<div class="container my-3 w-5">
    <div class="card text-center p-3 bg-secondary my-3 text-white">
        Create A Todolist
    </div>

    <?php if (validateKey($errors, "login-auth")): ?>
        <div class="alert alert-danger">
            <?= $errors["login-auth"] ?>
        </div>
    <?php endif ?>

    <form method="POST" action="/todos/store">
        <div class="mb-3">
            <label for="input-title" class="form-label">Title</label>
            <input value="<?= $old['title'] ?? "" ?>" type="text" name="title" class="form-control" id="input-title">
        </div>
        <?php if ($errors["title"] ?? false): ?>
            <div class="alert alert-danger">
                <?= $errors["title"] ?>
            </div>
        <?php endif; ?>

        <?php for ($i = 0; $i < $fields_count; $i++): ?>
            <div class="mb-3">
                <label for="input-field-<?= $i ?>" class="form-label">Field
                    <?= $i + 1 ?>
                </label>
                <input value="<?= $old['fields'][$i] ?? "" ?>" type="text" name="fields[]" class="form-control"
                    id="input-field-<?= $i ?>">
            </div>
        <?php endfor ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if ($errors["fields"] ?? false): ?>
        <div class="alert alert-danger">
            <?= $errors["fields"] ?>
        </div>
    <?php endif; ?>

    <form class="d-flex justify-content-end gap-3" method="post" action="/fields">
        <input type="hidden" name="fields_count" value="<?= $fields_count ?>">
        <button class="btn btn-danger d-block" name="action" value="delete" type="submit">Delete Field
            Content</button>
        <button class="btn btn-info d-block" name="action" value="add" type="submit">Add Another Field
            Content</button>
    </form>
</div>

<?php
// $_SESSION["errors"] = null;
// $_SESSION["fields_count"] = null;
// $_SESSION["old"] = null;
?>

<?php require_once base_path("views/partials/footer.php") ?>