
<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
        <script type="text/javascript" src="js\bootstrap.min.js"></script>

    </head>
    <body>
        <div>
            <form autocomplete="off" class="d-block" style="width: 30%; height:50%; margin: 0 auto; padding-top: 10%; padding-bottom: 20%;" action="index.php?ctl=inicio" method="post">            
                <label class="align-content-center" style="display: block; text-align: center;">Usuario</label>
                <input autocomplete="off" class="form-control" style="text-align: center;"type="text" name="usuario" placeholder="Usuario"><br>
                <label class="align-content-center" style="display: block; text-align: center;">Password</label>
                <input autocomplete="off" class="form-control" style="text-align: center;" type="password" name="password" placeholder="Contraseña"><br>
                <div >
                    <div style="width: 80%; margin: 0 auto;">
                        <input style="width: 100%;" class="form control d-lg-inline" type="submit" name="boton" value="Login"><br>
                    </div>
                    <br>
                    <div style="width: 20%; margin: 0 auto;">
                        <a class="form-control" href="?ctl=registro">Registro</a>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>

