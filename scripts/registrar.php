<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nro_doc = $_POST['nro_doc'];
    $tipo_per = $_POST['tipo_persona'];
    // Llama a la función
    ingresarPersona($nombre, $apellido, $nro_doc, $tipo_per);
}

function ingresarPersona($nombre, $apellido, $nro_doc, $tipo){
    require_once "conexion.php";
    if ($tipo == 1) {
        $sql1 = "INSERT INTO estudiantes (`ID`, `nro_doc`, `primer_nombre`,`primer_apellido`,`password_p`) VALUES ('','$nro_doc','$nombre', '$apellido','".$_POST['password']."')";
        try {
            if (mysqli_query($conn, $sql1)) {
                header("location: /tarea_acdb1/regExito.html");
                mysqli_close($conn);
            }
        } catch (mysqli_sql_exception $e) {
            header("location: /tarea_acdb1/regError.html");
            mysqli_close($conn);
        }
    }else{
        $sql2 = "INSERT INTO docentes (`ID`, `nro_doc`, `primer_nombre`,`primer_apellido`,`password_p`) VALUES ('','$nro_doc','$nombre', '$apellido','".$_POST['password']."')";
        try {
            if (mysqli_query($conn, $sql1)) {
                header("location: /tarea_acdb1/regExito.html");
                mysqli_close($conn);
            }
        } catch (mysqli_sql_exception $e) {
            header("location: /tarea_acdb1/regError.html");
            mysqli_close($conn);
        }
    }
}
