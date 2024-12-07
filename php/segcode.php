<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php

include('conexion.php');
error_reporting(0);
session_start();

$session_i = $_SESSION['cliente'];
$data = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$session_i'");

while ($consulta = mysqli_fetch_array($data)) {
    $autf = $consulta['conectado'];
}

if ($autf == "No") {
    echo '
    <script>
    alert("Aún no has activado el código de autentificación");
    location.href = "../php/cerrar_sesion.php";
    </script>
    ';
}

?>

