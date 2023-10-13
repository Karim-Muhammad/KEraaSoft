<?php require_once base_path("views/partials/head.view.php"); ?>
<?php require_once base_path("views/partials/nav.view.php"); ?>
<?php require_once base_path("views/partials/banner.view.php"); ?>

<div class="container mx-auto my-60">
    <div>

        <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
            <div class="flex justify-center">
                <img src="/images/Ninja.svg" alt="" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
            </div>

            <div class="mt-16">
                <h1 class="font-bold text-center text-3xl text-gray-900"><?= $user["name"] ?></h1>
                <p class="text-center text-sm text-gray-400 font-medium"><?= $user["email"] ?></p>
                <div class="w-full">
                    <h3 class="font-medium text-gray-900 text-left px-6">Recent Notes</h3>
                    <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                        <?php if($notes): ?>
                            <?php foreach($notes as $note): ?>
                                <div class="w-full flex flex-col bg-white border-t-2 rounded-lg px-8 py-6">
                                    <div class="flex justify-between items-center">
                                        <h1 class="font-bold text-gray-700"><?= $note['id'] ?></h1>
                                        <span class="text-sm text-gray-400"><?= $note['user_id'] ?></span>
                                    </div>
                                    <p class="mt-2 text-gray-600"><?= $note['content'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="w-full flex flex-col bg-white text-center rounded-lg px-8 py-6">
                                <h1 class="text-lg font-bold text-slate-500">No notes found</h1>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
    require_once base_path("views/partials/footer.view.php")
?>

