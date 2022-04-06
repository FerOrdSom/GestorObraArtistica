<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>

    </head>
    <body>
        <form action="index.php?ctl=registro" method="post">            
            <label>Usuario</label>
            <input type="text" name="usuario" placeholder="Usuario"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Contraseña"><br>
            <label>Repita password</label>
            <input type="password" name="password_2" placeholder="Repita Contraseña"><br>            
            <input type="submit" name="boton" value="Register">
            <a href="?ctl=login">Volver</a>
        </form>
    </body>

</html>