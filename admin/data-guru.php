<?php
require_once "../template/header.php";
$guru = $objectSiswa->data_guru();
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
              <th>MAPEL</th>
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
                <td>$row->mapel</td>
                <td>$row->pendidikan</td>
                <td>
                  <a href='' id='$row->id_guru' class='btn btn-info btn-xs' data-toggle='modal' data-target='#myModal$row->id_guru'><i class='fa fa-eye'></i> View</a>
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
                            <th>MAPEL</th>
                            <td>$row->mapel</td>
                          </tr>
                          <tr>
                            <th>PENDIDIKAN</th>
                            <td>$row->pendidikan</td>
                          </tr>
                        </table>
                        </div>
                        <div class='col-md-4 profile-guru text-center'>
                          <img src='../assets/profile/$row->foto_profile'>
                        </div>
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-default buton-presensi' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>
                          <button type='button' class='btn btn-primary buton-presensi'>Edit</button>
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
