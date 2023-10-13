<?php

global $routes;

$auth = "guest";
if ($_SESSION["user"] ?? false)
    $auth = "auth";

?>

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="/images/Ninja.svg" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <?php # if (in_array($auth, $name["only"] ?? [])): ?>
                        <?php foreach ($routes as $link => $name): ?>
                            <?php if ($name['routable'] === true): ?>
                                <a href="<?= $link ?>"
                                    class="<?= $name["name"] === $heading ? "bg-gray-900 text-white" : "text-gray-300" ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium"
                                    aria-current="page">
                                    <?= $name["name"] ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <?php if (isset($_SESSION["user"]) ?? false): ?>
                        <div class="relative ml-3">
                            <button id="profile-img" type="button"
                                class="peer/img flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                            <div class="peer-[.active]/img:block hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <a href="/profile" class="hover:bg-slate-300 block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                                <a href="/logout" class="hover:bg-slate-300  block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="/login"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                        <a href="/register"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Register
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>


<script defer>
    const profileImg = document.getElementById("profile-img");
    profileImg.onclick = function () {
        profileImg.classList.toggle("active");
    }
</script>