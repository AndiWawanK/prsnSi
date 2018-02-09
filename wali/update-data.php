<?php ob_start(); ?>
<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'guru'){
  header('location: ../index.php');
}

$error = "";
$perPage = 9;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$siswa = $objectSiswa->dataSiswa($start,$perPage);

$siswa1 = $objectSiswa->presensi();
while($row = $siswa1->fetch(PDO::FETCH_OBJ)){
  $datSis[] = $row;
}
$total = count($datSis);
$pages = ceil($total / $perPage );


  if(isset($_POST["search"])){
    $nis = $_POST["keyword"];
    $nama = $_POST["keyword"];
    if(!empty(trim($nis)) && !empty(trim($nama))){
      $siswa = $objectSiswa->cariNis($nis,$nama);
    }else{
      $error = "Form Pencarian Tidak Boleh Kosong!";
    }
  }


if(isset($_POST['save'])){
    $id_siswa = $_POST['id_siswa'];
    $nis  = htmlspecialchars($_POST['nis']);
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $semester = htmlspecialchars($_POST['semester']);

    if(!empty(trim($nis)) && !empty(trim($nama)) && !empty(trim($kelas)) && !empty(trim($jurusan)) && !empty(trim($semester))){
      $updateSiswa  = $objectSiswa->updateDataSiswa($id_siswa,$nis,$nama,$kelas,$jurusan,$semester);

      if($updateSiswa == "True"){
        // echo "<script>location.reload();</script>";
        header('Refresh:0; url=update-data.php');
      }
    }


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

<div class="row">
  <div class="col-md-12">
    <?php if($error != ''){ ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $error; ?>
      </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <form class="form" action="" method="post">
          <div class="btn-group">
            <a href="tambah.php" class="btn btn-warning buton-presensi"><span class="fa fa-plus"></span> Tambah</a>
          </div>
          <div class="btn-group">
              <input type="text" class="form-control" name="keyword" placeholder="Search nis">
          </div>
          <div class="btn-group cari-box">
            <button type="submit" class="btn btn-success buton-presensi" name="search"><span class="fa fa-search"></span></button>
            <button type="submit" class="btn btn-warning" name="reset"><span class="fa fa-times"></span></button>
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
                    <button id='$data->id_siswa' class='btn btn-info btn-xs' data-toggle='modal' data-target='#myModal$data->id_siswa'><i class='fa fa-edit'></i> Edit</button>
                    <div class='modal fade' id='myModal$data->id_siswa' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h4 class='modal-title' id='myModalLabel'>Edit Data Siswa</h4>
                          </div>
                          <div class='modal-body'>
                          <table class='table table-bordered'>
                            <thead>
                              <tr>
                                <th>NIS</th>
                                <th>NAMA</th>
                                <th>KELAS</th>
                                <th>JURUSAN</th>
                                <th>SEMESTER</th>
                              </tr>
                            </thead>
                            <form class='form' action='' method='post'>
                            <tbody>
                              <tr>
                                <input type='hidden' class='form-control' name='id_siswa' value='$data->id_siswa'>
                                <td><input type='text' class='form-control' name='nis' value='$data->nis'></td>
                                <td><input type='text' class='form-control' name='nama' value='$data->nama'></td>
                                <td><input type='text' class='form-control' name='kelas' value='$data->kelas'></td>
                                <td><input type='text' class='form-control' name='jurusan' value='$data->jurusan'></td>
                                <td><input type='text' class='form-control' name='semester' value='$data->semester'></td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                            <button type='submit' name='save' class='btn btn-primary'>Save changes</button>
                          </div>
                          </form>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                  </td>
                </tr>
                ";
              }
               ?>
            </tbody>
          </table>
      <!-- pagination -->
      <div class="pagination-siswa text-center">
        <ul class="pagination pagination-sm">
          <?php if($page <= 1){ ?>
            <li class="previous disabled"><a href="">&laquo;</a></li>
          <?php } ?>

          <?php if($page > 1){ ?>
            <li><a href="?page=<?= $page - 1; ?>">&laquo;</a></li>
          <?php } ?>
            <?php for($i=1; $i<=$pages; $i++){ ?>
                <li><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php } ?>
          <?php if($page < $pages){ ?>
            <li><a href="?page=<?= $page + 1; ?>">&raquo;</a></li>
          <?php } ?>

          <?php if($page >= $pages){ ?>
            <li class="previous disabled"><a href="">&raquo;</a></li>
          <?php } ?>
        </ul>
      </div>
      <!-- pagination -->
    </div>
  </div>
</div>

<!-- modal-edit -->
</div>
</div>




<!-- modal-edit -->

<?php require_once "../template/footer.php" ?>
<?php ob_flush(); ?>
