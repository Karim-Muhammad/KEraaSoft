<?php
?>
<!-- Upload Image -->
<div class='mb-3'>
    <div class="row py-4">
        <div class="col-lg-6 mx-auto">

            <!-- Upload image input-->
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" name='upload_file' onchange="readURL(this);"
                    class="form-control border-0">

                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose
                    file</label>

                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                            class="fa fa-cloud-upload mr-2 text-muted"></i><small
                            class="text-uppercase font-weight-bold text-muted">Choose
                            file</small></label>
                </div>
            </div>

            <!-- Uploaded image area-->
            <div class="image-area mt-4"><img id="imageResult"
                    src="<?= $user['image'] ? "/uploads/{$user['image']}" : "" ?>" alt=""
                    class="img-fluid rounded shadow-sm mx-auto d-block"></div>
        </div>
    </div>
</div>



<!-- Upload Image Script -->
<script>
    /*  ==========================================
                SHOW UPLOADED IMAGE
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.querySelector('#imageResult').setAttribute('src', e.target.result);
                console.log(e.target)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */

    input.addEventListener('change', showFileName);
    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;

        infoArea.textContent = 'File name: ' + fileName;
    }
</script>