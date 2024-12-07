<?php
include("../php/conexion.php");
error_reporting(0);
session_start();

$session_i = $_SESSION['cliente'];

if ($session_i == 0 || $session_i == "") {
    include("../Nav/nav.php");
} else {

    $datos = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$session_i'");

    while ($consulta = mysqli_fetch_array($datos)) {
        $rol = $consulta['rol'];
    }

    if ($rol == 0 || $rol == 1) {
        include("../Nav/nav_ses.php");
    } else if ($rol == 2) {
        include("../Nav/navadmin.php");
    }
}

?>
