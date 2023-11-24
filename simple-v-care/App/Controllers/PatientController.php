<?php

require_once base_path('App/Models/Patient.php');

class PatientController
{
    // For Admin Dashboard
    public function index()
    {
        $patients = Patient::allJoin();
        // dd($patients);

        view("admin/patients/index", [
            'name' => "Patients",
            'patients' => $patients
        ]);
    }

    // For User
    public function doctors()
    {
        view("pages/doctors/index", [
            'name' => "Doctors",
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
        view("pages/doctors/show", [
            'name' => "Doctor",
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
        $doctor->major_id = $_POST['major_id'];
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

return new PatientController();