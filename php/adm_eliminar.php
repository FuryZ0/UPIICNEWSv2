<?php

include ("conexion.php");

$id = $_POST['id_elim'];
$usuario = $_POST['usuario_elim'];

$borrar = mysqli_query"DELETE FROM usuarios WHERE id_usuario = $id AND usuario = '$usuario'";

$resultado = mysqli_query($conexion,$borrar);

?>
