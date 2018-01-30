<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'admin'){
  header('location: ../index.php');
}
$guru = $objectSiswa->data_guru();
if(isset($_GET['delet'])){
  $delete = $_GET['delet'];
  $delet = $objectSiswa->delete_data_guru($_GET['delet']);
  header('Refresh:0; url=data-guru.php');
}
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Guru</h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Data Guru</li>
        </ol>
    </div>
</div>
<!-- Page Heading -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="table table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>NIP</th>
              <th>NAMA</th>
              <th>TANGGAL LAHIR</th>
              <th>PANGKAT</th>
              <th>STATUS</th>
              <th>PENDIDIKAN</th>
              <th>DETAIL</th>
            </tr>
          </thead>
          <tbody>
            <?php

            while($row = $guru->fetch(PDO::FETCH_OBJ)){
              echo "
              <tr>
                <td>$row->id_guru</td>
                <td>$row->nip</td>
                <td>$row->nama</td>
                <td>$row->tanggal_lahir</td>
                <td>$row->pangkat</td>
                <td>$row->status</td>
                <td>$row->pendidikan</td>
                <td>
                  <a href='' id='$row->id_guru' class='btn btn-info btn-xs' data-toggle='modal' data-target='#myModal$row->id_guru'><i class='fa fa-eye'></i> View</a>
                  <a href='?delet=$row->id_guru' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a>
                  <div class='modal fade' id='myModal$row->id_guru' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                          <h4 class='modal-title' id='myModalLabel'>Detail Guru</h4>
                        </div>
                        <div class='modal-body'>


                        <div class='col-md-8'>
                        <table class='table table-bordered'>
                          <tr>
                            <th>NIP</th>
                            <td>$row->nip</td>
                          </tr>
                          <tr>
                            <th>NAMA</th>
                            <td>$row->nama</td>
                          </tr>
                          <tr>
                            <th>TANGGAL LAHIR</th>
                            <td>$row->tanggal_lahir</td>
                          </tr>
                          <tr>
                            <th>PANGKAT</th>
                            <td>$row->pangkat</td>
                          </tr>
                          <tr>
                            <th>STATUS</th>
                            <td>$row->status</td>
                          </tr>
                          <tr>
                            <th>PENDIDIKAN</th>
                            <td>$row->pendidikan</td>
                          </tr>
                          <tr>
                            <th>MATA PELAJARAN</th>
                            <td>Matematika</td><br>
                          </tr>
                        </table>
                        </div>
                        <div class='col-md-4 profile-guru text-center'>
                          <img src='../assets/profile/$row->foto_profile'>
                        </div>
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-default buton-presensi' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>
                          <a href='edit_guru.php?id=$row->id_guru' class='btn btn-primary buton-presensi'>Edit</a>
                        </div>
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
      </div>
    </div>
  </div>
</div>
<?php require_once "../template/footer.php" ?>
