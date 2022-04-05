
<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        
    </head>
    <body>
        <form action="login.php" method="post">            
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Nombre de usuario</label>
            <input type="text" name="uname" placeholder="Usuario"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Contraseña"><br> 
            <button type="submit">Login</button>
            <a href="?ctl=registro">Registro</a>
        </form>
    </body>

</html>

