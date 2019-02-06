<?php
            
    $servername = "localhost";
    $username = "clicker-user";
    $password = "Contraseña1234";
    $database = "clicker-leaderboard";

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Attempt select query execution
    $sql = "SELECT * FROM puntuacion ORDER BY puntuacion DESC LIMIT 15";
    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Usuario</th>";
                    echo "<th>Puntuacion</th>";
                echo "</tr>";

            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['puntuacion'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Free result set
            mysqli_free_result($result);

        } else{
            echo "No records matching your query were found.";

        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
?>