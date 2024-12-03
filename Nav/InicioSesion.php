<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleicon.css">
</head>
<body>
<?php
include ("verifsesion.php");
?>
<form action="../php/login.php" method="POST" class="formulario_ingr" id="inicios_for">
  <h2 class="info_h2">Acceder</h2>
  <input type="text" class="formula" required placeholder="&#128113; Usuario" name="usuario" maxlength="10">
  <input type="password" class="formula" required placeholder="&#128272; Contraseña" name="pass" maxlength="20">
  <input type="submit" class="enviar">
    <p class="info_h2">¿No tienes aún una cuenta? <a href="RegistroUs.php" class="titmenu">Haz clic aquí para registrarte</a></p>
</form>
</body>
</html>