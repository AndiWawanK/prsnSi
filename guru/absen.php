<?php
  require_once "../functions/Library.php";

  $core = new Library;

  $kelas = $_POST['kelas'];
  $jurusan = $_POST['jurusan'];
  $tanggal = $_POST['tanggal'];

  $data = $core->absenByTanggal($kelas,$tanggal,$jurusan);
  $respon = array();

  while ($temp = $data->fetch(PDO::FETCH_ASSOC)) {
    $respon[] = $temp;
  }
  echo json_encode($respon);
 ?>
