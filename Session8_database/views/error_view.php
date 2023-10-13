<?php
   require_once base_path("views/partials/head.view.php");
   require_once base_path("views/partials/nav.view.php");
   require_once base_path("views/partials/banner.view.php");

    $content = "";
    if($error_code === 404)
        $content = "Looks like you've found the doorway to the great nothing";
    elseif($error_code === 403)
        $content = "Sorry, You don't have permission to access this page";
    elseif($error_code === 401)
        $content = "Unauthorized!";
    elseif($error_code === 500)
        $content = "Internal Server Error!";
    else
        $content = "Something went wrong!";
?>

<div class='container max-w-lg mx-auto'>
       <!-- component -->
       <div class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
        <div class="xl:pt-24 w-full xl:w-1/2 relative pb-12 lg:pb-0">
            <div class="relative">
                <div class="absolute">
                    <h2 class="text-red-500 font-bold text-3xl">
                        <?= $error_code ?>
                    </h2>
                    <div class="">
                        <h1 class="my-2 text-gray-800 font-bold text-2xl">
                            <?= $content ?>
                        </h1>
                        <p class="my-2 text-gray-800">Sorry about that! Please visit our hompage to get where you need to go.</p>
                        <button class="sm:w-full lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-opacity-50">
                            <a href="/">Take me there!</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <img src="https://i.ibb.co/ck1SGFJ/Group.png" />
        </div>
    </div>
</div>

<?php
    require_once base_path("views/partials/footer.view.php")
?>