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
            <h1 class="h3 mb-4 text-gray-800">Patients Table</h1>
            <?php require_once base_path("App/Views/admin/components/patients-table.php") ?>
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