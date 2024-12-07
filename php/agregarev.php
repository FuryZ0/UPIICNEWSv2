<?php
include('conexion.php');

$nombre = $_POST['nombreev'];
$categ = $_POST['categoriaev'];
$ubi = $_POST['ubiev'];
$img = $_POST['imagen'];
$descrip = $_POST['descripev'];
date('Y-m-d', strtotime($fecha = $_POST['diaev']));
$hinicio = $_POST['horain'];
$hfin = $_POST['horafin'];
$redone = $_POST['red1'];
$linkone = $_POST['linkred1'];
$redtwo = $_POST['red2'];
$linktwo = $_POST['linkred2'];


$insertar = mysqli_query($conexion, "INSERT INTO eventos(nombreev, descripcionev, ubicacionev, tagsev, diaev, horainicioev, horafinev, redsocial1ev, linkred1, redsocial2ev, linkred2)
VALUES ('$nombre','$descrip','$ubi','$categ','$fecha','$hinicio','$hfin','$redone','$linkone','$redtwo','$linktwo')");

if ($insertar) {
    echo '
    <script>
    alert("Evento registrado exitosamente");
    location.href = "../Nav/index.php";
    </script>
    ';
    exit;
}

mysqli_close($conexion);

?>
