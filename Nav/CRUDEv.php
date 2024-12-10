<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<?php
include("../php/sesion_noinic.php");
include('../php/roles.php');
?>
<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
include("../Nav/navadmin.php");
?>
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar" class="btn btn-dark d-flex mx-auto mb-3">
    Agregar evento
</button>
<table class="table table-light table-hover table-responsive-sm border-dark border-2 border-opacity-75" id="table_adm">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Ubicación</th>
        <th>Tag</th>
        <th>No. likes</th>
        <th>Día</th>
        <th>Hora de inicio</th>
        <th>Hora de fin</th>
        <th>Red social 1</th>
        <th>Link</th>
        <th>Red social 2</th>
        <th>Link</th>
        <th>Imagen</th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <?php
    include('../php/conexion.php');
    $data = mysqli_query($conexion, "SELECT * FROM eventos");

    while ($consulta = mysqli_fetch_array($data)) {
        $arreglo = $consulta['id_evento'] . ',' . $consulta['nombreev'] . ',' . $consulta['descripcionev'] . ',' . $consulta['ubicacionev'] . ',' . $consulta['tagsev']
            . ',' . $consulta['numlikesev']  . ',' . $consulta['diaev']  . ',' . $consulta['horainicioev']  . ',' . $consulta['horafinev']  . ',' . $consulta['redsocial1ev']  . ',' . $consulta['linkred1']
            . ',' . $consulta['redsocial2ev']  . ',' . $consulta['linkred2']  . ',' . $consulta['imgeve'];

        ?>

        <tbody>
        <td><?php echo $consulta['id_evento']; ?></td>
        <td><?php echo $consulta['nombreev']; ?></td>
        <td><?php echo $consulta['descripcionev']; ?></td>
        <td><?php echo $consulta['ubicacionev']; ?></td>
        <td><?php echo $consulta['tagsev']; ?></td>
        <td><?php echo $consulta['numlikesev']; ?></td>
        <td><?php echo $consulta['diaev']; ?></td>
        <td><?php echo $consulta['horainicioev']; ?></td>
        <td><?php echo $consulta['horafinev']; ?></td>
        <td><?php echo $consulta['redsocial1ev']; ?></td>
        <td><?php echo $consulta['linkred1']; ?></td>
        <td><?php echo $consulta['redsocial2ev']; ?></td>
        <td><?php echo $consulta['linkred2']; ?></td>
        <td><?php echo $consulta['imgeve']; ?></td>
        <td>
            <button type="button" data-bs-toggle="modal" data-bs-target="#editar" class="btn btn-outline-secondary"
                    onclick="modificar('<?php echo $arreglo ?>')">Modificar
            </button>
        </td>
        <td>
            <button type="button" data-bs-toggle="modal" data-bs-target="#eliminar" class="btn btn-outline-danger"
                    onclick="eliminar('<?php echo $arreglo ?>')">Eliminar
            </button>
        </td>
        </tbody>
        <?php
    }
    ?>
</table>

<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar evento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_agr" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Título</label>
                        <input type="text" class="form-control" required id="adm_tit" name="adm_tit">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripción</label>
                        <textarea class="form-control" required id="adm_desc" name="adm_desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Ubicación</label>
                        <select class="form-select form-control" required id="adm_ubi" name="adm_ubi">
                            <option value="Estacionamiento">Estacionamiento</option>
                            <option value="AuditorioA">Auditorio A</option>
                            <option value="AuditorioB">Auditorio B</option>
                            <option value="Pecera">Pecera</option>
                            <option value="Campoamericano">Campo de americano</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <select class="form-select form-control" required id="adm_tag" name="adm_tag">
                            <option value="Escolares">Escolares</option>
                            <option value="Comunitarios">Comunitarios</option>
                            <option value="Externos">Externos</option>
                            <option value="Deportivos">Deportivos</option>
                            <option value="Esports">Esports</option>
                        </select>
                    </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Día</label>
                            <input type="date" class="form-control" name="adm_dia" required id="adm_dia">
                        </div>
                            <script>
                                // Obtener el input de tipo date
                                const inputFecha = document.getElementById('adm_dia');
                                // Obtener la fecha de hoy en formato ISO (YYYY-MM-DD)
                                const hoy = new Date();
                                const mesAdelante = new Date();
                                mesAdelante.setMonth(hoy.getMonth() + 1); // Sumar un mes
                                // Formatear las fechas al formato YYYY-MM-DD
                                const formatoISO = (adm_dia) => adm_dia.toISOString().split('T')[0];
                                // Establecer los valores de min y max
                                inputFecha.min = formatoISO(hoy);
                                inputFecha.max = formatoISO(mesAdelante);
                            </script>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Hora de inicio</label>
                            <input type="time" class="form-control" required name="adm_horai" id="adm_horai" min="06:00" max="22:00">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Hora de término</label>
                            <input type="time" class="form-control" required name="adm_horaf" id="adm_horaf" min="06:00" max="22:00">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Red social 1</label>
                            <select class="form-select form-control" id="adm_red1" name="adm_red1">
                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Discord">Discord</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Link 1</label>
                            <input type="text" class="form-control" required id="adm_link1" name="adm_link1">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Red social 2</label>
                            <select class="form-select form-control" id="adm_red2" name="adm_red2">
                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Discord">Discord</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Link 2</label>
                            <input type="text" class="form-control" required id="adm_link2" name="adm_link2">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Imagen</label>
                            <input type="file" class="form-control" required name="adm_img" id="adm_img" size="10">
                        </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="agregar_adm">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const horaInicio = document.getElementById('adm_horai');
    const horaFin = document.getElementById('adm_horaf');

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
<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar datos de evento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_adm" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ID</label>
                        <input type="text" class="form-control" required id="ide_" name="ide_" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Título</label>
                        <input type="text" class="form-control" required id="tit_" name="tit_">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripción</label>
                        <textarea class="form-control" required id="desc_" name="desc_"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Ubicación</label>
                        <select class="form-select form-control" required id="ubi_" name="ubi_">
                            <option value="Estacionamiento">Estacionamiento</option>
                            <option value="AuditorioA">Auditorio A</option>
                            <option value="AuditorioB">Auditorio B</option>
                            <option value="Pecera">Pecera</option>
                            <option value="Campoamericano">Campo de americano</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <select class="form-select form-control" required id="tag_" name="tag_">
                            <option value="Escolares">Escolares</option>
                            <option value="Comunitarios">Comunitarios</option>
                            <option value="Externos">Externos</option>
                            <option value="Deportivos">Deportivos</option>
                            <option value="Esports">Esports</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Día</label>
                        <input type="date" class="form-control" name="dia_" required id="dia_">
                    </div>
                    <script>
                        // Obtener el input de tipo date
                        const inputFecha = document.getElementById('adm_dia');
                        // Obtener la fecha de hoy en formato ISO (YYYY-MM-DD)
                        const hoy = new Date();
                        const mesAdelante = new Date();
                        mesAdelante.setMonth(hoy.getMonth() + 1); // Sumar un mes
                        // Formatear las fechas al formato YYYY-MM-DD
                        const formatoISO = (adm_dia) => adm_dia.toISOString().split('T')[0];
                        // Establecer los valores de min y max
                        inputFecha.min = formatoISO(hoy);
                        inputFecha.max = formatoISO(mesAdelante);
                    </script>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Hora de inicio</label>
                        <input type="time" class="form-control" required name="horai_" id="horai_" min="06:00" max="22:00">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Hora de término</label>
                        <input type="time" class="form-control" required name="horaf_" id="horaf_" min="06:00" max="22:00">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Red social 1</label>
                        <select class="form-select form-control" id="red1_" name="red1_">
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="WhatsApp">WhatsApp</option>
                            <option value="Discord">Discord</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Link 1</label>
                        <input type="text" class="form-control" required id="link1_" name="link1_">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Red social 2</label>
                        <select class="form-select form-control" id="red2_" name="red2_">
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="WhatsApp">WhatsApp</option>
                            <option value="Discord">Discord</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Link 2</label>
                        <input type="text" class="form-control" required id="link2_" name="link2_">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Imagen</label>
                        <input type="file" class="form-control" required name="img_" id="img_" size="10">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="modificar_adm">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const horaInicio = document.getElementById('horai_');
    const horaFin = document.getElementById('horaf_');

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
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estás seguro de eliminar este evento?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="enviar_elim">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" id="idlabel_elim">ID</label>
                        <input type="text" class="form-control" id="id_elim" name="id_elim" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" id="userlabel_elim">Título</label>
                        <input type="text" class="form-control" id="tit_elim" name="tit_elim" readonly>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confim_elim">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous">
</script>
<script src="../JS/funcionesEv.js"></script>
</body>
</html>
