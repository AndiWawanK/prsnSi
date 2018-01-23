<?php
require_once "../template/header.php";

$cekLogin = $objectSiswa->cekLogin($guru);
$error = "";
$success = "";
while($row = $cekLogin->fetch(PDO::FETCH_OBJ)){
  $id_user = $row->id_user;
  $nama[]   = $row->nama_lengkap;
  $username[] = $row->username;
  $password = $row->password;
  $level[]   = $row->level;
}

if(isset($_POST['update'])){
  $id_user  = $_POST['id_user'];
  $password = htmlspecialchars($_POST['password1']);
  $validasi = htmlspecialchars($_POST['password2']);

  if(!empty(trim($password)) && !empty(trim($validasi))){
    if($password == $validasi){
      $update = $objectSiswa->updatePass($id_user,$password);

      if($update == "True"){
        $success = "Password Berhasil Di Update! ";
      }else{
        $error = "Ada Masalah Saat Update Password!";
      }
    }else{
      $error = "Konfirmasi Password Tidak Sama! ";
    }
  }else{
    $error = "Masukkan Password Baru Anda Terlebih Dahulu! ";
  }

}
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
           <small><i class="fa fa-gear"></i> Setting</small>
        </h1>
    </div>
</div>
<!-- Page Heading -->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="" method="post">
            <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
            <div class="form-group">
              <input type="text" class="form-control" name="nama" placeholder="Nama Guru" value="<?php echo $nama[0]; ?>" disabled>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nis" placeholder="NIP" value="<?php echo $username[0] ?>" disabled>
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" class="form-control" data-toggle="password" value="<?php echo $password ?>" disabled>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password1" placeholder="Password Baru">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password Baru" value="">
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-warning buton-presensi"><i class="fa fa-gear"></i> Update</button>
            </div>
          </form>
          <?php if($error != ''){ ?>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $error; ?>
            </div>
          <?php } ?>
          <?php if($success != ''){ ?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $success; ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
</div>

<?php require_once "../template/footer.php"; ?>
