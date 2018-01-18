<?php require_once "../template/header.php" ?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Data Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li class="active">Update Data Siswa</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->

<div class="container-fluid">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading"><h1></h1></div>
      <div class="panel-body">
        <form class="form" action="" method="post">
          <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Nama Siswa">
          </div>
          <div class="form-group">
            <input type="text" name="nis" class="form-control" placeholder="No Induk Siswa">
          </div>
          <div class="form-group">
            <select class="form-control" name="kelas">
              <option value="">Kelas</option>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="jurusan">
              <option value="">Jurusan</option>
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
              <option value="">Semester</option>
              <option value="semester 1">Semester 1</option>
              <option value="semester 2">Semester 2</option>
              <option value="semester 3">Semester 3</option>
              <option value="semester 4">Semester 4</option>
              <option value="semester 5">Semester 5</option>
              <option value="semester 6">Semester 6</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success buton-presensi" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<?php require_once "../template/footer.php" ?>
