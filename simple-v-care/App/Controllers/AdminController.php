<?php

require_once base_path("App/Models/Doctor.php");
require_once base_path("App/Models/Patient.php");

class AdminController
{
    public function index()
    {
        // dd('Admin Dashboard');
        $doctorsCount = Doctor::count();
        $patientsCount = Patient::count();
        // dd([$doctorsCount, $patientsCount]);

        return view('admin/dashboard', compact('doctorsCount', 'patientsCount'));
    }
}

return new AdminController();