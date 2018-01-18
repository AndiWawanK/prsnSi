<?php require_once "../template/header.php" ?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Absensi</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
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
                  <tr>
                    <td>XII</td>
                    <td>Teknik Komputer Jaringan</td>
                    <td>01/14/2018</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-cloud-download"></i> Download</button>
                      <button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>XII</td>
                    <td>Teknik Komputer Jaringan</td>
                    <td>01/13/2018</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-cloud-download"></i> Download</button>
                      <button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>XII</td>
                    <td>Teknik Komputer Jaringan</td>
                    <td>01/12/2018</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-cloud-download"></i> Download</button>
                      <button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button>
                    </td>
                  </tr>
                </tbody>
              </table>
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

<?php require_once "../template/footer.php" ?>
