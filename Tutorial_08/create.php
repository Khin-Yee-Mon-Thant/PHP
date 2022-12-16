<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$connection = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
} else {
    echo "Database Connection Successful";
}

// Create database
$sql = "CREATE DATABASE batch_06";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE `batch_06`.`posts` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `title` VARCHAR(255) NOT NULL,
        `content` TEXT NULL,
        `is_published` TINYINT NOT NULL,
        `created_datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`))";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
