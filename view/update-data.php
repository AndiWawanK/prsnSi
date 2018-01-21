<?php
require_once "../template/header.php";
require_once "../functions/Library.php";

$error = "";
$dataSiswa = new Library();
$perPage = 9;

$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$siswa = $dataSiswa->dataSiswa($start,$perPage);

$siswa1 = $dataSiswa->presensi();
while($row = $siswa1->fetch(PDO::FETCH_OBJ)){
  $datSis[] = $row;
}
$total = count($datSis);
$pages = ceil($total / $perPage );










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
      <!-- pagination -->
      <div class="pagination-siswa">
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



<?php require_once "../template/footer.php" ?>
