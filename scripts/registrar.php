<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nro_doc = $_POST['nro_doc'];
    $tipo_per = $_POST['tipo_persona'];
    $correo = 'daniel@gmail.com';
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    // Llama a la función
    ingresarPersona($nombre, $apellido, $nro_doc, $tipo_per,$correo,$password);
}

function ingresarPersona($nombre, $apellido, $nro_doc, $tipo, $correo ,$password){
    require_once "conexion.php";
    if ($tipo == 1) {
        $sql1 = "insert into estudiante (idEstudiante, nombre, apellido, nro_doc, correo, password) values ('','".$nombre."','".$apellido."','".$nro_doc."','".$correo."','".$password."')";
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
        $sql2 = "insert into docente (idDocente, nombre, apellido, nro_doc, correo, password) values ('','".$nombre."','".$apellido."','".$nro_doc."','".$correo."','".$password."')";
        try {
            if (mysqli_query($conn, $sql2)) {
                header("location: /tarea_acdb1/regExito.html");
                mysqli_close($conn);
            }
        } catch (mysqli_sql_exception $e) {
            header("location: /tarea_acdb1/regError.html");
            mysqli_close($conn);
        }
    }
}
