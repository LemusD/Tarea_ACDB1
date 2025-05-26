<?php
session_start();
require_once "scripts/conexion.php";
$queryinscrito = mysqli_query($conn, "select c.nombre_curso,c.duracion_horas,concat(d.nombre,' ',d.apellido) as Docente from inscripcion_curso i
                                    inner join curso c on c.idCurso = i.idCurso
                                    inner join docente d on d.idDocente = c.idDocente
                                    where i.idEstudiante = ".$_SESSION['idEstudiante']);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Inscrito</title>
</head>

<body>
    <div class="container_inscrito">
        <div class="forms_container_inscrito">
            <div class="header_usuario">
                <span>Bienvenido/a, <?= $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?></span>
                <a href="index.html">Cerrar Sesión</a>
                <a href="logExito.php">Home</a>
            </div>
            <div class="form_inscrito">
                <form action="scripts/inscribir.php" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del curso</th>
                                <th>Duración del curso (horas)</th>
                                <th>Docente</th>
                            </tr>
                        </thead>
                        <?php
                        while ($rs = mysqli_fetch_array($queryinscrito)) {
                            echo "<tr>"
                                . "<td>" . $rs['nombre_curso'] . "</td>"
                                . "<td>" . $rs['duracion_horas'] . "</td>"
                                . "<td>" . $rs['Docente'] . "</td>"
                                . "<tr>";
                        }
                        ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>