<?php


$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS users (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `image` VARCHAR(150) DEFAULT 'https://via.placeholder.com/150' NOT NULL,
        `name` VARCHAR(30) NOT NULL,
        `email` VARCHAR(30) NOT NULL UNIQUE,
        `password` VARCHAR(100) NOT NULL,
        `phone` VARCHAR(30) NOT NULL,
        `role` ENUM('admin', 'doctor', 'user') DEFAULT 'user' NOT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        -- `cart_id` INT(6) UNSIGNED NULL,
        -- FOREIGN KEY (cart_id) REFERENCES CARTS(id)
    );
SQL;

$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS majors (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(30) NOT NULL,
        `description` TEXT NOT NULL,
        `image` VARCHAR(150) NOT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
SQL;

$database->migrations($sql)->migrate();

$sql = <<<SQL

    CREATE TABLE IF NOT EXISTS doctors (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `bio` TEXT NOT NULL,
        `user_id` INT(6) UNSIGNED NOT NULL,
        `major_id`  INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (major_id) REFERENCES majors(id) ON DELETE CASCADE,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );
SQL;

$database->migrations($sql)->migrate();

$sql = <<<SQL

    CREATE TABLE IF NOT EXISTS patients (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT(6) UNSIGNED NOT NULL,
        `bio` TEXT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );
SQL;

$database->migrations($sql)->migrate();


$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS booking (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `patient_id` INT(6) UNSIGNED NULL,
        `doctor_id` INT(6) UNSIGNED NULL,
        `date` DATE NOT NULL,
        `time` TIME NOT NULL,
        `status` ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending' NOT NULL,
        FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
        FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
    );
SQL;
$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS contact (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT(6) UNSIGNED NOT NULL,
        `doctor_id` INT(6) UNSIGNED NOT NULL DEFAULT 1,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (doctor_id) REFERENCES doctors(id)
    );
SQL;
$database->migrations($sql)->migrate();