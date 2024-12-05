<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPIICNEWS</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
include("verifsesion.php");
?>
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar" class="btn btn-primary d-flex mx-auto mb-3">Agregar usuario</button>
<table class="table table-light table-hover" id="table_adm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <?php
    include('../php/conexion.php');
    $data = mysqli_query($conexion, "SELECT * FROM usuarios");

    while($consulta = mysqli_fetch_array($data)) {
        $arreglo = $consulta['id_usuario'].','.$consulta['usuario'].','.$consulta['email'].','.$consulta['contrasena'].','.$consulta['rol'];

    ?>

    <tbody>
        <td><?php echo $consulta['id_usuario']; ?></td>
        <td><?php echo $consulta['usuario']; ?></td>
        <td><?php echo $consulta['email']; ?></td>
        <td><?php echo $consulta['contrasena']; ?></td>
        <td><?php echo $consulta['rol']; ?></td>
        <td>
            <button type="button" data-bs-toggle="modal" data-bs-target="#editar" class="btn btn-success" onclick="modificar('<?php echo $arreglo ?>')">Modificar</button>
        </td>
        <td>
            <button type="button"  data-bs-toggle="modal" data-bs-target="#eliminar" class="btn btn-danger" onclick="eliminar('<?php echo $arreglo ?>')">Eliminar</button>
        </td>
    </tbody>
    <?php
    }
    ?>
</table>
<footer class="foot">
    <p class="foot_p">Pagina web protegida por JOHNYCOP &copy;</p>
</footer>

<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_agr">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Usuario</label>
                        <input type="text" class="form-control" id="adm_usuario" name="adm_usuario">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="adm_correo" name="adm_correo">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control" id="adm_contra" name="adm_contra">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol</label>
                        <select class="form-select form-control" id="adm_rol" name="adm_rol">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="agregar_adm">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar datos de usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_adm">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ID</label>
                        <input type="text" class="form-control" id="id_" name="id_" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario_" name="usuario_">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="email_" name="email_">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control" id="contra_" name="contra_">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Rol</label>
                        <select class="form-select form-control" id="rol_" name="rol_">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="modificar_adm">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estás seguro de eliminar a este usuario?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="enviar_elim">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" id="idlabel_elim">ID</label>
                        <input type="text" class="form-control" id="id_elim" name="id_elim" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" id="userlabel_elim">Usuario</label>
                        <input type="text" class="form-control" id="usuario_elim" name="usuario_elim" readonly>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../JS/funcioncrud.js"></script>

</body>
</html>
