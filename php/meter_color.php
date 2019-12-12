<?php

$servername = "localhost";
$username = "temas-user";
$password = "Contraseña1234";
$database = "temas-database";



// Create connection
$link = mysqli_connect($servername, $username, $password, $database);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// ---------- Coger los valores pasados ---------- 

$colorErr = $numberErr = "";

// ---------- Sanizar el input ---------- 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //  ---------- Puntuacion 
    
    if (empty($_POST["colorActual"])) {
    $colorErr = "Es necesario que envies algun tema";
    goto end;
      
    } else {
      
    $colorActual = test_input($_POST["colorActual"]);
        
    if(!preg_match('/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/',$colorActual)){
        $numberErr = "Es necesario que envies un tema valido!";
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
$sql = "INSERT INTO temas(color) VALUES('$colorActual')";
if($result = mysqli_query($link, $sql)){
    
   echo "Los datos han sido enviados; $result";
        
    } else {
        echo "ERROR: " . mysqli_error($link);
        
    }
 
// ---------- Close connection ---------- 
mysqli_close($link);


// ---------- Resultado ---------- 

end:
echo $colorErr;
echo "<br> <br>";
echo $numberErr;
echo "<br> <br>";
echo "Color actual: " . $colorActual;
echo "<br> <br>";

?>

<html>

<head>

    <style>
        
        html {
            background-color: #211b29;
            color: wheat;
        }
        
    </style>

    <script type="text/javascript">
        /*      Devolver a la pagina          */

        function wait() {
            setTimeout(function() {
                window.location.href = "/temas"
            }, 5000);
        }
        wait();
    </script>
    
</head>

<body>

    <h1>En 5 segundos seras redirigido a temas</h1>

</body>

</html>
