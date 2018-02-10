<?php
 //excel.php
 require_once "../functions/Library.php";

 header('Content-Type: application/vnd.ms-excel');
 header('Content-disposition: attachment; filename='.rand().'.xls');

 $core = new Library;

 $kelas = $_GET['kelas'];
 $jurusan = $_GET['jurusan'];
 $tanggal = $_GET['tanggal'];

 $data = $core->absenByTanggal($kelas,$tanggal,$jurusan); ?>

 <table border="1" id="employee_table">
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
     <?php
      while ($temp = $data->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$temp['nis']."</td><td>".$temp['nama']."</td><td>".$temp['kelas']."</td><td>".$temp['jurusan']."</td><td>".$temp['tanggal']."</td><td>".$temp['keterangan']."</td></tr>";
       }


      ?>
   </tbody>
 </table>
