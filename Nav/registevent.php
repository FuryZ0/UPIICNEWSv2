<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo evento</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .row {
          display: flex;
          justify-content: center;
          gap: 20px;
        }

        .col {
          display: flex;
          flex-direction: column;
          align-items: center;
          text-align: center;
          flex: 1;
        }

        .form-label {
          margin-bottom: 10px;
        }

        .formula,
        textarea,
        select {
          width: 100%;
          max-width: 300px;
          text-align: center;
        }
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
                Registro de eventos
            </div>
<?php
include("verifsesion.php");
?>
<form action="../php/agregarev.php" method="POST" class="formulario_ingre" id="registro_eve" enctype="multipart/form-data">
    <!--<h2 class="info_h2 mb-3">Registro de eventos</h2>-->
    <div class="row">
        <div class="col">
    <label class="form-label">Nombre</label>
    <input type="text" class="formula1" required placeholder="Nombre de evento" minlength="10" maxlength="50" name="nombreev">
        </div>
        <div class="col">
    <label class="form-label">Categoría</label>
    <select class="form-select form-control mt-4" id="categoriaev" name="categoriaev">
        <option value="Escolares">Escolares</option>
        <option value="Comunitarios">Comunitarios</option>
        <option value="Externos">Externos</option>
        <option value="Deportivos">Deportivos</option>
        <option value="Esports">Esports</option>
    </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
    <label class="form-label">Imagen</label>
    <input type="file" class="formula1" required id="imagen" name="imagen" size="10">
        </div>
        <div class="col">
    <label class="form-label">Descripción de evento</label>
    <textarea class="formula1" required id="descripev" name="descripev" maxlength="50"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col">
    <label class="form-label">Día</label>
    <input type="date" class="formula1" name="diaev" required id="diaev">
    <script>
        // Obtener el input de tipo date
        const inputFecha = document.getElementById('diaev');
        // Obtener la fecha de hoy en formato ISO (YYYY-MM-DD)
        const hoy = new Date();
        const mesAdelante = new Date();
        mesAdelante.setMonth(hoy.getMonth() + 1); // Sumar un mes
        // Formatear las fechas al formato YYYY-MM-DD
        const formatoISO = (diaev) => diaev.toISOString().split('T')[0];
        // Establecer los valores de min y max
        inputFecha.min = formatoISO(hoy);
        inputFecha.max = formatoISO(mesAdelante);
    </script>
        </div>
        <div class="col">
    <label class="form-label">Ubicación</label>
    <select class="form-select form-control mt-4" id="ubiev" name="ubiev">
        <option value="Estacionamiento">Estacionamiento</option>
        <option value="AuditorioA">Auditorio A</option>
        <option value="AuditorioB">Auditorio B</option>
        <option value="Pecera">Pecera</option>
        <option value="Campoamericano">Campo de americano</option>
    </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
    <label class="form-label">Hora de inicio:</label>
    <input type="time" class="formula1" required id="horain" name="horain" min="06:00" max="22:00">
        </div>
        <div class="col">
    <label class="form-label">Hora de finalización:</label>
    <input type="time" class="formula1" required id="horafin" name="horafin" min="06:00" max="22:00">
        </div>
    </div>
    <div class="row">
        <div class="col">
    <label class="form-label">Red social 1:</label>
    <select class="form-select form-control mt-4" id="red1" name="red1">
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="WhatsApp">WhatsApp</option>
        <option value="Discord">Discord</option>
    </select>
        </div>
        <div class="col">
    <label class="form-label">Link de contacto 1:</label>
    <input type="text" class="formula1" required name="linkred1" id="linkred1" maxlength="50">
        </div>
    </div>
    <div class="row">
        <div class="col">
    <label class="form-label">Red social 2:</label>
    <select class="form-select form-control mt-4" id="red2" name="red2">
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="WhatsApp">WhatsApp</option>
        <option value="Discord">Discord</option>
    </select>
        </div>
        <div class="col">
    <label class="form-label">Link de contacto 2:</label>
    <input type="text" class="formula1" required name="linkred2" id="linkred2" maxlength="20">
        </div>
    </div>
    <input type="submit" class="enviar">
</form>
<script>
    const horaInicio = document.getElementById('horain');
    const horaFin = document.getElementById('horafin');

    // Actualizar el mínimo del input "horaFin" en función del valor de "horaInicio"
    horaInicio.addEventListener('input', () => {
        const valorInicio = horaInicio.value;

        // Si se selecciona una hora válida, ajustar el mínimo de "horaFin"
        if (valorInicio) {
            horaFin.min = valorInicio;
        } else {
            horaFin.min = "06:00"; // Restaurar mínimo si el valor es inválido
        }
    });

    // Validar que el valor seleccionado en "horaFin" respete el mínimo
    horaFin.addEventListener('input', () => {
        const valorFin = horaFin.value;

        if (valorFin && valorFin < horaFin.min) {
            alert("La hora de fin no puede ser menor que la hora de inicio.");
            horaFin.value = ""; // Borrar el valor no válido
        }
    });
</script>
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
</script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script type="text/javascript" src="../JS/funciones.js"></script>
<script>
    // Obtener todos los campos de entrada, texto, selección y área de texto del formulario
    const camposFormulario = document.querySelectorAll("#registro_eve input, #registro_eve select, #registro_eve textarea");

    // Agregar un evento a cada campo para cambiar el borde al color verde cuando sea modificado
    camposFormulario.forEach(campo => {
        campo.addEventListener("input", () => {
            campo.style.borderColor = "#95F818"; // Cambia el color del borde
        });

        campo.addEventListener("change", () => {
            campo.style.borderColor = "#95F818"; // Cambia el color del borde
        });
    });
</script>
</body>
</html>
