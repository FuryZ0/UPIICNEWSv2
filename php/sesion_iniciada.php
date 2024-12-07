<!-- No modificar este archivo - funcionamiento directo con base de datos -->
<?php

session_start();
error_reporting(0);
$session_i = $_SESSION['cliente'];

if ($session_i != "") {
    header("location:../Nav/usuario.php");
}

?>