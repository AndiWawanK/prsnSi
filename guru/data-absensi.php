<?php
require_once "../template/header.php";

$data = $objectSiswa->listAbsensi();
$view = $objectSiswa->detailAbsen();
if(isset($_GET['lihat'])){
    // $kelas = $_POST['kelas'];
    // $jurusan = $_POST['jurusan'];
    $view = $objectSiswa->detailAbsen($kelas,$jurusan);
    echo "true";
}

?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Rekap Absensi</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Data Absensi</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->

<!-- data-absensi -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8"> <!-- col-md-8 -->
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="btn-group"> <!-- categori kelas -->
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                  Pilih Kelas <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">X</a></li>
                  <li><a href="#">XI</a></li>
                  <li><a href="#">XII</a></li>
                </ul>
            </div> <!-- ./categori kelas -->
            <div class="btn-group"> <!-- categori jurusan -->
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                  Pilih Jurusan <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Teknik Komputer Jaringan</a></li>
                  <li><a href="#">Teknik Kendaraan Rinagan</a></li>
                  <li><a href="#">Teknik Audio Video</a></li>
                  <li><a href="#">Nautika Kapal Penangkap Ikan</a></li>
                  <li><a href="#">Adminstarsi Perkantoran</a></li>
                  <li><a href="#">Akutansi</a></li>
                  <li><a href="#">Tata Niaga</a></li>
                  <li><a href="#">Tata Busana</a></li>
                </ul>
            </div> <!-- ./categori jurusan -->
            <div class="btn-group">
              <button type="submit" class="btn btn-success btn-sm" name="cari">Cari</button>
            </div>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Kelas:</th>
                    <th>Jurusan:</th>
                    <th>Tanggal Presensi:</th>
                    <th>Download Presensi:</th>
                  </tr>
                </thead>
                <tbody>


              <?php
                while($row = $data->fetch(PDO::FETCH_OBJ)){
                    echo "
                     <tr>
                       <td>$row->kelas</td>
                       <td>$row->jurusan</td>
                       <td>$row->tanggal</td>
                       <td>

                           <a href='' class='btn btn-danger btn-xs'><i class='fa fa-cloud-download'></i> Download</a>
                           <button type='submit' class='btn btn-info btn-xs' name='lihat' data-toggle='modal' data-target='#myModal1'><i class='fa fa-eye'></i> View</button>
                           <input type='hidden' name='kelas' value='$row->kelas'>
                           <input type='hidden' name='jurusan' value='$row->jurusan'>

                     ";
                   }
                ?>


                  <!-- <tr>
                    <td>XII</td>
                    <td>Teknik Komputer Jaringan</td>
                    <td>01/14/2018</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-cloud-download"></i> Download</button>
                      <button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button>
                    </td>
                  </tr> -->

                </tbody>
              </table>
              <!-- <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1">Launch demo modal</button> -->
            </div>
          </div>
        </div>
      </div><!-- ./col-md-8 -->
      <div class="col-md-4">
        <div class="panel panel-success">
          <div class="panel-heading">Kategori Jurusan</div>
          <div class="panel-body">
            <div class="list-group">
              <a href="#" class="list-group-item"><b>Teknik Komputer Jaringan</b><span class="badge">24</span></a>
              <a href="#" class="list-group-item"><b>Teknik Kendaraan Ringan</b><span class="badge">14</span></a>
              <a href="#" class="list-group-item"><b>Teknik Audio Video</b><span class="badge">18</span></a>
              <a href="#" class="list-group-item"><b>Nautika Kapal Penangkap Ikan</b><span class="badge">12</span></a>
              <a href="#" class="list-group-item"><b>Adminstarsi Perkantoran</b><span class="badge">26</span></a>
              <a href="#" class="list-group-item"><b>Akutansi</b><span class="badge">26</span></a>
              <a href="#" class="list-group-item"><b>Tata Niaga</b><span class="badge">20</span></a>
              <a href="#" class="list-group-item"><b>Tata Busana</b><span class="badge">24</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- data-absensi -->

<div class='modal fade' id='myModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'>View Presensi</h4>
      </div>
      <div class='modal-body'>

          <div class='table table-responsive'>
            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th>NIS:</th>
                  <th>NAMA:</th>
                  <th>KELAS:</th>
                  <th>JURUSAN:</th>
                  <th>TANGGAL:</th>
                  <th>KETERANGAN:</th>
                </tr>
              </thead>
              <?php
              while($det = $view->fetch(PDO::FETCH_OBJ)){
                echo "
                <tr>
                  <td>$det->nis</td>
                  <td>$det->nama</td>
                  <td>$det->kelas</td>
                  <td>$det->jurusan</td>
                  <td>$det->tanggal</td>
                  <td>$det->keterangan</td>
                </tr>
                ";
              }
              ?>
            </table>
          </div>

      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-warning buton-presensi'>Update</button>
        <button type='button' class='btn btn-primary buton-presensi' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
</td>
</tr>


<?php require_once "../template/footer.php" ?>
