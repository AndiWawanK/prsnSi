<?php
require_once "../template/header.php";
$ambil_kelas = $objectSiswa->ambil_kelas();
$tampil_mapel = $objectSiswa->tampil_mapel();
  if(isset($_GET['id'])){
    $guru = $objectSiswa->edit_guru($_GET['id']);
    $row  = $guru->fetch(PDO::FETCH_OBJ);
  }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Data Guru</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data_guru.php">Data Guru</a></li>
            <li class="active">Edit Data Guru</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <form action="" method="post">
        <div class="form-group">
          <input type="text" name="nip" class="form-control" value="<?php echo $row->nip ?>">
        </div>
        <div class="form-group">
          <input type="text" name="nama" class="form-control" value="<?php echo $row->nama ?>">
        </div>
        <div class="form-group tanggal-lahir">
          <div class="input-group">
           <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
           </div>
           <input type="text" name="date" class="form-control" id="date" value="<?php echo $row->tanggal_lahir ?>">
          </div>
        </div>
        <div class="form-group">
          <input type="text" name="pangkat" class="form-control" value="<?php echo $row->pangkat ?>">
        </div>
        <div class="form-group">
          <input type="text" name="status" class="form-control" value="<?php echo $row->status ?>">
        </div>
        <div class="form-group">
          <select multiple="multiple" id="my-select" name="my-select[]">
            <option disabled>Pilih Mata Pelajaran</option>
            <?php while($tampil = $tampil_mapel->fetch(PDO::FETCH_OBJ)){ ?>
            <option value='<?php echo $tampil->id_mapel; ?>'><?php echo $tampil->nama_mapel; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <input type="text" name="pendidikan" class="form-control" value="<?php echo $row->pendidikan ?>">
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
              <option value="<?php echo $ambil_k[0] ?>"><?php echo $ambil_k[0]; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Profile Guru</label>
          <input type="file" id="file" name="foto" onchange="return fileValidation()">
          <em>Ukuran Gambar Minimal 307 KB</em>
        </div>
        <div class="form-group">
          <button type="submit" name="update" class="btn btn-info buton-presensi">Update</button>
        </div>
      </form>
    </div> <!--end-col-md-4-->
    <div class="col-md-4 profile-guru text-center">
      <img src="../assets/profile/<?php echo $row->foto_profile; ?>" alt="">
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
