<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<?php
include("../php/segcode.php");
?>
<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPIICNEWS</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid p-0">
      <ul class="row text-center mb-3" style="list-style: none; padding: 0; margin: 0 0 10px 0;">
          <li class="col p-0">
              <a class="menu-item" href="#">Escolares</a>
          </li>
          <li class="col p-0">
              <a class="menu-item" href="#">Comunitarios</a>
          </li>
          <li class="col p-0">
              <a class="menu-item" href="#">Externos</a>
          </li>
          <li class="col p-0">
              <a class="menu-item" href="#">Deportivos</a>
          </li>
          <li class="col p-0">
              <a class="menu-item" href="#">Esports</a>
          </li>
          <li class="col p-0">
              <a class="menu-item" href="#">Categorías</a>
          </li>
      </ul>
    </div>

    <style>
      body {
          margin: 0;
      }

      .menu-item {
          display: block;
          padding: 15px 0;
          background-color: #FFFFFF;
          color: black;
          text-decoration: none;
          border: 1px solid #95F818;
          font-family: Arial, sans-serif;
          font-size: 16px;
          transition: all 0s ease;
      }

      .menu-item:hover {
          background-color: #95F818;
          color: white;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0);
      }
    </style>
<?php
include("verifsesion.php");
include('../php/conexion.php');
$session_i = $_SESSION['cliente'];
$datos = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$session_i'");
while ($consulta = mysqli_fetch_array($datos)) {
    $rol = $consulta['rol'];
}
?>
<?php
if ($rol == 1 || $rol == 2) {
?>
    <a href="registevent.php"><img src="../img/Agregarpubli.png" alt="AgregaEvento" width="50">Añadir nueva publicación</a>
    <?php
}
?>
<h2 class="mt-3 mb-2 text-center">Eventos Destacados</h2>
<div class="row row-cols-1 row-cols-md-2 g-4 mt-2">
    <?php
    $data = mysqli_query($conexion, "SELECT * FROM eventos");

    while ($consulta = mysqli_fetch_array($data)) {
        $arreglo = $consulta['id_evento'] . ',' . $consulta['nombreev'];

        ?>

<div class="container2-fluid">
  <div class="card2">
    <img src="../<?php echo $consulta['imgeve']; ?>" alt="Evento">
    <div class="card-body">
      <h5 class="card-title"><?php echo $consulta['nombreev']; ?></h5>
      <p class="card-text">
        <img src="../img/Manoarriba.png" alt="Numlikes" width="30"> <?php echo $consulta['numlikesev']; ?>
        <br>Descripción: <?php echo $consulta['descripcionev']; ?>
        <br>Día: <?php echo $consulta['diaev']; ?>
        <br>Horario: De <?php echo $consulta['horafinev']; ?> a <?php echo $consulta['horainicioev']; ?>
        <br>Ubicación: <?php echo $consulta['ubicacionev']; ?>
        <br>Contacto 1: <?php echo $consulta['redsocial1ev']; ?> <?php echo $consulta['linkred1']; ?>
        <br>Contacto 2: <?php echo $consulta['redsocial2ev']; ?> <?php echo $consulta['linkred2']; ?>
        <br>Tag: <?php echo $consulta['tagsev']; ?>
        <?php if ($rol == 2) { ?>
        <button type="button" data-bs-toggle="modal" data-bs-target="#eliminar" class="btn"
          onclick="eliminar_ev('<?php echo $arreglo ?>')">
          <img src="../img/Eliminarpubli.png" alt="EliminaEvento" width="30">
        </button>
        <?php } ?>
      </p>
    </div>
  </div>
</div>


        <?php
    }
    ?>
</div>
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estás seguro de eliminar este evento?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="elim_ev">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" id="idlabel_elim">ID de evento</label>
                        <input type="text" class="form-control" id="id_elimev" name="id_elimev" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" id="userlabel_elim">Título</label>
                        <input type="text" class="form-control" id="nombre_elimev" name="nombre_elimev" readonly>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confim_elimev">Eliminar</button>
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
<script src="../JS/funcioncrud.js"></script>
</body>
</html>
