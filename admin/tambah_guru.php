<?php
require_once "../template/header.php";
$error = "";
$success = "";
  if(isset($_POST['submit'])){
    $nip    = htmlspecialchars($_POST['nip']);
    $nama   = htmlspecialchars($_POST['nama']);
    $tanggal_lahir  = htmlspecialchars($_POST['date']);
    $pangkat = htmlspecialchars($_POST['pangkat']);
    $status  = htmlspecialchars($_POST['status']);
    $mapel   = htmlspecialchars($_POST['mapel']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);

    $foto_profile = $_FILES['foto']['name'];
    $ukuran_gambar = $_FILES['foto']['size'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    //cek gambar extension
    $file_extension = ['jpg','jpeg','png'];
    $profile_extension = explode('.',$foto_profile);
    $profile_extension = strtolower(end($profile_extension));
      if(!in_array($profile_extension,$file_extension)){
        $error = "File Yang Di Upload Bukan Gambar!";
      }

    //cek ukuran gambar
    if($ukuran_gambar > 1000000){
        $error = "Ukuran File Terlalu Besar";
    }
    move_uploaded_file($tmp_name,"../assets/profile/".$foto_profile);

    $tambah_guru = $objectSiswa->tambah_guru($nip,$nama,$tanggal_lahir,$pangkat,$status,$mapel,$pendidikan,$foto_profile);
      if($tambah_guru == "True"){
        $success = "Data berhasil ditambahkan";
      }else{
        $error = "Ada Masalah Saat Menambah Data!";
      }
  }

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-guru.php">Data Guru</a></li>
            <li class="active">Tambah</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->
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

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" name="nip" class="form-control" placeholder="No Induk Pegawai">
          </div>
          <div class="form-grup">
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
          </div>
          <div class="form-group tanggal-lahir">
            <div class="input-group">
             <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
             </div>
             <input type="text" name="date" class="form-control" id="date" placeholder="MM/DD/YYYY">
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="pangkat" class="form-control" placeholder="Pangkat">
          </div>
          <div class="form-group">
            <input type="text" name="status" class="form-control" placeholder="Status">
          </div>
          <div class="form-group">
            <input type="text" name="mapel" class="form-control" placeholder="Mata Pelajaran">
          </div>
          <div class="form-group">
            <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan">
          </div>
          <div class="form-group">
            <label>Profile Guru</label>
            <input type="file" id="file" name="foto" onchange="return fileValidation()">
            <em>Ukuran Gambar Minimal 307 KB</em>
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-info buton-presensi">Submit</button>
          </div>
        </form>
      </div>
      <div class="col-md-4 text-center">
        <div class="preview-gambar" id="imagePreview">

        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "../template/footer.php" ?>
