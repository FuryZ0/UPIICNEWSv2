<?php

include ("conexion.php");

$usuario = $_POST['adm_usuario'];
$correo = $_POST['adm_correo'];
$contra = $_POST['adm_contra'];
$rol = $_POST['adm_rol'];

$insertar = mysqli_query($conexion, "INSERT INTO usuarios(usuario, email, contrasena, rol, conectado)
VALUES ('$usuario','$correo','$contra',$rol,'Si')");

$resultado = mysqli_query($conexion,$insertar);

?>
