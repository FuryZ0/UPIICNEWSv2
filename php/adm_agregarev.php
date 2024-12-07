<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php
include('conexion.php');

$nombre = $_POST['adm_tit'];
$descrip = $_POST['adm_desc'];
$ubi = $_POST['adm_ubi'];
$categ = $_POST['adm_tag'];
date('Y-m-d', strtotime($fecha = $_POST['adm_dia']));
$hinicio = $_POST['adm_horai'];
$hfin = $_POST['adm_horaf'];
$redone = $_POST['adm_red1'];
$linkone = $_POST['adm_link1'];
$redtwo = $_POST['adm_red2'];
$linktwo = $_POST['adm_link2'];
$img = $_FILES['adm_img']['name'];
$archivo = $_FILES['adm_img']['tmp_name'];

$ruta = "../img/" . $img;
$rutabd = "img/" . $img;

move_uploaded_file($archivo,$ruta);

$insertar = mysqli_query($conexion, "INSERT INTO eventos(nombreev, descripcionev, ubicacionev, tagsev, diaev, horainicioev, horafinev, redsocial1ev, linkred1, redsocial2ev, linkred2, imgeve)
VALUES ('$nombre','$descrip','$ubi','$categ','$fecha','$hinicio','$hfin','$redone','$linkone','$redtwo','$linktwo','$rutabd')");

$resultado = mysqli_query($conexion, $insertar);

mysqli_close($conexion);

?>
