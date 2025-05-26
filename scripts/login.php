<?php

use Dom\Mysql;

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nro_doc = $_POST['ident'];
    $password = $_POST["password"];
    $tipo_per = $_POST['tipo_persona'];
    // Llama a la función
    login($nro_doc, $tipo_per, $password);
}

function login($nro_doc, $tipo, $password)
{
    require_once "conexion.php";
    if ($tipo == 1) {
        $queryusuario = mysqli_query($conn, "select * from estudiante WHERE nro_doc = '" . $nro_doc . "'");
        $nr = mysqli_num_rows($queryusuario);
        $datosusuario = mysqli_fetch_array($queryusuario);
        if (($nr == 1) && (password_verify($password, $datosusuario['password']))) {
            $_SESSION["nombre"] = $datosusuario['nombre'];
            $_SESSION["apellido"] = $datosusuario['apellido'];
            $_SESSION["idEstudiante"] = $datosusuario['idEstudiante'];
            $_SESSION["tipo_per"] = "estudiante";
            header("location: /tarea_acdb1/logExito.php");
            mysqli_close($conn);
        } else {
            header("location: /tarea_acdb1/logFalla.html");
        }
    } else {
        $queryusuario = mysqli_query($conn, "select * from docente WHERE nro_doc = '" . $nro_doc . "'");
        $nr = mysqli_num_rows($queryusuario);
        $datosusuario = mysqli_fetch_array($queryusuario);
        if (($nr == 1) && (password_verify($password, $datosusuario['password']))) {
            $_SESSION["nombre"] = $datosusuario['nombre'];
            $_SESSION["apellido"] = $datosusuario['apellido'];
            $_SESSION["tipo_per"] = "docente";
            header("location: /tarea_acdb1/logExito.php");
            mysqli_close($conn);
        } else {
            header("location: /tarea_acdb1/logFalla.html");
        }
    }
}
