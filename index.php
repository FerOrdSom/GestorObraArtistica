<?php
require_once "utils.php";
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
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <header>
    <?php if (isset($_SESSION['username'])) {
    echo "Bienvenido/a ".$_SESSION['username']." ";
    }
    ?>
    <a href="logout.php">logout</a>
  </header>
  <!-- <?php echo make_nav();
   ?> -->
  <nav>
    <p>Navegador</p>
      <ul>
   	      <li style="display: inline;">Galeria</li>
   	      <li style="display: inline;">Creador de fichas</li>
   	      <li style="display: inline;">Tareas</li>
          <li style="display: inline;">Contactos</li>
          <li style="display: inline;">Calculadora de precio</li>
          <li style="display: inline;">Configuracion de perfil</li>

      </ul>
  </nav>
  <br>
  <!--
  <div>
    <label for="coleccion">Elige coleccion</label>

<select name="coleccion">
 <option value="navidad">Navidad</option>
 <option value="expo">expo</option>
 <option value="indefinido">Indefinido</option>
 <option value="museo">Museo</option>
</select>
<span>Añadir coleccion</span>
<br><br>
<ul class="thumbnails"style="list-style: none;">
  <li>
    <img src="res/add.png">
    <p>Añadir obra</p>
  </li>
  <li>
    <img src="res/1.jpg">
    <p>Barca</p>
  </li>
  <li>
    <img src="res/2.jpg">
    <p>Noche</p>
  </li>
  <li>
    <img src="res/3.jpg">
    <p>Jeronimo</p>
  </li>
  <li>
    <img src="res/4.jpg">
    <p>Girasoles</p>
  </li>
  <li>
    <img src="res/5.jpg">
    <p>Manos</p>
  </li>

</ul>
  </div>
-->
<div>
  <div>
  <label for="coleccion">Elige coleccion</label>

<select name="coleccion">
<option value="navidad">Navidad</option>
<option value="expo">expo</option>
<option value="indefinido">Indefinido</option>
<option value="museo">Museo</option>
</select>

<label for="obras">Elige obra</label>

<select name="obras">
<option value="barca">Barca</option>
<option value="noche">Noche</option>
<option value="jeronimo">Jeronimo</option>
<option value="girasoles">Girasoles</option>
<option value="manos">Manos</option>
</select>
</div>


<br>
<div style="border: black 2px; width: 100%; margin-bottom: 0; background: blue;"></div>
<div style="width: 60%; float:left">
  <img src="res/4.jpg" style="max-width: 90%; max-height: 50%; auto;">
</div>

<div style="width: 20%;  float:right;margin-right: 10%">
  <form>
 <label for="titulo">Titulo:</label><br>
 <input type="text" name="titulo"><br>
 <label for="autor">Autor:</label><br>
 <input type="text" name="autor">
 <label for="altura">Altura:</label><br>
 <input type="text" name="altura">
 <label for="anchura">Anchura:</label><br>
 <input type="text" name="anchura">
 <label for="año">Año:</label><br>
 <input type="text" name="año">
 <label for="descripcion">Descripcion:</label><br>
 <input type="text" name="descripcion">
 <label for="colaboraciones">Colaboraciones:</label><br>
 <input type="text" name="colaboraciones">
 <label for="comentarios">Comentarios:</label><br>
 <input type="text" name="comentarios">
 <br><br><br>
 <button style="padding:10%;"> Editar </button>
</form>
</div>

</div>

  <footer style="position: absolute; bottom: 0;">my footer</footer>

</body>
