<?php
require_once "../template/header.php";

if($_SESSION['status'] !== 'guru'){
  header('location: ../index.php');
}



$data = $objectSiswa->listAbsensi();

if(isset($_GET['lihat'])){
    // $kelas = $_POST['kelas'];
    // $jurusan = $_POST['jurusan'];
    $view = $objectSiswa->detailAbsen($kelas,$jurusan);
    echo "true";
}

if(isset($_POST["cari"])){
  $kelas = $_POST["kelas"];
  $jurusan = $_POST["jurusan"];

    $data = $objectSiswa->cariKelasRekap($kelas,$jurusan);
}
if(isset($_GET['delet'])){
  $delt = $_GET['delet'];
  $del = $objectSiswa->deletPresensi($delt);
  header('Refresh:0; url=data-absensi.php');
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
            <form action="" method="post">
              <div class="btn-group"> <!-- categori kelas -->
                <select class="form-control" name="kelas">
                  <option>Kelas:</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div> <!-- ./categori kelas -->
              <div class="btn-group"> <!-- categori jurusan -->
                <select class="form-control" name="jurusan">
                  <option>Jurusan:</option>
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
              </div> <!-- ./categori jurusan -->
              <div class="btn-group">
                <button type="submit" class="btn btn-success btn-sm" name="cari">Cari</button>
              </div>
            </form>
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
                    <th>Checklis All
                      <input type="checkbox" name="select-all" id="select-all">
                    </th>
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

                           <a href='' class='btn btn-warning btn-xs'><i class='fa fa-cloud-download'></i> Download</a>
                           <button data-toggle='modal' data-target='#myModal1' type='submit' class='btn btn-info btn-xs' name='lihat'  onclick='absen(\"".$row->kelas."\",\"".$row->jurusan."\",\"".$row->tanggal."\")'><i class='fa fa-eye'></i> View</button>
                           <a href='?delet=$row->id_tanggal' type='submit' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a>
                       </td>
                       <td>
                          <input type='checkbox' name='checkbox-1'>
                       </td>
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
          <h3 id="status"></h3>
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
              <tbody id='bodyTabel'>

              </tbody>
            </table>
          </div>

      </div>
      <div class='modal-footer foter-absen'>
        <button type='button' class='btn btn-primary buton-presensi' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>
      </div>
    </div>
  </div>
</div>
</td>
</tr>
<script type="text/javascript">


    $('#select-all').click(function(event){
      if(this.checked){
        $(':checkbox').each(function(){
          this.checked = true;
        });
      }else{
        $(':checkbox').each(function(){
          this.checked = false;
        });
      }
    });


</script>


<?php require_once "../template/footer.php" ?>
