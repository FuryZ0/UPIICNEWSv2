<?php
include("../php/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de control del usuario</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
</head>
<body>
<?php
include("verifsesion.php");
?>
<h1>Bienvenido <?php echo $_SESSION['cliente']; ?></h1>

<div class="perfil">
    <h1 class="display-4 text-center my-5">Informacion del perfil</h1>
    <div>
        <table class="table table-light table-hover mx-auto text-center" id="tabla_user">
            <?php
                $cliente = $_SESSION['cliente'];
                $data = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$cliente'");

            while ($consulta = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <th>Usuario:</th>
                <td><?php echo $consulta['usuario']; ?></td>
            </tr>
            <tr>
                <th>Correo:</th>
                <td><?php echo $consulta['email']; ?></td>
            </tr>
            <tr>
                <th>Contraseña:</th>
                <td><?php echo $consulta['contrasena']; ?></td>
            </tr>
            <tr>
                <th>Rol:</th>
                <td><?php echo $consulta['rol']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="cont_boton">
        <input type="button" class="btn btn-success boton" name="Modf" value="Modificar datos" data-bs-toggle="modal" data-bs-target="#mod_per">
        <input type="button" class="btn btn-danger boton" name="Elim" value="Eliminar cuenta" data-bs-toggle="modal" data-bs-target="#elim_per">
    </div>
</div>

<div class="modal fade" id="mod_per" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Configurar perfil</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="cambiar">
                <?php
                $cliente = $_SESSION['cliente'];
                $data = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$cliente'");

                while ($consulta = mysqli_fetch_array($data)) {
                ?>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $consulta['usuario']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Correo</label>
                    <input type="text" class="form-control" name="correo" value="<?php echo $consulta['email']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Contraseña actual</label>
                    <input type="password" class="form-control" name="contra" value="">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Nueva contraseña</label>
                    <input type="password" class="form-control" name="contranueva" id="nuevacontra" disabled required >
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check">
                    <label class="form-check-label" for="flexCheckDefault"> Marcar para cambiar contraseña </label>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="actualizar">Confirmar cambios</button>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="elim_per" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar eliminacion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../php/eliminar.php" method="POST">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Contraseña de seguridad</label>
                        <input type="password" class="form-control" name="elimcontra" id="block_uno" disabled required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Confirmar contraseña de seguridad</label>
                        <input type="password" class="form-control" name="confcontra" id="block_dos" disabled required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check_elim">
                        <label class="form-check-label" for="flexCheckDefault"> Estoy seguro de eliminar mi cuenta </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Advertencia:</strong> Al borrar la cuenta perderás toda la información en la base de datos
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
</script>
<script type="text/javascript" src="../JS/funciones.js"></script>
<script type="text/javascript" src="../JS/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
</body>
</html>
