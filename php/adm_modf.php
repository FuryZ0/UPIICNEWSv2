<?php

include ("conexion.php");

$id = $_POST['id_'];
$usuario = $_POST['usuario_'];
$correo = $_POST['email_'];
$contra = $_POST['contra_'];
$rol = $_POST['rol_'];

$cambiar = "UPDATE usuarios SET usuario = '$usuario', email = '$correo', contrasena = '$contra', rol = $rol WHERE id_usuario = $id";

$resultado = mysqli_query($conexion, $cambiar);

mysqli_close($conexion);

?>