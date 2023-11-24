<?php

if (session_status() === PHP_SESSION_NONE)
    session_start();

// ========================= PRE-Processor Functions ======================

require_once $BASE_URL . 'helpers/functions.php';

// ============================ DATABASE ==================================
// Setup Database & Migrations
require_once base_path("database/Database.php");
require_once base_path("database/migrations.php");
require_once base_path("Core/Session.php");


// ============================= ROUTES ===========================
// Setup Routes
require_once base_path("routes/web.php");

// ============================= END ==============================