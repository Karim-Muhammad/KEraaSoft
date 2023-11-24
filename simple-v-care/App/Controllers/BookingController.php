<?php

require_once base_path('Core/Form.php');
require_once base_path('Core/Session.php');

require_once base_path('database/Database.php');
require_once base_path('App/Models/Booking.php');

class BookingController
{
    public function index()
    {
        // dd(password_hash("muhammad", PASSWORD_DEFAULT));
        if ((Session::get('user')['role'] ?? false) === 'patient') {
            $bookings = Booking::allJoins();
        } else if ((Session::get('user')['role'] ?? false) === 'doctor') {
            $bookings = Booking::allJoins();
        } else {
            $bookings = Booking::allJoins();
        }

        // dd($bookings);

        view("pages/bookings/index", [
            "errors" => Session::get("errors"),
            "inputs" => Session::get("old"),
            "bookings" => $bookings
        ]);
    }


    public function store()
    {
        global $database;

        // $formData = $_POST;
        if (Session::get('user')['role'] !== 'patient') {
            Session::flash('errors', ['auth-msg' => 'You are not authorized to do this action! (patients only)']);
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        $patient = $database->where('patients', 'user_id', Session::get('user')['id'])[0];
        $patient_id = $patient['id'];

        $formData = [
            'patient_id' => (int) $patient_id,
            'doctor_id' => (int) $_POST['doctor_id'] ?? '',
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
        ];

        $Form = new Form($formData);
        if (!$Form->validate()) {
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }
        // dd($formData);

        $booking = new Booking();
        $booking->patient_id = $formData['patient_id'];
        $booking->doctor_id = $formData['doctor_id'];
        $booking->date = $formData['date'];
        $booking->time = $formData['time'];
        $booking->save();

        redirect('/');
        return;
    }
}

return new BookingController();