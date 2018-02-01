<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'guru'){
  header('location: ../index.php');
}
$error = "";
$berhasil = "";
  if(isset($_POST["tambah"])){
    $nis      = htmlspecialchars($_POST["nis"]);
    $nama     = htmlspecialchars($_POST["nama"]);
    $kelas    = $_POST["kelas"];
    $jurusan  = $_POST["jurusan"];
    $semester = $_POST["semester"];

        if(!empty(trim($nis)) && !empty(trim($nama)) && !empty($kelas) && !empty($jurusan) && !empty($semester)){
          $tambah = $objectSiswa->tambahSiswa($nis,$nama,$kelas,$jurusan,$semester);
            if($tambah == "True"){
              $berhasil  = "Data Berhasil Di Tambahkan";
            }else{
              $error = "Anda Masalah Saat Menambahkan Data!";
            }
        }else{
          $error = "Semua Form Harus di Isi!!";
        }

  }
?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Data Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="update-data.php">Update Data Siswa</a></li>
            <li class="active">Tambah Data Siswa</a></li>
        </ol>
    </div>
</div>
<!-- Page Heading -->

<div class="container-fluid">
  <div class="col-md-12">
    <?php if($error != ''){ ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $error; ?>
      </div>
    <?php } ?>
    <?php if($berhasil != ''){ ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $berhasil; ?>
      </div>
    <?php } ?>
    <div class="panel panel-primary">
      <div class="panel-heading">Tambah Data Siswa</div>
      <div class="panel panel-body">
        <div class="col-md-8">
          <form class="form" action="" method="post">
            <div class="form-group">
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <input type="text" name="nis" class="form-control" placeholder="No Induk Siswa">
            </div>
            <div class="form-group">
              <select class="form-control" name="kelas">
                <option>Kelas:</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" name="jurusan">
                <option>Jurusan:</option>
                <option value="TKJ 1">TKJ 1</option>
                <option value="TKJ 2">TKJ 2</option>
                <option value="TKR 1">TKR 1</option>
                <option value="TKR 2">TKR 2</option>
                <option value="TAV">TAV</option>
                <option value="NKPI">NKPI</option>
                <option value="AP 1">AP 1</option>
                <option value="AP 2">AP 2</option>
                <option value="Akutansi">Akutansi</option>
                <option value="Tata Niaga">Tata Niaga</option>
                <option value="Tata Busana">Tata Busana</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" name="semester">
                <option>Semester:</option>
                <option value="semester 1">Semester 1</option>
                <option value="semester 2">Semester 2</option>
                <option value="semester 3">Semester 3</option>
                <option value="semester 4">Semester 4</option>
                <option value="semester 5">Semester 5</option>
                <option value="semester 6">Semester 6</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success buton-presensi" name="tambah"><span class="fa fa-plus"></span> Tambah Siswa</button>
            </div>
          </form>
        </div>
        <div class="col-md-4">
          <div class="icon-siswa text-center">
            <img src="../assets/img/siswa.png" alt="siswa" style="width:250px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require_once "../template/footer.php"; ?>
