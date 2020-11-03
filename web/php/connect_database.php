<?php

$url = getenv('DATABASE_URL');

if (!$url) {
    die("No database assigned!");
}

$components = parse_url($url);

if ($components) {
    $hostname = $components['host'];
    $username = $components['user'];
    $password = $components['pass'];
    $database = substr($components['path'], 1);
    $port = $components['port'];
}

$dbconnect = mysqli_connect($hostname, $username, $password, $database);

if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}

return $dbconnect;
