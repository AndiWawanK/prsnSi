<?php
require_once "../template/header.php";

$success = "";
$error = "";

if(isset($_GET['id'])){
  $siswa = $objectSiswa->edit_siswa($_GET['id']);
  $row = $siswa->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST['update'])){
  $id_siswa   = $_POST['id_siswa'];
  $nis        = htmlspecialchars($_POST['nis']);
  $nama       = htmlspecialchars($_POST['nama']);
  $jenis_kel  = $_POST['jenis_kelamin'];
  $alamat     = htmlspecialchars($_POST['alamat']);
  $tanggal_lahir = htmlspecialchars($_POST['date']);
  $kelas      = $_POST['kelas'];
  $jurusan    = $_POST['jurusan'];
  $semester   = $_POST['semester'];

  $update  = $objectSiswa->update_data_siswa($id_siswa,$nis,$nama,$jenis_kel,$alamat,$tanggal_lahir,$kelas,$jurusan,$semester);
  if($update  == "True"){
    $success  = "Data Berhasil Di Update!";
  }else{
    $error  = "Ada Masalah Saat Mengupdate Data!";
  }
}

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Data Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="tampil_kelas.php">Data Siswa</a></li>
            <li class="active">Edit Data Siswa</a></li>
        </ol>
    </div>
</div>
<!-- Page Heading -->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
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
      <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Siswa</div>
        <div class="panel panel-body">
          <div class="col-md-8">
            <form class="form" action="" method="post">
              <input type="hidden" name="id_siswa" value="<?php echo $row->id_siswa ?>">
              <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $row->nama ?>">
              </div>
              <div class="form-group">
                <input type="text" name="nis" class="form-control" placeholder="No Induk Siswa" value="<?php echo $row->nis ?>">
              </div>
              <div class="form-group">
                <select class="form-control" name="jenis_kelamin">
                  <option>Jenis Kelamin</option>
                  <option value="<?php echo $row->jenis_kelamin ?>" selected><?php echo $row->jenis_kelamin ?></option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"><?php echo $row->alamat ?></textarea>
              </div>
              <div class="form-group tanggal-lahir">
                <div class="input-group">
                 <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                 </div>
                 <input type="text" name="date" class="form-control" id="date" placeholder="Tanggal Lahir / MM/DD/YYYY" value="<?php echo $row->tanggal_lahir ?>">
                </div>
              </div>
              <div class="form-group">
                <select class="form-control" name="kelas">
                  <option>Kelas:</option>
                  <option value="<?php echo $row->kelas ?>" selected><?php echo $row->kelas ?></option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="jurusan">
                  <option>Jurusan:</option>
                  <option value="<?php echo $row->jurusan ?>" selected><?php echo $row->jurusan ?></option>
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
                <button type="submit" class="btn btn-success buton-presensi" name="update"><span class="fa fa-plus"></span> Tambah Siswa</button>
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
</div>


<?php require_once "../template/footer.php"; ?>
