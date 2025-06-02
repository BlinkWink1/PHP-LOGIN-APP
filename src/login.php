<?php
session_start();

// Leo credenciales de .env
$dbHost     = getenv('DB_HOST');
$dbUser     = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbName     = getenv('DB_NAME');

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $res = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
    $res->bind_param("s", $user);
    $res->execute();
    $res->bind_result($hash);
    if ($res->fetch() && password_verify($pass, $hash)) {
        $_SESSION['username'] = $user;
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Iniciar sesión</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="container">
    <h1>Iniciar sesión</h1>
    <form method="post">
      <input type="text" name="username" placeholder="Usuario" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
