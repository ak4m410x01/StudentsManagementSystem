<?php

// connection info
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "student_management_system";

try {
    // create pdo connection
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    // set the pdo error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}