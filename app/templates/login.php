
<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>

    </head>
    <body>
        <form action="index.php?ctl=inicio" method="post">            
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Nombre de usuario</label>
            <input type="text" name="usuario" placeholder="Usuario"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Contraseña"><br> 
            <?php
                if(isset($_POST['boton'])){
                    echo "Click";
                }
            ?>
            <input type="submit" name="boton" value="Login" onclick="inicio()">
            <a href="?ctl=registro">Registro</a>
        </form>
    </body>

</html>

