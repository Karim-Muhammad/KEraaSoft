<?php view("partials/header.php") ?>

<section class='container w-90 d-flex flex-wrap justify-content-between'>
    <div class=''>
        <h3 class='my-3 text-secondary'>Your Tasks</h3>
        <a href="/todos/create" class="btn btn-primary">Create Todo</a>

        <p class='font-sm my-5 text-secondary text-mute'> Hello
            <?= $_SESSION['user']['fullname'] ?>
        </p>
    </div>
    <div class="w-100 row flex-wrap align-items-center">
        <?php if (count($todos) > 0): ?>
            <?php foreach ($todos as $todo): ?>
                <div class="card col-lg-4 col-md-6 col-sm-12">
                    <small class='text-primary'>
                        <?= $todo["updated_at"] ?>
                    </small>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $todo["title"] ?>
                        </h5>
                        <ul>
                            <?php foreach ($todo["content"] as $field): ?>
                                <li>
                                    <?= $field ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class='d-flex justify-content-end gap-3'>
                            <form method="post" action="/todo/delete">
                                <input type="hidden" name="todo_id" value="<?= $todo['id'] ?>">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>

                            <a class="btn btn-info" href="/todo/edit?id=<?= $todo['id'] ?>">Edit</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">
                No todos yet!
            </div>
        <?php endif; ?>
    </div>
</section>

<?php view("partials/footer.php") ?>