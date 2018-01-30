<?php ob_start(); ?>
<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'admin'){
  header('location: ../index.php');
}
$tampil = $objectSiswa->tampil_mapel();
if(isset($_POST['tambah'])){
  $mapel = htmlspecialchars($_POST['mapel']);
  if(!empty(trim($mapel))){
    $tambah = $objectSiswa->tambah_mapel($mapel);

    if($tambah == "True"){
      header('Refresh:0; url=tambah_mapel.php');
    }else{
      echo "Gagal";
    }
  }
}
if(isset($_GET['delete'])){
  $det = $_GET['delete'];
  $delete = $objectSiswa->delete_mapel($det);
  var_dump($delete);
}
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Mata Pelajaran</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Mata Pelajaran</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
        <form class="form-inline" action="" method="post">
          <div class="form-group">
            <input type="text" name="mapel" class="form-control" placeholder="Tambah Mata Pelajaran">
          </div>
          <div class="form-group">
            <button type="submit" name="tambah" class="btn btn-success buton-presensi"><i class="fa fa-plus"></i> Tambah</button>
          </div>
        </form><br>
        <div class="table table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Mata Pelajaran</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while($row = $tampil->fetch(PDO::FETCH_OBJ)){
                echo "
                <tr>
                  <td>$row->nama</td>
                  <td class='action-mapel'>
                  <button type='submit' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</button>
                  <a href='?delete=$row->id_mapel' type='submit' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a>
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
</div>
<?php require_once "../template/footer.php";?>
<?php ob_flush(); ?>
