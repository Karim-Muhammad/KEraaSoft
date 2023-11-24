<?php

require_once base_path('App/Models/Doctor.php');

class DoctorController
{
    // For Admin Dashboard
    public function index()
    {
        $doctors = Doctor::allJoins();
        // dd($doctors);

        view("admin/doctors/index", [
            'name' => "Doctors",
            'doctors' => $doctors
        ]);
    }

    // For User
    public function doctors()
    {
        $doctors = Doctor::allJoins();
        view("pages/doctors/index", [
            'name' => "Doctors",
            'doctors' => $doctors
        ]);
    }

    // For Admin Dashboard
    public function show()
    {
        view("admin/doctors/show", [
            'name' => "Doctor",
        ]);
    }

    // For User
    public function doctor()
    {
        $ID = (int) $_GET['id'];
        $doctor = Doctor::allJoins("doctors.`id` = {$ID}")[0];

        view("pages/doctors/show", [
            'name' => "Doctor",
            "errors" => Session::get('errors'),
            'doctor' => $doctor
        ]);
    }

    public function create()
    {
        view("admin/doctors/create", [
            'name' => "Create Doctor",
        ]);
    }

    public function store()
    {
        // dd($_POST);
        $doctor = new Doctor();
        $doctor->name = $_POST['name'];
        $doctor->email = $_POST['email'];
        $doctor->password = $_POST['password'];
        $doctor->major_id = (int) $_POST['major_id'];
        $doctor->save();

        redirect('/admin/doctors');
    }


    public function edit()
    {
        view("admin/doctors/edit", [
            'name' => "Edit Doctor",
        ]);
    }

    public function update()
    {
        // dd($_POST);
        $doctor = new Doctor();
        $doctor->name = $_POST['name'];
        $doctor->email = $_POST['email'];
        $doctor->password = $_POST['password'];
        $doctor->major_id = $_POST['major_id'];
        $doctor->save();

        redirect('/admin/doctors');
    }

    public function destroy()
    {
        // dd($_POST);
        $doctor = new Doctor();
        $doctor->name = $_POST['name'];
        $doctor->email = $_POST['email'];
        $doctor->password = $_POST['password'];
        $doctor->major_id = $_POST['major_id'];
        $doctor->save();

        redirect('/admin/doctors');
    }
}

return new DoctorController();