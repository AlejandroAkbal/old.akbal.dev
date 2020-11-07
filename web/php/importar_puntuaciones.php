<?php


$dbconnect = require('connect_database.php');

$sql = "SELECT * FROM puntuacion ORDER BY puntuacion DESC LIMIT 15;";

$query = mysqli_query($dbconnect, $sql);

if (!$query) {
    die(mysqli_error($dbconnect));
}

if (!(mysqli_num_rows($query) > 0)) {
    die("No records matching your query were found");
}

echo
    "<table>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Puntuacion</th>
        </tr>";

while ($row = mysqli_fetch_array($query)) {
    echo
        "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['usuario'] . "</td>
            <td>" . $row['puntuacion'] . "</td>
        </tr>";
}

echo "</table>";
