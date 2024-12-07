<?php

session_start();
include('conexion.php');

$codeuno = $_POST['cuno'];
$codedos = $_POST['cdos'];
$codetres = $_POST['ctres'];
$codecuatro = $_POST['ccuatro'];

$usuario = $_SESSION['cliente'];

$numero = $codeuno . $codedos . $codetres . $codecuatro;

$data = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

while ($consulta = mysqli_fetch_array($data)) {
    $verif = $consulta['autentificacion'];
}

if ($verif == $numero) {
    $change = mysqli_query($conexion, "UPDATE usuarios SET conectado = 'Si' WHERE usuario = '$usuario'");
    echo '
    <script>
    alert("Código verificado");
    location.href = "../Nav/usuario.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("Acceso denegado: código incorrecto");
    location.href = "cerrar_sesion.php";
    </script>
    ';
}

mysqli_close($conexion);

?>
