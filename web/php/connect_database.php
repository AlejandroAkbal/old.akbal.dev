<?php

$hostname = getenv('DB_HOST');
$database = getenv('DB_DATABASE');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');

if (!$hostname || !$database || !$username || !$password) {
    die("No database assigned!");
}

$dbconnect = mysqli_connect($hostname, $username, $password, $database);

if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}

return $dbconnect;
