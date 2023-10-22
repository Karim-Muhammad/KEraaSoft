<?php


if (isset($router))
    return;

require_once base_path("Core/Router.php");

static $router = new Router();

// ======================== General ==============================
$router->get('/', 'PageController@home', "Home")->only('auth');
$router->get('/about', 'PageController@about', "About")->only('admin');
$router->get('/error', 'PageController@error', "Error");

// ======================== Products ==============================
$router->get('/products', 'ProductController@index', "Products");
$router->get('/product/', 'HomeController@show', "Product")->only('auth');

// ========================== CRUD ==========================
$router->get('/admin/products', 'ProductController@AdminIndex', "Products")->only('admin');

$router->get('/admin/products/create', 'ProductController@create', "Create Product")->only('admin');
$router->post('/admin/products', 'ProductController@store')->only('admin');

$router->get('/admin/product/edit', 'ProductController@edit', "Edit Product")->only('admin');
$router->patch('/admin/product/', 'ProductController@update')->only('admin');

$router->delete('/admin/product/', 'ProductController@destroy')->only('admin');

// ======================== Categories ==========================
$router->get('/admin/categories', 'CategoryController@index', "Categories")->only('admin');
$router->post('/admin/categories', 'CategoryController@store')->only('admin');

$router->get('/admin/category', 'CategoryController@show', "Category")->only('admin');
$router->delete('/admin/category', 'CategoryController@delete')->only('admin');
// =========================== CRUD ==========================
$router->get('/admin/categories/create', 'CategoryController@create', "Create Category")->only('admin');
$router->post('/admin/categories', 'CategoryController@store')->only('admin');

$router->get('/admin/category/edit', 'CategoryController@edit', "Edit Category")->only('admin');
$router->patch('/admin/category/', 'CategoryController@update')->only('admin');

$router->delete('/admin/category/', 'CategoryController@destroy')->only('admin');

// ======================== Cart ================================
$router->get('/cart', 'CartController@index', "Cart")->only('auth');
$router->post('/cart', 'CartController@store')->only('auth');

// ======================== Admin ===============================
$router->get("/admin", "AdminController@index", "Admin Dashboard")->only('admin');

// ======================== Auth ================================
$router->get("/auth/login", "AuthController@login", "Login")->only('guest');
$router->post("/auth/login", "AuthController@handleLogin")->only('guest');

$router->get("/auth/register", "AuthController@register", "Register")->only('guest');
$router->post("/auth/register", "AuthController@handleRegister")->only('guest');

$router->get("/auth/logout", "AuthController@logout", "Logout")->only('auth');