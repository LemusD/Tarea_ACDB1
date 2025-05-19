<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Home</title>
</head>

<body>
    <div class="container_exito">
        <div class="forms_container_exito">
            <div class="mensaje_exito">
                <img src="icons/icons8-marca-de-verificación-128.svg" alt="">
                <span>Bienvenido/a, <?=$_SESSION["nombre"]." ".$_SESSION["apellido"].". Usted es un ".$_SESSION["tipo_per"];?></span>
            </div>
            <div>
                <p>(<a href="index.html">Cerrar Sesión<?= session_destroy();?></a>)</p>
            </div>
        </div>
    </div>
</body>

</html>