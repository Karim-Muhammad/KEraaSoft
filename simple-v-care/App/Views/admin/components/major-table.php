<?php
// dd($majors);
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($majors as $major): ?>
                        <tr>
                            <td>
                                <?= $major['id'] ?>
                            </td>
                            <td>
                                <?= $major['name'] ?>
                            </td>
                            <td>
                                <?= $major['description'] ?>
                            </td>
                            <td>
                                <a class='w-100 btn btn-secondary' href="/admin/majors/edit?id=<?= $major['id'] ?>">Edit</a>

                                <a class='w-100 btn btn-danger'
                                    href='/admin/majors/delete?id=<?= $major['id'] ?>'>Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>