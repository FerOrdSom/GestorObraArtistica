<?php
class View {
  public static function get_head(){
    return "<!DOCTYPE html>
    <html lang=\"es\">
    <head>
      <meta charset=\"utf-8\">
      <title>Login</title>
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
      <link rel=\"stylesheet\" type=\"text/css\" href=\"css\bootstrap.min.css\">

    </head>
    <body style=\"height: 100vh; display: flex; flex-direction: column;\">";
  }
  public static function get_foot() {
    return "<script type=\"text/javascript\" src=\"js\bootstrap.min.js\"></script>
    </body>

    </html>";
  }
  public static function get_login_view() {
    return
    "
    <div class=\"container-fluid h-100 mx-0 my-0\">
      <div class=\"row h-100 justify-content-center align-items-center\" id=\"login-card\">
        <form class=\"col-sm-10 col-md-6 col-lg-4 col-xl-4 col-xxl-4\" action=\"loginview.php\" method=\"post\"><h4 class=\"text-center\">Login</h4>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"username\">User</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"Insert user\" required></div>
          </div>
          <div class=\"form-group row py-2\">
            <label class=\"col-1 col-form-label\" for=\"password\">Password</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"Insert password\"required></div>
          </div>
          <div class=\"form-group row py-2 justify-content-center\">
            <button class=\"btn btn-primary\" type=\"submit\">Login</button>
            <a href=\"registerview.php\" class=\"text-center my-4\">Sign in</a>
            <a href=\"passrecovery.php\" class=\"text-center\">Forgot password</a>
          </div>
        </form>
      </div>
    </div>
    ";
  }
  public static function get_register_view (){
    return "<!-- Full extension background -->
    <div class=\"container-fluid h-100 mx-0 my-0\">
      <div class=\"row h-100 justify-content-center align-items-center\" id=\"register-card\">
        <form class=\"col-sm-10 col-md-6 col-lg-4 col-xl-4 col-xxl-4\"action=\"registerview.php\" method=\"post\"><h4 class=\"text-center\">Register</h4>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"username\">User</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"newusername\" placeholder=\"Insert user name\" required></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"newemail\">Email</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"email\" name=\"newemail\" placeholder=\"Insert email\" required></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"newpassword\">Password</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"password\" name=\"newpassword\" placeholder=\"Insert password\"required></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"checkpassword\"> </label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"password\" name=\"checkpassword\" placeholder=\"Repeat password\"required></div>
          </div>
          <div class=\"form-group row py-2 justify-content-center\">
            <div class=\"col-1 col-sm-0\"></div>
            <button class=\"btn btn-primary\" type=\"submit\">Sign in</button>
            <a href=\"loginview.php\" class=\"text-center my-4\">Back</a>
          </div>
        </form>
      </div>
    </div>
    ";
  }
}
?>
