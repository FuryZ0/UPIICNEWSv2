<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php

include("conexion.php");

$id = $_POST['id_elim'];
$titulo = $_POST['tit_elim'];

$borrar = "DELETE FROM eventos WHERE id_evento = $id AND nombreev = '$titulo'";

$resultado = mysqli_query($conexion, $borrar);

?>

