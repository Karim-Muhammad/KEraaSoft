<?php


$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS USERS (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(30) NOT NULL,
        `email` VARCHAR(30) NOT NULL UNIQUE,
        `password` VARCHAR(100) NOT NULL,
        `admin` ENUM('0', '1') DEFAULT '0' NOT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        -- `cart_id` INT(6) UNSIGNED NULL,
        -- FOREIGN KEY (cart_id) REFERENCES CARTS(id)
    );
SQL;

$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS CATEGORIES (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(30) NOT NULL,
        `slug` VARCHAR(30) NOT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
SQL;

$database->migrations($sql)->migrate();

$sql = <<<SQL

    CREATE TABLE IF NOT EXISTS PRODUCTS (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(30) NOT NULL,
        `slug` VARCHAR(30) NOT NULL,
        `description` TEXT NOT NULL,
        `price` decimal(10, 2) NOT NULL,
        `image` VARCHAR(150) NOT NULL,
        `category_id` INT(6) UNSIGNED NOT NULL,
        `user_id` INT(6) UNSIGNED NULL,
        FOREIGN KEY (user_id) REFERENCES USERS(id)
    );
SQL;
$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS CATEGORIES_PRODUCTS (
        `category_id` INT(6) UNSIGNED NOT NULL,
        `product_id` INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (category_id) REFERENCES CATEGORIES(id),
        FOREIGN KEY (product_id) REFERENCES PRODUCTS(id),
        index (category_id, product_id)
    );
SQL;
$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS CARTS (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT(6) UNSIGNED NULL,
        FOREIGN KEY (user_id) REFERENCES USERS(id)
    );
SQL;
$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS CART_ITEM (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `product_id` INT(6) UNSIGNED NOT NULL,
        `quantity` INT(6) UNSIGNED NOT NULL DEFAULT 1,
        `cart_id` INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (product_id) REFERENCES PRODUCTS(id),
        FOREIGN KEY (cart_id) REFERENCES CARTS(id)
    );
SQL;
$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS ORDERS (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT(6) UNSIGNED NOT NULL,
        `cart_id` INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (user_id) REFERENCES USERS(id),
        FOREIGN KEY (cart_id) REFERENCES CARTS(id)
    );
SQL;
$database->migrations($sql)->migrate();

$sql = <<<SQL
    CREATE TABLE IF NOT EXISTS ORDER_ITEM (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id INT(6) UNSIGNED NOT NULL,
        quantity INT(6) UNSIGNED NOT NULL DEFAULT 1,
        order_id INT(6) UNSIGNED NOT NULL,
        FOREIGN KEY (product_id) REFERENCES PRODUCTS(id),
        FOREIGN KEY (order_id) REFERENCES ORDERS(id)
    );
SQL;
$database->migrations($sql)->migrate();
