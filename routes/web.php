<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ================ Traditional Way ================
Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/home', function () {
    return view('pages.home');
});

// ================ Passing Data to Views ================
Route::get('about', function () {
    return view('pages.about', ['title' => 'About Us']);
});
// ================ Equivalent to the above ================
Route::view("/about", "pages.about", ['title' => 'About Us']);


// ================ Controllers ================
Route::get('/users', 'App\Http\Controllers\UserController@index'); // works
Route::get('/user/{id}', [UserController::class, 'show']); // works

// ================ Redirect ================
Route::redirect('/here', '/home');


// ================ Parameters: {required} and {optional?} ================
Route::get("/users/{id}/{name?}", function (Request $request, string $id, ?string $name = null) {
    return "User id is " . $id . " and name is " . $name;
});

// i visited /users so which route will be called?
Route::match(['get', 'post'], '/users', function (Request $request) {
    dd($request);
    return "This is a GET or POST request ";
    // return "This is a GET or POST request " . $request->method();
});

Route::any('/users', function (Request $request) {
    return "This Is General Request ";
    // return "This Is General Request " . $request->method();
});

// ================ Dependency Injection (DI) ================
Route::get('/Users/{user}', function (User $user) {
    dd($user->email);
});

// ================ Route Regular Exp ================
// ===================================================
//                        BAD
// Route::get('/userRgx/{id}', function ($id) {
//     return "User id STRING is " . $id;
// })->where('id', '[a-z]+');

// Route::get('/userRgx/{id}', function ($id) {
//     return "User id NUMBER is " . $id;
// })->where('id', '[0-9]+');

/**
 * Always use last route when we use same URI
 */

// ================ Route Regular Exp ================
// ===================================================
//                        Best

Route::get('/userRgx/{id}', function ($id) {
    return "User id NUMBER is " . $id;
})->where('id', '[0-9]+');

Route::get('/userRgx/{name}', function ($name) {
    return "User id STRING is " . $name;
})->where('name', '[a-z]+');

// now route parameter not the same, if i entered `numbers` it will go to first route
// if i entered `string` it will go to second route

// ================ Route Named ================
// ===================================================
Route::get('/userRgx/{id}', function ($id) {
    return "User id NUMBER is " . $id;
})->name('userRgx'); // should be unique