<?php require_once base_path("App/Views/partials/head.php"); ?>

<?php
// dd($errors);
?>

<div class="page-wrapper">
    <?php require_once base_path("App/Views/partials/navi.php"); ?>

    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>

        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
            <form class="form" method="post" action="/auth/register" enctype="multipart/form-data">
                <div class="form-items">
                    <?php if (isset($errors['auth-msg']) ?? false): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $errors['auth-msg'] ?>
                        </div>
                    <?php endif; ?>
                    <!-- User name -->
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name='name'
                            value="<?= $old['name'] ?? null ?>" required>
                        <?php if (isset($errors['name']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['name'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label class="form-label required-label" for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name='phone'
                            value="<?= $old['phone'] ?? null ?>" required>

                        <?php if (isset($errors['phone']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['phone'] ?>
                            </p>
                        <?php endif; ?>

                    </div>

                    <!-- Email User -->
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name='email'
                            value="<?= $old['email'] ?? null ?>" required>
                        <?php if (isset($errors['email']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['email'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Password User -->
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" class="form-control" id="password" name='password' required>
                        <?php if (isset($errors['password']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['password'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Admin Role -->
                    <div class='mb-3'>
                        <label class="form-label required-label" for="role">Role</label>
                        <select class="form-select" id="role" name='role' required>
                            <option value="admin">Admin</option>
                            <option value="doctor">Doctor</option>
                            <option value="patient">User</option>
                        </select>
                        <?php if (isset($errors['role']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['role'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Majors Role show when Doctor -->
                    <div class='hidden mb-3' id='majors-section'>
                        <label class="form-label required-label" for="majors">Majors</label>
                        <select class="form-select" id="majors" name='major_id' required>
                            <?php foreach ($majors as $major): ?>
                                <option value="<?= $major['id'] ?>">
                                    <?= $major['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['role']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['role'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Bio -->
                    <div id='bio-section'>
                        <label class="form-label required-label" for="bio">Bio</label>
                        <textarea class="form-control" id="bio" name='bio' required></textarea>
                        <?php if (isset($errors['bio']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['bio'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Checkup -->
                    <div class="hidden" style="grid-column: 1/3" id='checkup-section'>
                        <label class="form-label required-label" for="checkup">CheckUp</label>
                        <textarea class="form-control" id="checkup" name='checkup'></textarea>
                        <?php if (isset($errors['checkup']) ?? false): ?>
                            <p class="alert alert-danger" role="alert">
                                <?= $errors['checkup'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                </div>

                <!-- Upload Image -->
                <?php require_once base_path("App/Views/components/upload_file.php"); ?>

                <!-- Submit Form -->
                <input type="submit" class="btn btn-primary" value="Create account" />
            </form>

            <!-- Login Link -->
            <div class="d-flex justify-content-center gap-2">
                <span>already have an account?</span><a class="link" href="/auth/login"> login</a>
            </div>
        </div>

    </div>
</div>

<!-- Show Checkup or not if it is Patient -->
<script>
    const checkup_section = document.getElementById('checkup-section');
    const majors_section = document.getElementById('majors-section');

    const role = document.getElementById('role');

    role.addEventListener('change', (e) => {
        if (e.target.value === 'patient') {
            checkup_section.classList.remove('hidden');
        } else {
            checkup_section.classList.add('hidden');
        }

        if (e.target.value === 'doctor') {
            majors_section.classList.remove('hidden');
        } else {
            majors_section.classList.add('hidden');
        }
    })
</script>

<?php require_once base_path("App/Views/partials/footer.php") ?>
<?php require_once base_path("App/Views/partials/foot.php") ?>