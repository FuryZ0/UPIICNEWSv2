<?php
include('conexion.php');
session_start();

$correo = $_POST['correo'] ?? null;
$pass = $_POST['contra'];
$newpass = $_POST['contranueva'] ?? null;
$contra = "";
$id = "";

$cliente = $_SESSION['cliente'];

$data = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$cliente'");

while ($consulta = mysqli_fetch_array($data)) {
    $contra = $consulta['contrasena'];
    $id = $consulta['id_usuario'];
}

if ($contra == $pass) {
    if($newpass == "") {
        $cambiar = "UPDATE usuarios SET email = '$correo' WHERE id_usuario = $id";

        echo '1';

        $resultado = mysqli_query($conexion, $cambiar);

        exit;
    } else {
        $cambiar = "UPDATE usuarios SET contrasena = '$newpass' WHERE id_usuario = $id";

        echo '2';

        $resultado = mysqli_query($conexion, $cambiar);

        exit;
    }
} else {
    echo '3';
}

mysqli_close($conexion);

?>