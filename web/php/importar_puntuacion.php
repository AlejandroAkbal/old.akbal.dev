<?php
            
    $servername = "10.135.191.214";
    $username = "old_akbal_user";
    $password = "VEAIEMFSh5sJRjskgCyI8M01fgDy2WWZ";
    $database = "old_akbal_db";

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Attempt select query execution
    $sql = "SELECT * FROM puntuacion ORDER BY puntuacion DESC LIMIT 15;";
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