<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <header>
    <?php if (isset($_SESSION['username'])) {
    echo "<span>Bienvenido/a ".$_SESSION['username']." </span>";
    }
    ?>
    <a href="logout.php">logout</a>
  </header>
  <nav>
    <p>Navegador</p>
      <ul>
   	      <li>Catalogo</li>
   	      <li>Creador de fichas</li>
   	      <li>Tareas</li>
          <li>Contactos</li>
          <li>Calculadora de precio</li>
          <li>Configuracion de perfil</li>

      </ul>
  </nav>
  <div>Aqui el contenido a rellenar</div>

  <footer>my footer</footer>

</body>
