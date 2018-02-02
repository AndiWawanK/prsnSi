<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'admin'){
  header('location: ../index.php');
}
$siswa = $objectSiswa->presensi();
if(isset($_POST['cari'])){
  $kelas   = $_POST['kelas'];
  $jurusan = $_POST['jurusan'];

  if(!empty($kelas) && !empty($jurusan)){
    $siswa = $objectSiswa->cari($kelas,$jurusan);
  }
}
$sub = $objectSiswa->tampil_sub_jurusan($_GET['jurusan']);

// var_dump($sub_jur[1]);
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data_siswa.php">Data Siswa</a></li>
            <li class="active">Kelas</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->

<div class="container-fluid">
	<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <form class="form" action="" method="post">
            <div class="btn-group"> <!-- categori kelas -->
              <select class="form-control" name="kelas">
                <option>Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
              </select>
            </div>
            <div class="btn-group">
              <select class="form-control" name="jurusan">
                <option>Sub-Jurusan</option>

                <?php while($row = $sub->fetch()){ ?>
                   <option value="<?php echo $sub_jur = $row[0] ?>"><?php echo $sub_jur = $row[0] ?></option>
                <?php } ?>

              </select>
            </div>
            <div class="btn-group">
              <button type="submit" class="btn btn-success btn-sm buton-presensi" name="cari"><i class="fa fa-search"></i> Cari</button>
            </div>
          </form>
        </div>
        <div class="panel-body">
          <div class="table table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th>JENIS KELAMIN</th>
                  <th>ALAMAT</th>
                  <th>TANGGAL LAHIR</th>
                  <th>KELAS</th>
                  <th>JURUSAN</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($kelas) && !empty($jurusan)){
                  while($row = $siswa->fetch(PDO::FETCH_OBJ)){
                    echo "
                      <tr>
                        <td>$row->nis</td>
                        <td>$row->nama</td>
                        <td>$row->jenis_kelamin</td>
                        <td>$row->alamat</td>
                        <td>$row->tanggal_lahir</td>
                        <td>$row->kelas</td>
                        <td>$row->jurusan</td>
                        <td>
                          <a href='edit_siswa.php?id=$row->id_siswa' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                          <button class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</button>
                        </td>
                      </tr>
                    ";
                  }
                }else{
                  echo "
                  <table class='table table-bordered' style='margin-top:-20px;'>
                    <thead>
                      <tr>
                        <td class='text-center'>Silahkan Pilih Kelas dan Sub-Jurusan!</td>
                      <tr>
                    </thead>
                  </table>
                  ";
                }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>

<?php require_once "../template/footer.php"; ?>
