<?php
require_once "../template/header.php";

if($_SESSION['wali'] !== 'Y'){
  header('location: ../index.php');
}

$data  = $objectSiswa->jumlahData();
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
      <?php if($nama != ''){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo "Selamat Datang <b>".$nama[0]."</b>"; ?>
        </div>
      <?php } ?>
        <h1 class="page-header">
           <small>Dashboard Wali Kelas</small>
        </h1>
    </div>
</div>
<!-- Page Heading -->

<?php require_once "../template/footer.php"; ?>
