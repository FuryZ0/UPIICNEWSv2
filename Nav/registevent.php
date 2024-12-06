<?php
include ("../php/sesion_iniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
include("verifsesion.php");
?>
<form action="../php/agregarev.php" method="POST" class="formulario_ingr" id="registro_for">
    <h2 class="info_h2">Registro de eventos</h2>
    <label class="form-label">Nombre</label>
    <input type="text" class="formula" required placeholder="Nombre de evento" maxlength="50" name="nombreev">
    <label class="form-label">Categoría</label>
    <select class="form-select form-control" id="" name="categoriaev">
        <option value="Escolares">Escolares</option>
        <option value="Comunitarios">Comunitarios</option>
        <option value="Externos">Externos</option>
        <option value="Deportivos">Deportivos</option>
        <option value="Esports">Esports</option>
    </select>
    <label class="form-label">Imagen</label>
    <input type="text" class="formula" required placeholder="Imagen" name="imagen" maxlength="50">
    <label class="form-label">Descripción de evento</label>
    <textarea class="formula" required name="descripev" maxlength="50"></textarea>
    <label class="form-label">Día</label>
    <input type="date" class="formula" name="diaev" required id="diaev">
    <script>
        // Obtener el input de tipo date
        const inputFecha = document.getElementById('fecha');
        // Obtener la fecha de hoy en formato ISO (YYYY-MM-DD)
        const hoy = new Date();
        const mesAdelante = new Date();
        mesAdelante.setMonth(hoy.getMonth() + 1); // Sumar un mes
        // Formatear las fechas al formato YYYY-MM-DD
        const formatoISO = (fecha) => fecha.toISOString().split('T')[0];
        // Establecer los valores de min y max
        inputFecha.min = formatoISO(hoy);
        inputFecha.max = formatoISO(mesAdelante);
    </script>
    <label class="form-label">Ubicación</label>
    <select class="form-select form-control" id="" name="ubiev">
        <option value="Estacionamiento">Estacionamiento</option>
        <option value="AuditorioA">Auditorio A</option>
        <option value="AuditorioB">Auditorio B</option>
        <option value="Pecera">Pecera</option>
        <option value="Campoamericano">Campo de americano</option>
    </select>
    <label class="form-label">Hora de inicio:</label>
    <input type="time" class="formula" required name="horain">
    <label class="form-label">Hora de finalización:</label>
    <input type="time" class="formula" required name="horafin">
    <label class="form-label">Red social 1:</label>
    <select class="form-select form-control" id="" name="red1">
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="WhatsApp">WhatsApp</option>
        <option value="Discord">Discord</option>
    </select>
    <label class="form-label">Link de contacto:</label>
    <input type="text" class="formula" required  name="linkred1" maxlength="50">
    <label class="form-label">Red social 2:</label>
    <select class="form-select form-control" id="" name="red2">
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="WhatsApp">WhatsApp</option>
        <option value="Discord">Discord</option>
    </select>
    <label class="form-label">Link de contacto:</label>
    <input type="text" class="formula" required name="linkred2" maxlength="20">
    <input type="submit" class="enviar">
</form>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="../JS/funciones.js"></script>
</body>
</html>
