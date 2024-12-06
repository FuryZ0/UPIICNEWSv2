<?php

include('conexion.php');
session_start();

$session_i = $_SESSION['cliente'];

$datos = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$session_i'");

while ($consulta = mysqli_fetch_array($datos)) {
    $rol = $consulta['rol'];
}

if($rol == 0) {
    include("admin.php");
} else if ($rol == 1) {
    include("editor.php");
} else if ($rol == 2) {
    include("admin.php");
}
?>


