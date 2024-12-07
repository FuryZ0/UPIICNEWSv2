<?php

include('conexion.php');

$usuario = $_POST['usuario'];
$contra = $_POST['pass'];

$resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contra'");


$fila = mysqli_num_rows($resultado);

if ($fila > 0) {
    session_start();
    $_SESSION['cliente'] = $usuario;

    while ($consulta = mysqli_fetch_array($resultado)) {
        $verif = $consulta['autentificacion'];
        $user = $consulta['usuario'];
        $conect = $consulta['conectado'];
    }

    if ($verif == 0) {
        $change = mysqli_query($conexion, "UPDATE usuarios SET conectado = 'No' WHERE usuario = '$user'");
        header("location:../Nav/generator.php");
    } else if ($conect == "Si") {
        header("location:../Nav/index.php");
    } else {
        $change = mysqli_query($conexion, "UPDATE usuarios SET conectado = 'No' WHERE usuario = '$user'");
        header("location:../Nav/Ingrcodig.php");
    }
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