<?php
  require_once "../functions/Library.php";
  $cari = new Library();
    $keyword = $_GET['key'];
    $tampil_mapel = $cari->cari_mapel($keyword);
?>

<select multiple="multiple" id="mapel-select" name="my-select[]">
  <option disabled>Pilih Mata Pelajaran</option>
  <?php while($tampil = $tampil_mapel->fetch(PDO::FETCH_OBJ)){ ?>
  <option value='<?php echo $tampil->id_mapel; ?>'><?php echo $tampil->nama_mapel; ?></option>
  <?php } ?>
</select>
