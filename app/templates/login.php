
<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>

    </head>
    <body>
        <form action="index.php?ctl=inicio" method="post">            
            <label>Usuario</label>
            <input type="text" name="usuario" placeholder="Usuario"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Contraseña"><br>            
            <input type="submit" name="boton" value="Login">
            <a href="?ctl=registro">Registro</a>
        </form>
    </body>

</html>

