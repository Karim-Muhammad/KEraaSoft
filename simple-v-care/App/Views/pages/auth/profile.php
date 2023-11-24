<?php require_once base_path("App/Views/partials/head.php") ?>
<?php require_once base_path("App/Views/partials/navi.php") ?>

<div class="container rounded bg-white mt-5 mb-5">
    <?php if (Session::has('auth-msg')): ?>
        <div class="alert alert-success" role="alert">
            <?= Session::get('auth-msg') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px" height="150" src="/uploads/<?= $user['image'] ?>"><span class="font-weight-bold">
                    <?= $user['name'] ?>
                </span><span class="text-black-50">
                    <?= $user['email'] ?>
                </span><span>
                </span></div>
        </div>

        <div class="col border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <form method='POST' action='/auth/profile' enctype="multipart/form-data">
                    <input type='hidden' name="_method" value="PATCH">

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name='name'
                                value="<?= $user['name'] ?>">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!-- Phone Number -->
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                class="form-control" placeholder="Enter Phone Number" name='phone'
                                value="<?= $user['phone'] ?>"></div>

                        <!-- Major -->
                        <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                class="form-control" placeholder="Email" name='email' value="<?= $user['email'] ?>">
                        </div>

                        <!-- Bio -->
                        <div class="col-md-12"><label class="labels">Bio</label>
                            <textarea class="form-control" name='bio'
                                placeholder="Brief about you..."><?= $user['bio'] ?></textarea>
                        </div>
                    </div>

                    <!-- Not Yet -->
                    <!-- <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                class="form-control" placeholder="country" value=""></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                class="form-control" value="" placeholder="state"></div>
                    </div> -->

                    <!-- Update Profile -->
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button></div>


                    <?php require_once base_path("App/Views/components/upload_file.php"); ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php require_once base_path("App/Views/partials/foot.php") ?>