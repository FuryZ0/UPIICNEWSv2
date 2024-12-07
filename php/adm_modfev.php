<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php

include("conexion.php");

$id = $_POST['ide_'];
$nombre = $_POST['tit_'];
$descrip = $_POST['desc_'];
$ubi = $_POST['ubi_'];
$categ = $_POST['tag_'];
date('Y-m-d', strtotime($fecha = $_POST['dia_']));
$hinicio = $_POST['horai_'];
$hfin = $_POST['horaf_'];
$redone = $_POST['red1_'];
$linkone = $_POST['link1_'];
$redtwo = $_POST['red2_'];
$linktwo = $_POST['link2_'];
$img = $_FILES['img_']['name'];
$archivo = $_FILES['img_']['tmp_name'];

$ruta = "../img/" . $img;
$rutabd = "img/" . $img;

move_uploaded_file($archivo,$ruta);

$cambiar = "UPDATE eventos SET nombreev = '$nombre', descripcionev = '$descrip', ubicacionev = '$ubi',
                   tagsev = '$categ', diaev = '$fecha', horainicioev = '$hinicio', horafinev = '$hfin', redsocial1ev = '$redone', linkred1 = '$linkone', redsocial2ev = '$redtwo', 
                   linkred2 = '$linktwo', imgeve = '$rutabd' WHERE id_evento = $id";


$resultado = mysqli_query($conexion, $cambiar);

mysqli_close($conexion);

?>