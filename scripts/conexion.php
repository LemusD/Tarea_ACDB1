<?php
    $servername = "localhost";
    $database = "inscripcion";
    $username = "suscriptor";
    $password_con = "Segurid@d25052025";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password_con, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>