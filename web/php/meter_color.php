<?php

// --- Helpers
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


// --- Verification
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Solo peticiones POST");
}

if (empty($_POST["colorActual"])) {
    die("Es necesario que envies algun tema");
}

$colorActual = test_input($_POST["colorActual"]);

if (!preg_match('/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/', $colorActual)) {
    die("Es necesario que envies un tema valido!");
}


// --- Database connection
$dbconnect = require('connect_database.php');

$sql = "INSERT INTO temas(color) VALUES ('{$colorActual}')";

$query = mysqli_query($dbconnect, $sql);

if (!$query) {
    die(mysqli_error($dbconnect));
}


// --- Results
echo
    "
    <h1> Datos enviados </h1>
    <h2> Color enviado: {$colorActual} </h2>
    <h3> 
        <a href='/webpages/temas.php'/> Volver </a>
    </h3>
    ";
