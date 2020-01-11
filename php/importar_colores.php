<?php
            
    $servername = "10.135.191.214";
    $username = "old_akbal_user";
    $password = "VEAIEMFSh5sJRjskgCyI8M01fgDy2WWZ";
    $database = "old_akbal_db";

    // CREATE USER 'temas-user'@'localhost' IDENTIFIED BY 'Contraseña1234';

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if($link === false){
        echo "<h1> ERROR: Could not connect. " . mysqli_connect_error() . "</h1>";
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Attempt select query execution
    $sql = "SELECT color FROM temas ORDER BY date DESC LIMIT 300";
    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<div class='colores' style='background-color:" . $row['color'] . ";'>";
                    echo "<div class='overlay'>";
                        echo "<div class='texto'>";
                            echo "<h2>" . $row['color'] .  "</h2>";
                            echo '<button onclick="aplicarUnColor(\'' . $row['color'] .'\')">Aplicar este color</button>';
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

            }
        
            // Free result set
            mysqli_free_result($result);

        } else {
            echo "No records matching your query were found.";
        }

    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
?>