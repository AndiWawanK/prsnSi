<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'admin'){
  header('location: ../index.php');
}
$error = "";
$success = "";
$ambil_kelas = $objectSiswa->ambil_kelas();
$tampil_mapel = $objectSiswa->tampil_mapel();

  if(isset($_POST['submit'])){
    $nip    = htmlspecialchars($_POST['nip']);
    $nama   = htmlspecialchars($_POST['nama']);
    $tanggal_lahir  = htmlspecialchars($_POST['date']);
    $pangkat = htmlspecialchars($_POST['pangkat']);
    $status  = htmlspecialchars($_POST['status']);
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

    $tambah_guru = $objectSiswa->tambah_guru($nip,$nama,$tanggal_lahir,$pangkat,$status,$pendidikan,$foto_profile);
      if($tambah_guru == "True"){
        $success = "Data berhasil ditambahkan";
      }else{
        $error = "Ada Masalah Saat Menambah Data!";
      }
      $id_guru = $objectSiswa->max_guru();
      while($sam = $id_guru->fetch(PDO::FETCH_OBJ)){
        $kau = $sam->id_guru;
      }
      $id_guru = $kau;
      $pelajaran = $_POST['my-select'];
      foreach ($pelajaran as $value) {
        $objectSiswa->mapel_guru($id_guru,$value);
      }

      //tambah user login guru
      if($_POST['wali'] == 'Y'){
        $wali = 'Y';
        $kelas = $_POST['kelas'];
        $objectSiswa->input_wali($nip,$kelas);
      }else{
        $wali = 'T';
      }
      $objectSiswa->tambah_user($nama,$nip,$tanggal_lahir,$wali);

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
             <input type="text" name="date" class="form-control" id="date" placeholder="Tanggal Lahir / MM/DD/YYYY">
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="pangkat" class="form-control" placeholder="Pangkat">
          </div>
          <div class="form-group">
            <input type="text" name="status" class="form-control" placeholder="Status">
          </div>
          <div class="form-group">
            <select multiple="multiple" id="my-select" name="my-select[]">
              <option disabled>Pilih Mata Pelajaran</option>
              <?php while($tampil = $tampil_mapel->fetch(PDO::FETCH_OBJ)){ ?>
              <option value='<?php echo $tampil->id_mapel; ?>'><?php echo $tampil->nama; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan">
          </div>
          <div class="form-group">
            <label for="wali">Wali?</label>
            <select class="form-control" id="wali" name="wali" onchange="disable_kelas()">
              <option value="T">Tidak</option>
              <option value="Y">Ya</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" id="kelas" name="kelas" disabled>
              <option>Pilih Kelas</option>
              <?php while($ambil_k = $ambil_kelas->fetch()){ ?>
                <option value="<?php echo $ambil_k[0]; ?>"><?php echo $ambil_k[0]; ?></option>
              <?php } ?>
            </select>
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
<script type="text/javascript">
  function disable_kelas(){
    var pilihan = $('#wali').val();
    if (pilihan === 'Y') {
      $('#kelas').prop('disabled',false);
    } else {
      $('#kelas').prop('disabled',true);
    }
  }
</script>
<?php require_once "../template/footer.php" ?>
