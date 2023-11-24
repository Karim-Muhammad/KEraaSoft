<?php

require_once base_path('App/Models/Majors.php');

class MajorController
{
    // For Admin Dashboard
    public function index()
    {
        $majors = Majors::all();

        view("admin/majors/index", [
            'name' => "Majors",
            'majors' => $majors
        ]);
    }

    // For Admin Dashboard
    public function show()
    {
        view("admin/majors/show", [
            'name' => "Major",
        ]);
    }

    public function create()
    {
        view("admin/majors/create", [
            'name' => "Create Major",
        ]);
    }

    public function store()
    {
        // TODO: Store Major
        $doctor = new Doctor();
        $doctor->name = $_POST['name'];
        $doctor->email = $_POST['email'];
        $doctor->password = $_POST['password'];
        $doctor->major_id = $_POST['major_id'];
        $doctor->save();

        redirect('/admin/majors');
    }


    public function edit()
    {
        view("admin/majors/edit", [
            'name' => "Edit Doctor",
        ]);
    }

    public function update()
    {
        // TODO: Update Major

        redirect('/admin/majors');
    }

    public function destroy()
    {
        // TODO: Delete Major
        redirect('/admin/majors');
    }
}

return new MajorController();