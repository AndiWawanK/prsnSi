<?php
  require_once "../functions/Library.php";
  $cari = new Library();
    $keyword = $_GET['key'];
    $tampil_mapel = $cari->cari_mapel($keyword);

?>

  <!-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="../assets/img/switch.png">
  <link href="../assets/css/bootstrap-select.min.css" rel="stylesheet">

  <select multiple="multiple" id="mapel-select" name="my-select[]">
    <option disabled>Pilih Mata Pelajaran</option>
    <?php while($tampil = $tampil_mapel->fetch(PDO::FETCH_OBJ)){ ?>
    <option value='<?php echo $tampil->id_mapel ?>'><?php echo $tampil->nama_mapel ?></option>
    <?php } ?>
  </select>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrap-select.min.js"></script>
  <script src="../assets/js/jquery.multi-select.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#mapel-select').multiSelect();
    });
  </script>
