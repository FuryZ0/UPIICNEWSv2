<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php

include("conexion.php");

$id = $_POST['id_elim'];
$usuario = $_POST['usuario_elim'];

$borrar = "DELETE FROM usuarios WHERE id_usuario = $id AND usuario = '$usuario'";

$resultado = mysqli_query($conexion, $borrar);

?>
