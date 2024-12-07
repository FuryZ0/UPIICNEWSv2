<?php
include("conexion.php");

$evento = $_POST['id_elimev'];

$data = mysqli_query($conexion, "SELECT * FROM eventos WHERE id_evento = '$evento'");

$eliminar = "DELETE FROM eventos WHERE id_evento = '$evento'";
$resultado = mysqli_query($conexion, $eliminar);

echo '
    <script>
    alert("El evento se borró con éxito");
    </script>
';

mysqli_close($conexion);
?>

