<?php ob_start(); ?>
<?php
session_start();
require_once "../functions/Library.php";
$objectSiswa = new Library();

  if(!isset($_SESSION['username']) OR !isset($_SESSION['status'])){
    header('location: ../index.php');
  }else{
    $guru = $_SESSION['username'];
  }

$cekLogin = $objectSiswa->cekLogin($guru);

while($row = $cekLogin->fetch(PDO::FETCH_OBJ)){
  $user[] = $row->level;
  $nama[] = $row->nama_lengkap;
  $foto[] = $row->foto_profile;
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Absensi</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="../assets/css/sb-admin.css" rel="stylesheet">
  <link href="../assets/css/plugins/morris.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">
  <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/multi-select.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/img/switch.png">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css">
  <script src="../assets/js/jquery.js"></script>

</head>
<body>

    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Absensi <b>Siswa</b></a>
          </div>

          <!-- Menu left -->
          <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                  <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; <b class="caret"></b></a> -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/profile/<?php echo $foto[0] ?>"></i>&nbsp; <?php echo $nama[0]; ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="setting.php"><i class="fa fa-fw fa-gear"></i> Settings</a></li>
                    <li><a href="../template/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    <!-- <li class="divider"></li> -->
                  </ul>
              </li>
          </ul>
          <!-- Menu left -->

          <!-- Menu Sidebar -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">

              <?php if($user[0] == 'guru'){ ?>
                <li><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                <li><a href="presensi.php"><i class="fa fa-fw fa fa-hospital-o"></i> Prensesi</a></li>
                <li><a href="data-absensi.php"><i class="fa fa-fw fa-table"></i> Rekap Absensi</a></li>
                <li><a href="update-data.php"><i class="fa fa-fw fa-edit"></i> Update Data Siswa</a></li>

              <?php }else if($user[0] == 'admin'){ ?>
                <li><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#" class="toggle-custom" id="btn-1" data-toggle="collapse" data-target="#dataguru" aria-expanded="false"><span class="fa fa-tw fa-tasks" aria-hidden="true"></span> Data Guru</a>
                  <ul class="nav collapse" id="dataguru" role="menu" aria-labelledby="btn-1">
                    <li><a href="data-guru.php"><i class="fa fa-database"></i> Data Guru</a></li>
                    <li><a href="tambah_guru.php"><i class="fa fa-plus"></i> Tambah</a></li>
                  </ul>
                </li>
                <li><a href="#" class="toggle-custom" id="btn-1" data-toggle="collapse" data-target="#datasiswa" aria-expanded="false"><span class="fa fa-tw fa-graduation-cap" aria-hidden="true"></span> Data Siswa</a>
                  <ul class="nav collapse" id="datasiswa" role="menu" aria-labelledby="btn-1">
                    <li><a href="data-siswa.php"><i class="fa fa-database"></i> Data Siswa</a></li>
                    <li><a href="tambah_siswa.php"><i class="fa fa-plus"></i> Tambah</a></li>
                  </ul>
                </li>
                <li><a href="tambah_mapel.php"><i class="fa fa-book"></i> Mata Pelajaran</a></li>

              <?php }else{ ?>
              <?php } ?>
              </ul>
          </div>
          <!-- Menu Sidebar -->
      </nav> <!-- navbar-collapse -->

      <div id="page-wrapper" class="page-wrapper">
          <div class="container-fluid">
