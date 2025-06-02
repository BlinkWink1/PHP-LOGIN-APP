<?php

$db_host = 'db';
$db_user = getenv('DB_USER');
$db_password = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Registro</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container">
<h1>Registro</h1>
<form method="post">
<input type="text" name="username" placeholder="Usuario" required>
<input type="password" name="password" placeholder="Contraseña" required>
<button type="submit">Registrarse</button>
</form></div></body></html>
