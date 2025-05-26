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
            <div class="header_usuario">
                <span>Bienvenido/a, <?= $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?></span>
                <a href="index.html">Cerrar Sesión</a>
            </div>
            <div class="menu_usuario">
                <div class="opciones_menu">
                    <button><img src="icons/inscripcion.svg" alt="" ref></button>
                    <a href="inscripcion.php">Inscribirse</a>
                </div>
                <div class="opciones_menu">
                    <button><img src="icons/cursos.svg" alt=""></button>
                    <a href="inscrito.php">Ver cursos inscritos</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>