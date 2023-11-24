<?php require_once base_path("views/admin/partials/head.php") ?>

<?php
require_once base_path("Models/Category.php");
require_once base_path("Core/Session.php");
$categories = Category::all();

?>

<!-- component -->
<!-- Create View -->

<div class="p-3 min-h-screen">
    <div class="col-span-12">
        <?php
        echo (Session::get('errors')['auth-msg'] ?? null)
            ?>

        <div class="overflow-auto lg:overflow-visible ">
            <form action="/admin/products" method="POST" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='POST' />
                <input type='hidden' name='user_id' value='<?= Session::get('user')['id'] ?>' />

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Name</label>
                        <input name="name" type="text" class="p-2 rounded-md w-full border mt-2 flex-1"
                            placeholder="Name">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Price</label>
                        <input name="price" type="text" class="p-2 rounded-md input w-full border mt-2 flex-1"
                            placeholder="Price">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-500 py-2">Description</label>
                        <textarea rows="7" name="description" class="w-full border flex-1">
                        </textarea>
                    </div>
                    <div class="space-y-2">
                        <div x-data="{photoName: null, photoPreview: null}"
                            class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                            <!-- Photo File Input -->
                            <input type="file" name='file_upload' class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
    ">

                            <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                                Product Photo <span class="text-red-600"> </span>
                            </label>

                            <div class="text-center">
                                <!-- Current Profile Photo -->
                                <div class="mt-2" x-show="! photoPreview">
                                    <img src="https://images.unsplash.com/photo-1531316282956-d38457be0993?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80"
                                        class="w-40 h-40 m-auto rounded-full shadow">
                                </div>

                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                    <span class="block w-40 h-40 rounded-full m-auto shadow"
                                        x-bind:style="'background-size: contain; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"
                                        style="background-size: contain; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                    </span>
                                </div>

                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3"
                                    x-on:click.prevent="$refs.photo.click()">
                                    Select New Photo
                                </button>
                            </div>
                        </div>

                        <!-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload file</label>
                        <label
                            class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none hover:bg-blue-600 cursor-pointer transition ease-in duration-300">
                            Upload
                            <input
                                class="hidden w-full text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" name='file_upload' type="file">
                        </label> -->
                    </div>
                    <div class="space-y-2">
                        <div>
                            <div class="w-fit relative self-center">
                                <svg class="text-white bg-purple-700 absolute top-0 right-0 m-2 pointer-events-none p-2 rounded"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="30px" height="30px" viewBox="0 0 38 22" version="1.1">
                                    <title>F09B337F-81F6-41AC-8924-EC55BA135736</title>
                                    <g id="ZahnhelferDE—Design" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="ZahnhelferDE–Icon&amp;Asset-Download"
                                            transform="translate(-539.000000, -199.000000)" fill="#ffffff"
                                            fill-rule="nonzero">
                                            <g id="Icon-/-ArrowRight-Copy-2"
                                                transform="translate(538.000000, 183.521208)">
                                                <polygon id="Path-Copy"
                                                    transform="translate(20.000000, 18.384776) rotate(135.000000) translate(-20.000000, -18.384776) "
                                                    points="33 5.38477631 33 31.3847763 29 31.3847763 28.999 9.38379168 7 9.38477631 7 5.38477631" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <select name='category_id'
                                    class="text-xl font-bold rounded border-2 border-purple-700 text-gray-600 h-11 w-60 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>">
                                            <?= $category['name'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <button type="submit"
                            class="btn px-4 py-2 bg-purple-700 text-white hover:bg-purple-700 hover:text-white transition duration-150 ease-in-out">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require_once base_path("views/admin/partials/foot.php") ?>