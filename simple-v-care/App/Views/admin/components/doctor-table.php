<?php
// dd($doctors);
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
                        <th>Major</th>
                        <th>Actions</th>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Major</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td>
                                <?= $doctor['id'] ?>
                            </td>
                            <td>
                                <img class="w-100" src='/uploads/<?= $doctor['image'] ?>' />
                            </td>
                            <td>
                                <?= $doctor['name'] ?>
                            </td>
                            <td>
                                <?= $doctor['email'] ?>
                            </td>
                            <td>
                                <?= $doctor['phone'] ?>
                            </td>
                            <td>
                                <?= $doctor['major_name'] ?>
                            </td>
                            <td>
                                <!-- User_id -->
                                <a class='w-100 btn btn-secondary'
                                    href="/admin/doctors/edit?id=<?= $doctor['user_id'] ?>">Edit</a>

                                <!-- Id -->
                                <!-- need more effort for handle this design database -->
                                <a class='w-100 btn btn-danger'
                                    href='/admin/doctors/delete?id=<?= $doctor['id'] ?>'>Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>