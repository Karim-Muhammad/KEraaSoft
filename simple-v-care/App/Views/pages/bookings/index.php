<?php require_once base_path("App/Views/partials/head.php") ?>
<?php
// dd($products);
// dd(Session::get('user'));
?>

<div class="page-wrapper">
    <?php require_once base_path("App/Views/partials/navi.php") ?>
    <div class="container">
        <?php
        // dd($bookings);
        ?>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">history</li>
            </ol>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">major</th>
                    <th scope="col">location</th>
                    <th scope="col">completed</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($bookings); $i += 2): ?>
                    <tr>
                        <th scope="row">
                            <?= $bookings[0]['id'] ?>
                        </th>
                        <td>
                            <?= $bookings[0]['date'] ?>
                        </td>
                        <td class="d-flex align-items-center gap-2"><img src="assets/images/major.jpg" alt="" width="25"
                                height="25" class="rounded-circle">
                            <a href="/doctor?id=<?= $bookings[1]['doctor_id'] ?>">
                                <?= $bookings[1]['username'] ?>
                            </a>
                        </td>
                        <td>
                            <?= $bookings[1]['major_name'] ?>
                        </td>
                        <td><a href="https://www.google.com/maps" target="_blank">eraasoft</a></td>
                        <td>
                            <?= $bookings[0]['status'] ?>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>


<?php require_once base_path("App/Views/partials/foot.php") ?>