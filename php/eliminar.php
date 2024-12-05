<?php
include ("conexion.php");
session_start();

$contra = "";

$actualc = $_POST['elimcontra'];
$nuevac = $_POST['confcontra'];

$cliente = $_SESSION['cliente'];

$data = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$cliente'");

while ($consulta = mysqli_fetch_array($data)) {
    $contra = $consulta['contrasena'];
    $user = $consulta['usuario'];
    $id = $consulta['id_usuario'];
}

if ($actualc == $nuevac) {

    if ($actualc == $contra) {

        $eliminar = "DELETE FROM usuarios WHERE id_usuario = $id AND usuario = '$user'";
        $resultado = mysqli_query($conexion,$eliminar);

        echo '
    <script>
    alert("La cuenta se ha borrado con éxito");
    location.href = "cerrar_sesion.php"
    </script>
    
    ';
    } else {
        echo '
    <script>
    alert("Contraseña incorrecta");
    location.href = "../Nav/usuario.php"
    </script>
    ';
    }
} else {
    echo '
    <script>
    alert("Las contraseñas no coinciden");
    location.href = "../Nav/usuario.php"
    </script>
    ';
}

mysqli_close($conexion);
?>
