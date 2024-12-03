<?php

include('conexion.php');

$usuario = $_POST['usuario'];
$contra = $_POST['pass'];

$resultado = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contra'");

$fila = mysqli_num_rows($resultado);

if ($fila > 0) {
    session_start();
    $_SESSION['cliente'] = $usuario;
    header("location:../Nav/usuario.php");
} else {
    echo '
    <script>
    alert("El correo o la contraseña son invalidos o no existen");
    location.href = "../Nav/InicioSesion.php";
    </script>
    ';
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>