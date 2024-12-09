<!-- Archivo modificable con precaución - No alterar las partes donde se usa php o JS ni cambiar nombres o ids de formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
       <style>
            body {
                padding-top: 100px;
            }
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #50f505">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../img/Logotipo.png" alt="logotipo" width="80">
        </a>
        <a class="navbar-brand h1" href="index.php">UPIICNEWS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categorías</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ¡Hola <?php echo $_SESSION['cliente']; ?>!
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="usuario.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="../php/cerrar_sesion.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
<script type="text/javascript" src="../JS/bootstrap.bundle.min.js"></script>
</html>
