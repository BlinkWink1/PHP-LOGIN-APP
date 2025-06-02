<!DOCTYPE html>
<html>
<head>
  <title>PROYECTO-07 | ZAKARIA CHIOULOUD</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h1>PROYECTO TFC ZAKARIA CHIOULOUD</h1>
  <?php if (isset($_SESSION['username'])): ?>
  <p>Hola, <b><?= $_SESSION['username'] ?></b></p>
  <a href="logout.php"><button>Cerrar sesión</button></a>
<?php else: ?>
    <a href="register.php"><button>Registrarse</button></a>
    <a href="login.php"><button>Iniciar sesión</button></a>
  <?php endif; ?>
</div>
</body>
</html>
