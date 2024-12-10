<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<?php
include("../php/sesion_noinic.php");
$num = rand(999, 10000);
session_start();
include('../php/conexion.php');

$cliente = $_SESSION['cliente'];
$data = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$cliente'");

$change = mysqli_query($conexion, "UPDATE usuarios SET autentificacion = '$num' WHERE usuario = '$cliente'");


?>
<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPIICNEWS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
</head>
<body>
<?php
include("../Nav/verifsesion.php");
?>
<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading text-center">¡Graciar por fomar parte de UPIICNEWS!</h4>
    <p class="text-center">Sabemos que es la primera vez logeando por lo que te pedimos que verifiques tu correo electrónico con el código que te enviamos.</p>
    <p class="mb-o text-center">Tu código es: <?php echo $num ?></p>
</div>
<a class="btn btn-outline-dark d-grid gap-2 col-6 mx-auto" href="usuario.php">Ir al perfil</a>
</body>
</body>
</html>

