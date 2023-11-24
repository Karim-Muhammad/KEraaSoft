<?php

$heading = $_SERVER["REQUEST_URI"];
$routes_links = render_nav(isset($_SESSION["user"]) ?? false);

?>

<nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
    <div class="container">
        <div class="navbar-brand">
            <a class="fw-bold text-white m-0 text-decoration-none h3" href="/">VCare</a>
        </div>
        <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                <a type="button" class="btn btn-outline-light navigation--button" href="/">Home</a>
                <a type="button" class="btn btn-outline-light navigation--button" href="/doctors">Doctors</a>
                <!-- <a type="button" class="btn btn-outline-light navigation--button"
                    href="../doctors/index.html">Doctors</a> -->

                <?php if (Session::has('user')): ?>
                    <a type="button" class="btn btn-outline-light navigation--button" href="/auth/logout">Logout</a>
                    <a type="button" class="btn btn-outline-light navigation--button" href="/auth/profile">Profile</a>
                    <a type="button" class="btn btn-outline-light navigation--button" href="/bookings">Bookings</a>
                <?php else: ?>
                    <a type="button" class="btn btn-outline-light navigation--button" href="/auth/login">Login</a>
                    <a type="button" class="btn btn-outline-light navigation--button" href="/auth/register">Register</a>
                <?php endif; ?>

                <?php if ((Session::get('user')['role'] ?? false) == 'admin'): ?>
                    <a type="button" class="btn btn-outline-light navigation--button" href="/admin">Admin</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>