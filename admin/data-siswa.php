<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'admin'){
  header('location: ../index.php');
}
$jurusan = "";
if(isset($_GET['jurusan'])){
  $sub = $_GET['jurusan'];
  // tampil_sub_jurusan($_GET['jurusan']);


}

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Data Siswa</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->

<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'TKJ'; ?>" class="thumbnail text-center">
      <h2>TKJ</h2>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'TKR'; ?>" class="thumbnail text-center">
      <h2>TKR</h2>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'TAV'; ?>" class="thumbnail text-center">
      <h2>TAV</h2>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'NKPI'; ?>" class="thumbnail text-center">
      <h2>NKPI</h2>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'AP'; ?>" class="thumbnail text-center">
      <h2>AP</h2>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'AKUTANSI'; ?>" class="thumbnail text-center">
      <h2>AK</h2>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'TATA NIAGA'; ?>" class="thumbnail text-center">
      <h2>TN</h2>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="tampil_kelas.php?jurusan=<?php echo $jurusan = 'TATA BUSANA'; ?>" class="thumbnail text-center">
      <h2>TB</h2>
    </a>
  </div>
</div>


<?php require_once "../template/footer.php"; ?>
