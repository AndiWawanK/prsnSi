<?php
session_start();
  if(isset($_SESSION['username'])){
    header('location: guru/index.php');
  }
require_once "functions/Library.php";

$data = new Library();
$error = "";
if(isset($_POST['login'])){
  $username  = htmlspecialchars($_POST['username']);
  $password  = htmlspecialchars($_POST['password']);

  if(!empty(trim($username)) && !empty(trim($password))){

  $login  = $data->login($username,$password);
  $cekLogin = $data->cekLogin($username);

  while($row = $cekLogin->fetch(PDO::FETCH_OBJ)){
    $user[] = $row->level;
  }

  if($login != "False"){

     if($user[0] == 'guru'){
        $_SESSION['username'] = $username;
        header('location: guru');
      }else if($user[0] == 'siswa'){
        $_SESSION['username'] = $username;
        header('location: siswa');
      }
    }else{
      $error = "Mohon Periksa Kembali Username & Password Anda! ";
    }

}else{
  $error = "Anda Harus Mengisi Username & Password! ";
}

}


 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Presensi Siswa | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Login -->
    <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-4 col-md-offset-4">
        <div class="login">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="text-center">Selamat datang</h4>
            </div>
            <div class="panel-body">
              <form role="form" action="#" method="POST">
                <fieldset>
                  <div class="row">
                    <div class="center-block">
                      <img class="profile-img" src="assets/img/logo.png">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                          </span>
                          <input class="form-control" placeholder="No Induk Siswa" name="username" type="text" autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                          </span>
                          <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="login" data-loading-text="Login..." class="btn btn-lg btn-primary btn-block buton-presensi">Sign In <i class="fa fa-sign-in"></i></button>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <?php if($error != ''){ ?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $error; ?>
                  </div>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- End-Login -->

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
