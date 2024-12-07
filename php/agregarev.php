<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php
include('conexion.php');

$nombre = $_POST['nombreev'];
$categ = $_POST['categoriaev'];
$ubi = $_POST['ubiev'];
$img = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];
$descrip = $_POST['descripev'];
date('Y-m-d', strtotime($fecha = $_POST['diaev']));
$hinicio = $_POST['horain'];
$hfin = $_POST['horafin'];
$redone = $_POST['red1'];
$linkone = $_POST['linkred1'];
$redtwo = $_POST['red2'];
$linktwo = $_POST['linkred2'];

$ruta = "../img/" . $img;
$rutabd = "img/" . $img;

move_uploaded_file($archivo,$ruta);

$insertar = mysqli_query($conexion, "INSERT INTO eventos(nombreev, descripcionev, ubicacionev, tagsev, diaev, horainicioev, horafinev, redsocial1ev, linkred1, redsocial2ev, linkred2, imgeve)
VALUES ('$nombre','$descrip','$ubi','$categ','$fecha','$hinicio','$hfin','$redone','$linkone','$redtwo','$linktwo','$rutabd')");

if ($insertar) {
    echo '
    <script>
    alert("Evento registrado exitosamente");
    location.href = "../Nav/index.php";
    </script>
    ';
    exit;
} else {
    echo '
    <script>
    alert("Error en el registro");
    location.href = "../Nav/registevent.php";
    </script>
    ';
}

mysqli_close($conexion);

?>
