<?php require_once base_path("views/partials/head.view.php"); ?>
<?php require_once base_path("views/partials/nav.view.php"); ?>
<?php require_once base_path("views/partials/banner.view.php"); ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <li class="p-4 bg-slate-300 cursor-pointer hover:ring block flex justify-between">
                <span>
                    <?= $note["content"] ?>
                </span>
                <svg class="h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </li>
        </ul>

        <div class="flex align-center gap-2">
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="id" value="<?= $note["id"] ?>">
                <button data-id="<?= $note["id"] ?>" id="btn_delete"
                    class="my-3 w-[100px] px-4 py-2 rounded-md bg-red-400 hover:bg-red-500 text-white"
                    type="submit">Delete</button>
            </form>

            <a href="/note/edit?id=<?= $note['id'] ?>"
                class="my-3 w-[100px] px-4 py-2 rounded-md bg-slate-500 text-white hover:bg-slate-600">Edit</a>
        </div>
    </div>
</main>

</div>
</div>


<!--<script defer>-->
<!--    console.log("Hello from show.js")-->
<!---->
<!--    function start() {-->
<!--        console.log("INIT");-->
<!---->
<!--        const deleteBtn = document.getElementById("btn_delete");-->
<!--        deleteBtn.addEventListener("click", async() => {-->
<!--            const id = deleteBtn.dataset.id;-->
<!--            try {-->
<!--                const response = await fetch(`/notes/delete?id=${id}`, {-->
<!--                    method: "DELETE",-->
<!--                });-->
<!--                const data = await response.json();-->
<!--                console.log(data);-->
<!--                if(data.success) {-->
<!--                    window.location.href = "/notes";-->
<!--                }else {-->
<!--                    throw new Error("Something went wrong");-->
<!--                }-->
<!--            }catch(err) {-->
<!--                console.log(err);-->
<!--            }-->
<!--        });-->
<!---->
<!--        //const updateBtn = document.querySelector("#btn_update");-->
<!---->
<!--        updateBtn.addEventListener("click", () => {-->
<!--            const id = updateBtn.dataset.id;-->
<!--            const content = document.querySelector(".content").value;-->
<!--            fetch(`/notes/edit?id=${id}`, {-->
<!--                method: "PUT",-->
<!--                headers: {-->
<!--                    "Content-Type": "application/json",-->
<!--                },-->
<!--                body: JSON.stringify({content}),-->
<!--            })-->
<!--            .then(res => res.json())-->
<!--            .then(data => {-->
<!--                if(data.success) {-->
<!--                    window.location.href = "/notes";-->
<!--                }-->
<!--            })-->
<!--            .catch(err => console.log(err));-->
<!--        });-->
<!--    }-->
<!---->
<!--    window.onload = start;-->
<!---->
<!---->
<!--</script>-->
<?php require_once base_path("views/partials/footer.view.php") ?>