<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCurso = $_POST['Curso'];
    date_default_timezone_set('America/New_York');
    $fechahora = date("y-m-d H:i:s");
    // Llama a la función
    inscribircurso($idCurso, $fechahora);
}

function inscribircurso($idCurso, $fechahora)
{
    require_once "conexion.php";
    // echo "<h1>".$_SESSION["idEstudiante"],$idCurso."</h1>";
    $queryconsulta = mysqli_query($conn, "select * from inscripcion_curso WHERE idEstudiante = '" . $_SESSION["idEstudiante"] . "' and idCurso = '" . $idCurso . "'");
    $nr = mysqli_num_rows($queryconsulta);
    if (($nr == 0)) {
        $sql1 = "insert into inscripcion_curso (idInscripcion, fch_inscripcion, idEstudiante, idCurso) values('','" . $fechahora . "','" . $_SESSION["idEstudiante"] . "','" . $idCurso . "')";
        try {
            if (mysqli_query($conn, $sql1)) {
                header("location: /tarea_acdb1/regExito.html");
                mysqli_close($conn);
            }
        } catch (mysqli_sql_exception $e) {
            header("location: /tarea_acdb1/regError.html");
            mysqli_close($conn);
        }
    } else {
        header("location: /tarea_acdb1/regErrorInsc.html");
            mysqli_close($conn);
    }
}
