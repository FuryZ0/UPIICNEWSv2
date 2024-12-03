<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de control del usuario</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleicon.css">
</head>
<body>
<?php
include ("verifsesion.php");
?>
<h1>Bienvenido <?php echo $_SESSION['cliente']; ?></h1>
</body>
</html>
