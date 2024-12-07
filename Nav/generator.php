<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<body>
<?php
include("../Nav/verifsesion.php");
?>
<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading text-center">¡Graciar por fomar parte!</h4>
    <p>Sabemos que es la primera vez logeando...</p>
    <p class="mb-o">Tu código es: <?php echo $num ?></p>
</div>
<a class="btn btn-primary" href="usuario.php">Ir al perfil</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</body>
</html>

