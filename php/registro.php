<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php
include('conexion.php');

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$pass = $_POST['contra'];

$verificacion = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

$r = mysqli_num_rows($verificacion);

if ($r > 0) {
    echo '
    <script>
    alert("El nombre de usuario ya fue registrado, intente de nuevo");
    location.href = "../nav/RegistroUs.php";
    </script>
    ';
    exit;
}

$insertar = mysqli_query($conexion, "INSERT INTO usuarios(usuario, email, contrasena, rol)
VALUES ('$usuario','$email','$pass','0')");

if ($insertar) {
    echo '
    <script>
    alert("Registro exitoso");
    location.href = "../nav/InicioSesion.php";
    </script>
    ';
    exit;
}

mysqli_close($conexion);

?>