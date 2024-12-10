<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<?php
include("../php/sesion_iniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
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
                Registro de nuevos usuarios
            </div>
<?php
include("verifsesion.php");
?>
<form action="../php/registro.php" method="POST" class="formulario_ingr" id="registro_for">
    <h2 class="info_h2">Registrarse</h2>
    <input type="text" class="formula" required placeholder="&#128113; Nombre de usuario" name="usuario" maxlength="10">
    <input type="text" class="formula" required placeholder="&#128233; Email" name="email" maxlength="50">
    <input type="password" class="formula" required placeholder="&#128272; Contraseña" name="contra" maxlength="20">
    <input type="submit" class="enviar">
</form>

<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
</script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="../JS/funciones.js"></script>
</body>
</html>