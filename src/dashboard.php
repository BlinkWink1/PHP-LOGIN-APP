<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
echo "Hola, " . $_SESSION['user'] . " <a href='logout.php'>Cerrar sesión</a>";
?>
