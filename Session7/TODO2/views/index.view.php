<?php view("partials/header.php") ?>

<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <h1>Welcome To Home Page</h1>
        </div>
        <div class="card-footer text-muted">
            Let's enjoy in Journey as possible
        </div>
    </div>

    <div class='row gap-4 align-items-center'>
        <img class='col-3' src='/images/notes.svg' />
        <div class='h1 col-8'>
            <h1>
                Notes App - Save your notes
                <img style='width: 50px' src='/images/warrior.svg' />
            </h1>
            <p>Notes App is a simple web application that allows users to create, edit, delete and view notes.</p>
            <a href='/todos' class='btn btn-primary'>View Notes</a>
        </div>
    </div>


</div>

<?php view("partials/footer.php") ?>