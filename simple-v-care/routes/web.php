<?php


if (isset($router))
    return;

require_once base_path("Core/Router.php");

static $router = new Router();

// ======================== General ==============================
$router->get('/', 'PageController@home', "Home");
$router->get('/contact', 'PageController@contact', "Contact"); // ->only('admin')
$router->get('/error', 'PageController@error', "Error");

// ======================== Doctors - [User] ==============================
$router->get('/doctors', 'DoctorController@doctors', "Doctors");
$router->get('/doctor', 'DoctorController@doctor', "Doctor");

// ========================== CRUD - [Admin] ==========================
$router->get('/admin/doctors', 'DoctorController@index', "Doctors")->only('admin');
$router->get('/admin/doctor', 'DoctorController@show', "Doctor")->only('admin');

$router->get('/admin/doctors/create', 'DoctorController@create', "Create Doctor")->only('admin');
$router->post('/admin/doctors', 'DoctorController@store')->only('admin');

$router->get('/admin/doctor/edit', 'DoctorController@edit', "Edit Doctor")->only('admin');
$router->patch('/admin/doctor', 'DoctorController@update')->only('admin');

$router->delete('/admin/doctor', 'DoctorController@destroy')->only('admin');

// ======================== Majors - [Admin] ==========================
$router->get('/admin/majors', 'MajorController@index', "Majors")->only('admin');
$router->get('/admin/major', 'MajorController@show', "Major")->only('admin');

// =========================== CRUD ==========================
$router->get('/admin/majors/create', 'MajorController@create', "Create Major")->only('admin');
$router->post('/admin/majors', 'MajorController@store')->only('admin');

$router->get('/admin/major/edit', 'MajorController@edit', "Edit Major")->only('admin');
$router->patch('/admin/major', 'MajorController@update')->only('admin');

$router->delete('/admin/major', 'MajorController@destroy')->only('admin');

// ============================== Patients - [Admin] ================================= //
$router->get('/admin/patients', 'PatientController@index', "Patients")->only('admin');
$router->get('/admin/patient', 'PatientController@show', "Patient")->only('admin');

// ================================== CRUD ================================= //
$router->get('/admin/patients/create', 'PatientController@create', "Create Patient")->only('admin');
$router->post('/admin/patients', 'PatientController@store')->only('admin');

$router->get('/admin/patient/edit', 'PatientController@edit', "Edit Patient")->only('admin');
$router->patch('/admin/patient', 'PatientController@update')->only('admin');

$router->delete('/admin/patient', 'PatientController@destroy')->only('admin');

// ======================== Booking - [Auth] ================================
$router->get('/bookings', 'BookingController@index', "Booking")->only('auth');
$router->post('/bookings', 'BookingController@store')->only('auth');

$router->delete('/booking', 'BookingController@destroy')->only('auth');
/**
 * User Can Cancel Booking
 */

// ======================== Booking - [Admin] ================================
$router->get('/booking/update', 'BookingController@edit', "Booking")->only('auth');
$router->patch('/booking', 'BookingController@update')->only('auth');
/**
 * Admin Can Change Booking Status
 */

// ======================== Admin ===============================
$router->get("/admin", "AdminController@index", "Admin Dashboard")->only('admin');

// ======================== Auth ================================
$router->get("/auth/login", "AuthController@login", "Login")->only('guest');
$router->post("/auth/login", "AuthController@handleLogin")->only('guest');

$router->get("/auth/register", "AuthController@register", "Register")->only('guest');
$router->post("/auth/register", "AuthController@handleRegister")->only('guest');

$router->get("/auth/logout", "AuthController@logout", "Logout")->only('auth');

// ======================== User [Profile] ================================
$router->get('/auth/profile', 'UserController@index', "Profile")->only('auth');
$router->patch('/auth/profile', 'UserController@update')->only('auth');