<?php

class Booking
{
    private $id;
    public $patient_id;
    public $doctor_id;
    public $date;
    public $time;

    private $status = "pending";

    public function save()
    {
        global $database;

        $result = $database->insert('booking', [
            'patient_id' => $this->patient_id,
            'doctor_id' => $this->doctor_id,
            'date' => $this->date,
            'time' => $this->time
        ]);

        $this->id = $result['LAST_INSERT_ID()'];
        return $this->id;
    }

    public static function allJoins($where = true)
    {
        global $database;
        // dd(Session::get('user')['id']);
        return $database->selectJoins('users.`name` as username, patients.`id` as patient_id, `patients`.`user_id`, doctors.`id` as doctor_id, booking.*, majors.name as major_name', 'booking', where: $where, tables_on: [
            "patients" => "patients.`id` = booking.`patient_id` and patients.`user_id` = " . Session::get('user')['id'],
            "doctors" => "doctors.`id` = booking.`doctor_id`",
            "users" => "users.`id` = patients.`user_id` OR users.`id` = doctors.`user_id`",
            "majors" => 'majors.`id` = doctors.`major_id`',
        ]);
    }

    public function getID()
    {
        return $this->id;
    }
}