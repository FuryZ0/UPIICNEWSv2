<?php

session_start();
error_reporting(0);
$session_i = $_SESSION['cliente'];

if ($session_i == null || $session_i == "") {
    echo '
    <script>
    alert("No tiene una sesión iniciada");
    location.href = "../Nav/InicioSesion.php";
    </script>
    ';
    die();
}

?>