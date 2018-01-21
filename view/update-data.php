<?php
require_once "../template/header.php";
require_once "../functions/Library.php";
$error = "";
$dataSiswa = new Library();
$siswa = $dataSiswa->presensi();

  if(isset($_POST["search"])){
    $nis = $_POST["keyword"];
    $nama = $_POST["keyword"];
    $siswa = $dataSiswa->cariNis($nis,$nama);

  }

?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Data Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Update Data Siswa</li>
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
    <nav class="navbar navbar-inverse" style="border-radius:0px;">
      <form class="navbar-form navbar-left" action="" method="post">
        <div class="form-group">
          <a href="tambah.php" class="btn btn-warning buton-presensi"><span class="fa fa-plus"></span> Tambah</a>
          <input type="text" class="form-control" name="keyword" placeholder="Search nis">
        </div>
        <button type="submit" class="btn btn-success" name="search"><span class="fa fa-search"></span> Cari</button>
        <button type="submit" class="btn btn-warning" name="search"><span class="fa fa-plus"></span></button>
      </form>
    </nav>
    <div class="table table-responsive" style="margin-top:-20px;">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NIS</th>
            <th>NAMA</th>
            <th>KELAS</th>
            <th>JURUSAN</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while($data = $siswa->fetch(PDO::FETCH_OBJ)){
            echo "
            <tr>
              <td>$data->nis</td>
              <td>$data->nama</td>
              <td>$data->kelas</td>
              <td>$data->jurusan</td>
              <td>
                <button class='btn btn-info btn-xs'><span class='fa fa-edit'</span> Edit</button>
                <button class='btn btn-danger btn-xs'><span class='fa fa-trash'</span> Delete</button>
              </td>
            </tr>
            ";
          }

           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?php require_once "../template/footer.php" ?>
