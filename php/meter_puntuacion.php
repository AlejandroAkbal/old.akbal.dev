<html lang="es">

    <head>

        <!-- ----------------- Defaults ----------------- -->

        <title>Introduccion de datos a la base de datos</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- ----------------- Google's ----------------- -->

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <meta name="author" content="Alejandro Akbal">

        <!-- ----------------- CSS y JS ----------------- -->

        <link href="/css/clicker.css" type="text/css" rel="stylesheet" />

    </head>
    
    <body>

            <div class="nav">

                <h1>Akbal's</h1>
                <a href="/">Inicio</a>
                <a href="/webpages/clicker.php" >Volver al clicker</a>

            </div>

            <div class="php">
                <br> <br>
                <!-- ----------- INICIO PHP ----------- -->
        
                <?php
                



$servername = "10.135.191.214";
$username = "old_akbal_user";
$password = "VEAIEMFSh5sJRjskgCyI8M01fgDy2WWZ";
$database = "old_akbal_db";



// Create connection
$link = mysqli_connect($servername, $username, $password, $database);
// Check connection
if($link === false){
    echo "<h1> ERROR: Could not connect. " . mysqli_connect_error() . "</h1>";
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// ---------- Coger los valores pasados ---------- 

$nameErr = $numberErr = "";

// CAMBIAR SI O SI PARA EXTRAR DE JAVASCRIPT LOS CLICKS Y BUSCAR COMO COJONES SE SACA UN ID AUTOMATICO

$meterid = rand(100, 10000);



// ---------- Sanizar el input ---------- 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//  ---------- Nombre  
    
  if (empty($_POST["meterusuario"])) {
    $nameErr = "Es necesario que rellenes la casilla de tu nombre";
    goto end;
      
  } else {
      
    $meterusuario = test_input($_POST["meterusuario"]);
      
    if (!preg_match("/^[a-zA-Z ]*$/",$meterusuario)) {
      $nameErr = "Solo se pueden introducir letras y espacios en el nombre"; 
      goto end;
 }
  }
    
    //  ---------- Puntuacion 
    
    if (empty($_POST["meterpuntuacion"])) {
    $numberErr = "Es necesario que envies algun numero en la puntuacion";
    goto end;
      
  } else {
      
    $meterpuntuacion = test_input($_POST["meterpuntuacion"]);
      
        
    if (!is_numeric($meterpuntuacion)) {
      $numberErr = "Solo se pueden introducir numeros en la puntuacion"; 
      goto end;
 }
  }

}


// ---------- Funcion que saniza ----------


    
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 // ---------- Attempt select query execution ---------- 
$sql = "INSERT INTO puntuacion(id, usuario, puntuacion) VALUES('$meterid', '$meterusuario', '$meterpuntuacion')";
if($result = mysqli_query($link, $sql)){
    
   echo "Los datos han sido enviados; $result";
        
    } else {
        echo "ERROR: Could not be able to execute $sql. " . mysqli_error($link);
        
    }
 
// ---------- Close connection ---------- 
mysqli_close($link);



end:
echo "<br> <br>";
echo $nameErr;
echo "<br> <br>";
echo $numberErr;




?>
                
<!-- ----------- FIN PHP ----------- -->
        
            </div>
        
    </body>

</html>