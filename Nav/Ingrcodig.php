<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<?php
include("../php/sesion_noinic.php");
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

<div class="d-flex justify-content-center align-items-center container_c">
    <div class="card py-5 px-3">
        <h5 class="m-0 text-center">Código de autentificación</h5>
        <span class="cont_c">Por favor ingrese su código proporcionado</span>
        <form action="../php/verifcodigo.php" method="POST">
            <div class="d-flex flex-row mt-5">
                <input type="text" class="form-control" maxlength="1" required autofocus name="cuno" id="cdos">
                <input type="text" class="form-control" maxlength="1" required autofocus name="cdos" id="cdos">
                <input type="text" class="form-control" maxlength="1" required autofocus name="ctres" id="ctres">
                <input type="text" class="form-control" maxlength="1" required autofocus name="ccuatro" id="ccuatro">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
</body>
</body>
</html>