<?php
// dd($patients);
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Checkup</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Checkup</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td>
                                <?= $patient['id'] ?>
                            </td>
                            <td>
                                <img class='w-100' src="/uploads/<?= $patient['image'] ?>" />
                            </td>
                            <td>
                                <?= $patient['name'] ?>
                            </td>
                            <td>
                                <?= $patient['email'] ?>
                            </td>
                            <td>
                                <?= $patient['phone'] ?>
                            </td>
                            <td>
                                <?= $patient['checkup'] ?>
                            </td>
                            <td>
                                <a class='w-100 btn btn-secondary'
                                    href="/admin/patients/edit?id=<?= $patient['user_id'] ?>">Edit</a>

                                <a class='w-100 btn btn-danger'
                                    href='/admin/patients/delete?id=<?= $patient['user_id'] ?>'>Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>