<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<?php
include("../php/sesion_iniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="../css/style.css">
        <style>
            .full-screen-banner {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  background-color: #95F818;
                  color: black;
                  font-size: 18px;
                  height: 9vh;
                  margin: 0;
                  text-align: center;
            }
        .formulario_ingr {
                    margin-top: 15px;
                }
        </style>
</head>
<body>
    <div class="full-screen-banner">
            Inicio de sesion de usuario verificado
        </div>
<?php
include("verifsesion.php");
?>
<form action="../php/login.php" method="POST" class="formulario_ingr" id="inicios_for">
    <h1 class="info_h1 text-center">Acceder</h1>
    <input type="text" class="formula" required placeholder="&#128113; Usuario" name="usuario" maxlength="10">
    <input type="password" class="formula" required placeholder="&#128272; Contraseña" name="pass" maxlength="20">
    <input type="submit" class="enviar">
    <p class="info_h2">¿No tienes aún una cuenta? <a href="RegistroUs.php" class="titmenu">Haz clic aquí para
            registrarte</a></p>
    <p class="info_h2">Perdiste el acceso a tu cuenta? <a href="#" class="titmenu">Da click aquí para restablecer tu contraseña</a></p>
</form>
</body>
</html>