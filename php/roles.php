<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php

include('conexion.php');
session_start();

$session_i = $_SESSION['cliente'];

$datos = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$session_i'");

while ($consulta = mysqli_fetch_array($datos)) {
    $rol = $consulta['rol'];
}

if ($rol == 0) {
    echo '
    <script>
    alert("No tienes acceso a esta página");
    location.href = "../Nav/index.php";
    </script>
    ';
    die();
} else if ($rol == 1) {
    echo '
    <script>
    alert("No tienes acceso a esta página");
    location.href = "../Nav/index.php";
    </script>
    ';
    die();
}
?>


