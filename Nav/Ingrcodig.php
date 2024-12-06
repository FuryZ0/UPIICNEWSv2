<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPIICNEWS</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<body>
<?php
include("../Nav/verifsesion.php");
?>
<div class="imagen_fondo">
    <img src="../img/Manoarriba.png" alt="fondo">
</div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>
</html>