<?php
// TODO: Add automatic id key 

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

if (empty($_POST["meterusuario"])) {
  die("Es necesario que rellenes la casilla de tu nombre");
}

$meterusuario = test_input($_POST["meterusuario"]);
if (!preg_match("/^[a-zA-Z ]*$/", $meterusuario)) {
  die("Solo se pueden introducir letras y espacios en el nombre!");
}

if (empty($_POST["meterpuntuacion"])) {
  die("Es necesario que envies algun numero en la puntuacion");
}

$meterpuntuacion = test_input($_POST["meterpuntuacion"]);
if (!is_numeric($meterpuntuacion)) {
  die("Solo se pueden introducir numeros en la puntuacion");
}


// --- Database connection
$dbconnect = require('connect_database.php');

$sql = "INSERT INTO puntuacion(id, usuario, puntuacion) VALUES('$meterusuario', '$meterpuntuacion')";

$query = mysqli_query($dbconnect, $sql);

if (!$query) {
  die(mysqli_error($dbconnect));
}


// --- Results
echo
  "
    <h1> Datos enviados </h1>
    <h2> Usuario enviado: " . $meterusuario . " </h2>
    <h2> Puntuacion enviada: " . $meterpuntuacion . " </h2>
    <h3> 
        <a href='/clicker.php'/> Volver </a>
    </h3>
    ";
