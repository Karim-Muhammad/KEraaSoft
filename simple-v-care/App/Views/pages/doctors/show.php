<?php require_once base_path("App/Views/partials/head.php"); ?>

<?php
// dd($doctor);
// dd(Session::get('user'));
?>

<div class="page-wrapper">
    <?php require_once base_path("App/Views/partials/navi.php"); ?>

    <div class="container">
        <?php if (isset($errors['auth-msg'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errors['auth-msg'] ?>
            </div>
        <?php endif; ?>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/doctors">doctors</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $doctor['name'] ?>
                </li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 details-card doctor-details">
            <div class="details d-flex gap-2 align-items-center">
                <img src="/assets/images/major.jpg" alt="doctor" class="img-fluid rounded-circle" height="150"
                    width="150">
                <div class="details-info d-flex flex-column gap-3 ">
                    <h4 class="card-title fw-bold">
                        <?= $doctor['name'] ?>
                    </h4>
                    <div class="d-flex gap-3 align-bottom">
                        <ul class="rating">
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                        </ul>
                        <a href="#" class="align-baseline">submit rating</a>
                    </div>
                    <h6 class="card-title fw-bold">
                        <?= $doctor['bio'] ?>
                    </h6>
                </div>
            </div>
            <hr />
            <form class="form" method="post" action="/bookings">
                <input type='hidden' name='doctor_id' value="<?= $doctor['id'] ?>" />
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">
                            Name
                        </label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="phone">
                            Phone Number </label>
                        <input type="tel" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">
                            Email Address </label>
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </form>

        </div>
    </div>
</div>

<script>
    const stars = document.querySelectorAll('.star');

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            const isActive = star.classList.contains('active');
            if (isActive) {
                star.classList.remove('active');
            } else {
                star.classList.add('active');
            }
            for (let i = 0; i < index; i++) {
                stars[i].classList.add('active');
            }
            for (let i = index + 1; i < stars.length; i++) {
                stars[i].classList.remove('active');
            }
        });
    });
</script>


<?php require_once base_path("App/Views/partials/foot.php"); ?>