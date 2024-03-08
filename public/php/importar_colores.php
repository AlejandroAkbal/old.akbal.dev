<?php

$dbconnect = require('connect_database.php');

$sql = "SELECT color FROM temas ORDER BY date DESC LIMIT 100;";

$query = mysqli_query($dbconnect, $sql);

if (!$query) {
    die(mysqli_error($dbconnect));
}

if (!(mysqli_num_rows($query) > 0)) {
    die("No records matching your query were found");
}

while ($row = mysqli_fetch_array($query)) {
    echo
        "<div class='colores' style='background-color: {$row['color']};'>
            <div class='overlay'>
                <div class='texto'>
                    <h2>{$row['color']} </h2>
                    <button onclick=\"aplicarUnColor('{$row['color']}')\">Aplicar este color</button>
                </div>
            </div>
        </div>";
}
