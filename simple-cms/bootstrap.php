<?php

if ($executed ?? false)
    return;

static $executed = false;

session_start();

// ========================= PRE-Processor Functions ======================

require_once $BASE_URL . 'helpers/functions.php';

// ============================ DATABASE ==================================
// Setup Database & Migrations
require_once base_path("database/Database.php");
require_once base_path("database/migrations.php");
require_once base_path("Core/Session.php");

// test
// require_once base_path('Models/Users.php');
// Users::findById('dlksld');

// ============================= ROUTES ===========================
// Setup Routes
require_once base_path("routes/web.php");

$executed = true;

// ============================= END ==============================