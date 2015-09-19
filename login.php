<?php
  session_start();
  include("config.php");
  
  $error_login = false;

  $email_cookie_name = "emsi-email";
  $password_cookie_name = "emsi-password";
  $remember_me_email = "";
  $remember_me_password = "";
  $remember_me_checked = "";

  if (isset($_COOKIE[$email_cookie_name]) && isset($_COOKIE[$password_cookie_name])) {
    $remember_me_email = $_COOKIE[$email_cookie_name];
    $remember_me_password = $_COOKIE[$password_cookie_name];

    $remember_me_checked = "checked";
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from Form
    $email=mysqli_real_escape_string($db,$_POST['email']); 
    $password=mysqli_real_escape_string($db,$_POST['password']); 

    $sql="SELECT id FROM Administrateur WHERE email='$email' and password='$password'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);


    // If result matched $email and $password, table row must be 1 row
    if($count==1) {
      $_SESSION['login_user']=$email;

      // If Remember Me is checked store username and password in a cookie
      if (isset($_POST["remember-me"]) && $_POST["remember-me"] == "yes") {
        $email_cookie_value = $email;
        $password_cookie_value = $password;

        setcookie($email_cookie_name, $email_cookie_value);
        setcookie($password_cookie_name, $password_cookie_value);
      }

      header("location: liste-inscriptions.php");
    } else  {
      $error_login = true;
    }
  } else if (isset($_GET["action"]) && $_GET["action"] == "logout") {
    session_destroy();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EMSI E-Learning | Connexion</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/FontAwesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/AdminLTE/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="css/e-learning.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="img/logo.png" alt="EMSI E-Learning" width="200px">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Connexion</p>
        <form method="post">
          <?php if ($error_login) { ?>
            <div class="form-group login-error">
              <p><i class="fa fa-exclamation-triangle"></i> Email ou mot de passe incorrects !</p>
            </div>
          <?php } ?>
          <div class="form-group">
            <span class="error"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $remember_me_email ?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Mot de passe" name="password" value="<?= $remember_me_password ?>">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember-me" value="yes" <?= $remember_me_checked ?>> Se rappeler de moi
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
