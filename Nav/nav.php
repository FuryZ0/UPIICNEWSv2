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
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #50f505" >
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../img/Logotipo.png" alt="logotipo" width="80">
        </a>
        <!-- <a class="navbar-brand h1">UPIICNEWS</a>-->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
             <a class="navbar-brand">UPIICNEWS</a>
             <ul class="navbar-nav ms-auto d-flex align-items-center">
                 <li class="nav-item">
                   <a class="navbar-brand" href="InicioSesion.php">Iniciar sesión</a>
                  </li>
            <!--<li class="nav-item">
                    <a class="nav-link" href="#">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="InicioSesion.php">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="RegistroUs.php">Registrarse</a>
                </li> -->
                <li class="nav-item">
             <a class="navbar-brand" href="InicioSesion.php">
                            <img src="../img/IniciarSesion.png" alt="Sesion" width="50">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
<script type="text/javascript" src="../JS/bootstrap.bundle.min.js"></script>
</html>