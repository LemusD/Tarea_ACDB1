<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nro_doc = $_POST['ident'];
    $password = $_POST['password'];
    $tipo_per = $_POST['tipo_persona'];
    // Llama a la función
    login($nro_doc, $tipo_per);
}

function login($nro_doc, $tipo)
{
    require_once "conexion.php";
    if ($tipo == 1) {
        $stmt = $conn->prepare("SELECT * FROM estudiantes WHERE nro_doc = ? AND password_p = ?");
        $stmt->bind_param("ss", $nro_doc, $_POST['password']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["nombre"] = $row['primer_nombre'];
                $_SESSION["apellido"] = $row['primer_apellido'];
            }
            header("location: /tarea_acdb1/logExito.php");
        } else {
            header("location: /tarea_acdb1/logFalla.html");
        }
    } else {
        $stmt = $conn->prepare("SELECT * FROM docentes WHERE nro_doc = ? AND password_p = ?");
        $stmt->bind_param("ss", $nro_doc, $_POST['password']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["nombre"] = $row['primer_nombre'];
                $_SESSION["apellido"] = $row['primer_apellido'];
            }
            header("location: /tarea_acdb1/logExito.php");
        } else {
            header("location: /tarea_acdb1/logFalla.html");
        }
    }
}