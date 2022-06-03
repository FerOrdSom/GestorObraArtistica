<?php
class View {
  public static function get_head(){
    return "<!DOCTYPE html>
    <html lang=\"es\">
    <head>
      <meta charset=\"utf-8\">
      <title>My Manager</title>
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
        <form class=\"col-sm-10 col-md-6 col-lg-5 col-xl-4 col-xxl-4\" action=\"loginview.php\" method=\"post\"><h4 class=\"text-center\">Login</h4>
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
            <a href=\"passrecoveryview.php\" class=\"text-center\">Forgot password</a>
          </div>
        </form>
      </div>
    </div>
    ";
  }
  public static function get_register_view (){
    return "
    <div class=\"container-fluid h-100 mx-0 my-0\">
      <div class=\"row h-100 justify-content-center align-items-center\" id=\"register-card\">
        <form class=\"col-sm-10 col-md-6 col-lg-5 col-xl-4 col-xxl-4\"action=\"registerview.php\" method=\"post\"><h4 class=\"text-center\">Register</h4>
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
  public static function get_account_recovery_view() {
    return
    "
    <div class=\"container-fluid h-100 mx-0 my-0\">
      <div class=\"row h-100 justify-content-center align-items-center\" id=\"login-card\">
        <form class=\"col-sm-10 col-md-6 col-lg-5 col-xl-4 col-xxl-4\" action=\"passrecoveryview.php\" method=\"post\"><h4 class=\"text-center\">Account recovery</h4>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"useremail\">Email</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"useremail\" placeholder=\"Insert your email\" required></div>
          </div>
          <div class=\"form-group row py-2 text-center\">
            <p class=\"text-justify\"> Insert your email and a new password will be sent </p>
          </div>
          <div class=\"form-group row py-2 justify-content-center\">
            <button class=\"btn btn-primary\" type=\"submit\">Send new password</button>
            <a href=\"loginview.php\" class=\"text-center my-4\">Back</a>
          </div>
        </form>
      </div>
    </div>
    ";
  }
  public static function get_portal_view($content){
    return
    "
    <nav class=\"navbar navbar-default navbar-fixed-top border\">
      <div class=\"container\">
      <div>Welcome ".$_SESSION['username']."</div>
      <nav class=\"nav\">
          <a class=\"nav-link\" href=\"portalview.php?\">Welcome</a>
   	      <a class=\"nav-link\" href=\"portalview.php?cnt=gallery\">Gallery</a>   	      
   	      <a class=\"nav-link\" href=\"portalview.php?cnt=profile\">Profile</a>
          <a class=\"nav-link\" href=\"logout.php\">Logout</a>
      </nav>
      </div>
    </nav>
    <div class=\"container h-100 border overflow-auto\">
    "
    .$content
    ."
    </div>
    <div class=\"navbar navbar-default navbar-fixed-bottom border justify-content-center\">
        <p class=\"text-justify-center\"> My artistic manager 2022</p>
    </div>
    ";
  }
  public static function get_portal_view_welcome_content(){
    return
    "
    <h2 class=\"text-center\">Welcome to your artistic manager</h2>
    ";
  }
  public static function get_profile_content(){
    $profile = Model::get_user_profile();
    $direccion = $profile["adress"];
    return
    "
    <div class=\"container-fluid h-100 mx-0 my-0\">
      <div class=\"row h-100 justify-content-center align-items-center\" id=\"profile-card\">
        <form class=\"col-12\" action=\"profilesave.php\" method=\"post\">
          <h2 class=\"text-center\">Profile</h2>
          <h4 class=\"text-center\">Personal</h4>
          <div class=\"form-group row py-1\">
            <label class=\"col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-form-label\" for=\"name\">Name</label>
            <div class=\"col-sm-12 col-md-8 col-lg-8 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"name\" value=".$profile["name"]."></div>
            <label class=\"col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-form-label\" for=\"name\">First surname</label>
            <div class=\"col-sm-12 col-md-8 col-lg-8 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"surname1\" value=".$profile["surname1"]."></div>
            <label class=\"col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-form-label\" for=\"name\">Second surname</label>
            <div class=\"col-sm-12 col-md-8 col-lg-8 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"surname2\" value=".$profile["surname2"]."></div>
          </div>
          <div class=\"form-group row py-1\">
          <h4 class=\"text-center\">Contact</h4>
          <label class=\"col-sm-12 col-md-4 col-lg-4 col-xl-1 col-xxl-1 col-form-label\" for=\"email\">Email</label>
          <div class=\"col-sm-12 col-md-8 col-lg-8 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"email\" value=".$profile["email"]."></div>
          <label class=\"col-sm-12 col-md-4 col-lg-4 col-xl-1 col-xxl-1 col-form-label\" for=\"phone1\">Phone 1</label>
          <div class=\"col-sm-12 col-md-8 col-lg-8 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"phone1\" value=".$profile["phone1"]."></div>
          <label class=\"col-sm-12 col-md-4 col-lg-4 col-xl-1 col-xxl-1 col-form-label\" for=\"phone2\">Phone 2</label>
          <div class=\"col-sm-12 col-md-8 col-lg-8 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"phone2\" value=".$profile["phone2"]."></div>
          <label class=\"col-sm-12 col-md-4 col-lg-4 col-xl-1 col-xxl-1 col-form-label\" for=\"web\">Website</label>
          <div class=\"col-sm-12 col-md-8 col-lg-8 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"web\" value=".$profile["web"]."></div>
          </div>
          <div class=\"form-group row py-1\">
          <label class=\"col-sm-12 text-center\" for=\"adress\">Adress</label>
          <div class=\"col-sm-12\"><input class=\"form-control\" type=\"text\" name=\"adress\" value='".$direccion."'></div>
          </div>
          <div class=\"form-group row py-1\">
          <h4 class=\"text-center\">Change password</h4>
          <div class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 py-2 \"><input class=\"form-control\" type=\"text\" name=\"newpass1\" placeholder=\"Insert new password\"></div>
          <div class=\"col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 py-2 \"><input class=\"form-control\" type=\"text\" name=\"newpass2\" placeholder=\"Repeat new password\"></div>
          <div class=\"col-sm-0 col-md-2 col-lg-2 col-xl-2 col-xxl-2\"></div>
          <button class=\"col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2 py-2 btn btn-primary btn-sm\" type=\"submit\">Save Password</button>
          </div>
          <div class=\"form-group row py-1\">
          <h4 class=\"text-center\">Change images</h4>
          <label class=\"col-sm-12 text-center\" for=\"img_u\">Profile image</label>
          <div class=\"col-sm-10 col-md-6 col-lg-6 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"img_u\" value=".$profile["img_profile"]."></div>
          <label class=\"col-sm-12 text-center\" for=\"img_b\">Backgorund image</label>
          <div class=\"col-sm-10 col-md-6 col-lg-6 col-xl-2 col-xxl-2 \"><input class=\"form-control\" type=\"text\" name=\"img_b\" value=".$profile["img_back"]."></div>
          </div>
          <div class=\"form-group row py-1 justify-content-center\">
          <label class=\"col-sm-12 text-center\" for=\"notes\">Notas</label>
          <div class=\"col-12 \"><input class=\"form-control\" type=\"text\" name=\"notes\" value='".$profile["notes"]."'></div>
          </div>
          <div class=\"form-group row py-1 justify-content-center\">
            <button class=\"col-2 btn btn-primary\" type=\"submit\">Save Changes</button>

          </div>
        </form>
      </div>
    </div>
    ";
  }
  public static function get_gallery_content(){
    $collections = Model::get_user_collections();
    if (isset($_GET["col"])){
    $col_id = $_GET["col"];
  }else{
    $col_id = "";
  }
    return
    "
    <div class=\"container-fluid h-100 mx-0 my-0\">
      <div class=\"row\">
          <form class=\"col-sm-10 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-content-center\" action=\"collection.php\" method=\"post\" enctype=\"multipart/form-data\">
            <div class=\"row-1 \">
              <label class=\"col-12 my-1\" for=\"collection_name\"><h5 class=\"text-center\">Add collection:</h5></label>
              <div class=\"col-12\"><input class=\"form-control\" type=\"text\" name=\"collection_name\" placeholder=\"Insert collection name\" required></div>
              <input class=\"col-12 my-2\" type=\"submit\" name=\"submit\" value=\"Add collection\">
            </div>
          </form>
          <form class=\"col-sm-10 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-content-center\" action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
            <label class=\"col-12 my-1\" for=\"img_upload\"><h5 class=\"text-center\">Upload image</h5></label>
            <input class=\"col-12 my-1\" id=\"img_upload\" type=\"file\" name=\"my_image\" \">
            <input class=\"col-12 my-1\" type=\"submit\" name=\"submit\" value=\"Upload image\">
            <select name=\"selector\" class=\"col-6 my-1\" form-select\" aria-label=\"Default select example\">
              <option selected>Choose a colection</option>
              ".$collections."
            </select>

            <button formaction=\"collectiongallery.php\" class=\"btn btn-primary col-12 my-1\">View collection</button>
          </form>".Model::get_collection_works($col_id)."
      </div>
    </div>
    ";
  }
  public static function get_records_content(){
    if (isset($_GET["url"])){
    $pic_url = $_GET["url"];
    $record = Model::get_record_content($pic_url);
    }else{
    $pic_url = "";


    }
    return "
    <div class=\"container-fluid h-100 mx-0 my-0\">

      <div class=\"row h-100 align-items-center\" id=\"login-card\">
        <div class=\"col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8\">
          <img class=\"col-sm-10 col-md-6 col-lg-4 col-xl-4 col-xxl-4\" style=\"object-fit: cover; width: 100%; height: 50vh;\" src=\"".$pic_url."\"></img>
        </div>

        <form class=\"col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 border\" action=\"recordsave.php?url=".$pic_url."\" method=\"post\"><h4 class=\"text-center\">Record</h4>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"title\">Title</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"title\" placeholder=\"Insert title\" value=\"".$record["title"]."\"></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"author\">Author</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"author\" placeholder=\"Insert author\" value=\"".$record["author"]."\"></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"technique\">Technique</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"technique\" placeholder=\"Insert technique\" value=\"".$record["technique"]."\"></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"width\">Width</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"width\" placeholder=\"Insert width\" value=\"".$record["width"]."\"></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"height\">Height</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"height\" placeholder=\"Insert height\" value=\"".$record["height"]."\"></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"year\">Year</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"year\" placeholder=\"Insert year\" value=\"".$record["year"]."\"></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"description\">Description</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"description\" placeholder=\"Insert description\" value=\"".$record["description"]."\"></div>
          </div>
          <div class=\"form-group row py-1\">
            <label class=\"col-1 col-form-label\" for=\"commentary\">Commentary</label>
            <div class=\"col-2\"></div>
            <div class=\"col-9 \"><input class=\"form-control\" type=\"text\" name=\"commentary\" placeholder=\"Insert commentary\" value=\"".$record["commentary"]."\"></div>
          </div>

          <div class=\"form-group row py-2 justify-content-center\">
            <button class=\"btn btn-primary\" type=\"submit\">Save record</button>
          </div>
        </form>

      </div>
    </div>
    ";
  }
}
?>
