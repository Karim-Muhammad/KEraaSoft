<?php require_once base_path("App/Views/admin/partials/head.php") ?>
<?php require_once base_path("App/Views/admin/partials/wrapper.php") ?>
<?php require_once base_path("App/Views/admin/partials/aside.php") ?>

<?php #dd(Session::get('user')) ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once base_path("App/Views/admin/partials/navi.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Dashboard's
                <?= Session::get('user')['name'] ?? 'unknown' ?>
            </h1>

            <div class='row'>
                <!-- Doctors Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href='/admin/doctors'>
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Doctors</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $doctorsCount ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Patients Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href='/admin/patients'>
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Patients</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $patientsCount ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php require_once base_path("App/Views/admin/partials/footer.php") ?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php require_once base_path("App/Views/admin/partials/foot.php") ?>