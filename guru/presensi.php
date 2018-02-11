<?php
 require_once "../template/header.php";
 if($_SESSION['status'] !== 'guru'){
   header('location: ../index.php');
 }
 $error = ""; //Menampilkan pesan error atau berhasil
 $error1= "";
 $kelas = ""; //menangkap nilai dari menu kelas
 $jurusan = ""; //menangkap nilai dari menu jurusan
 $semester = ""; //menangkap nilai dari menu semester


 $absen = $objectSiswa->presensi();
 if(isset($_POST["cari"])){
   $kelas = $_POST["kelas"];
   $jurusan = $_POST["jurusan"];
   $semester = $_POST["semester"];

   //cek apakah user memilih menu atau tidak
   // if(!empty($kelas) && !empty($jurusan) && !empty($semester)){
     // $semester = $_POST["keyword"];
     $absen = $objectSiswa->cari($kelas,$jurusan);
   // }else{
   //   $error1 = "Anda Harus Memilih Menu Presensi!";
   // }

}
   //proses jika presensi telah selesai
   if(isset($_POST['absen'])){
     //cek apakah keterangan presensi selesai di input

       $keterangan  = $_POST['keterangan'];
       $tanggal     = $_POST['date'];
       $id_siswa    = $_POST['id_siswa'];

       $kelas = $_POST['kelas'];
       $jurusan = $_POST['jurusan'];
       $rekapDate = $objectSiswa->rekapTanggal($kelas,$jurusan,$tanggal);
       // $rekapDate = $siswa->rekapTanggal($kelas,$jurusan,$tanggal);

        if(!empty($keterangan) && !empty($tanggal)){
         $ket  = $objectSiswa->keterangan($id_siswa,$keterangan,$tanggal);

         if($ket == "Success"){
           $error = "Presensi Berhasil !";
         }else{
           echo "Gagal";
         }
      }else{
        $error1 = "Anda Harus Mengisi Keterangan Absensi!";
      }
   }
  $cek_mapel = $objectSiswa->cek_mapel_guru($guru);
  // while($mapel = $cek_mapel->fetch(PDO::FETCH_OBJ)){
  //   $nama[] = $mapel->nama;
  //   $nama_mapel[] = $mapel->nama_mapel;
  // }


 ?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Presensi Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li class="active"></i>Presensi</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->

<!-- Form Presensi -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <form class="form" action="" method="post">
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
                <div class="btn-group"> <!-- categori jurusan -->
                  <select class="form-control" name="semester">
                    <option>Mata Pelajaran</option>
                    <?php while($mapel = $cek_mapel->fetch(PDO::FETCH_OBJ)){ ?>
                        <option value="<?php echo $mapel->nama_mapel; ?>"><?php echo $mapel->nama_mapel; ?></option>
                    <?php } ?>
                  </select>
                </div> <!-- ./categori jurusan -->
                <div class="btn-group">
                  <button type="submit" class="btn btn-success btn-sm" name="cari">Ok</button>
                </div>
              </form>
            </div>
            <div class="panel-body">
              <ul class="pil-categori">
                <li><span>Kelas : </span><?php echo $kelas; ?></li>
                <li><span>Jurusan : </span><?php echo $jurusan; ?></li>
                <li><span>Semester : </span><?php echo $semester; ?></li>
              </ul>
              <?php if($error != ''){ ?>
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $error; ?>
                </div>
              <?php } ?>

              <div class="table-responsive">
                <form action='' method='post'>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>NAMA</th>
                      <th>KELAS</th>
                      <th>JURUSAN</th>
                      <th>KETERANGAN</th>
                    </tr>
                  </thead>
                  <?php

                    if(!empty($kelas) && !empty($jurusan) && !empty($semester) ){

                      while($data = $absen->fetch(PDO::FETCH_OBJ)){

                        echo "<tr>";

                            echo"<td>$data->id_siswa</td>";
                            echo"<td>$data->nis</td>";
                            echo"<td>$data->nama</td>";
                            echo"<td>$data->kelas</td>";
                            echo"<td>$data->jurusan</td>";
                            echo"
                            <td>
                                <input type='checkbox' name='keterangan[]' value='hadir'> hadir
                                <input type='checkbox' name='keterangan[]' value='izin'> izin
                                <input type='checkbox' name='keterangan[]' value='alpha'> alpha

                                <input type='hidden' name='kelas' value='$data->kelas'>
                                <input type='hidden' name='jurusan' value='$data->jurusan'>
                                <input type='hidden' name='id_siswa[]' value='$data->id_siswa'>
                            </td>
                            ";
                        echo "</tr>";

                      }

                    }else{
                      echo "
                      <table class='table table-bordered' style='margin-top:-20px;'>
                        <thead>
                          <tr>
                            <td class='text-center'>Silahkan Pilih Menu Presensi Terlebih Dahulu</td>
                          <tr>
                        </thead>
                      </table>
                      ";
                        if(isset($_POST["cari"])){
                          $error1 = "Anda Harus Memilih Menu Sebelum Melakukan Presensi!";
                        }
                    }
                   ?>
                </table>
                <?php if($error1 != ''){ ?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $error1; ?>
                  </div>
                <?php } ?>
                <button type="submit" name="absen" class="btn btn-success buton-presensi">Submit Presensi</button>
                <div class="btn-group tanggal-presen">
                  <span class="calendar">Tanggal:</span> <input type="text" id="date" name="date" placeholder="Isi Tanggal">
                </div>
              </form><br>

              </div>
            </div>
        </div>
    </div>
</div>
<!-- Form Presensi -->


<?php require_once "../template/footer.php" ?>
