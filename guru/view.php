<?php
require_once "../template/header.php";
require_once "../functions/Library.php";
$siswa = new Library();
$view = $siswa->detailAbsen();

?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <td>NIS</td>
        <td>NAMA</td>
        <td>KELAS</td>
        <td>JURUSAN</td>
        <td>TANGGAL</td>
        <td>KETERANGAN</td>
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



<?php require_once "../template/footer.php"; ?>
