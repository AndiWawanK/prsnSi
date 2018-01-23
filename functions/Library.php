<?php

  class Library{

    public function __construct(){
      $this->db = new PDO('mysql:host=localhost;dbname=absensiSiswa;','root','root');
    }

    //menampilkan seluruh data dari database
    public function presensi(){
      $sql    = "SELECT * FROM siswa";
      $query  = $this->db->query($sql);
      return $query;
    }
    //pagination pada table data siswa
    public function dataSiswa($start,$perPage){
      $sql   = "SELECT * FROM siswa LIMIT $start , $perPage";
      $query = $this->db->query($sql);
      return $query;
    }

    //hitung jumlah data
    public function jumlahData(){
      $sql    = "SELECT * FROM siswa";
      $query  = $this->db->query($sql);


      while($row = $query->fetch(PDO::FETCH_OBJ)){
        $siswa[] = $row;
      }
      $jmlSiswa = count($siswa);
      return $jmlSiswa;
    }

    //keterangan absensi
    public function keterangan($id_siswa,$keterangan,$tanggal){
      $jumlah = count($keterangan);
      for($x=0;$x<$jumlah;$x++){
        $query = $this->db->query("INSERT INTO keterangan VALUES ('$id_siswa[$x]','$keterangan[$x]','$tanggal')");
      }
        if(!$query){
          return "Failed";
        }else{
          return "Success";
        }

    }

    //menu rekap untuk menampilkan presensi berdasarkan tanggal presensi
    public function rekapTanggal($kelas,$jurusan,$tanggal){
      $sql    = "INSERT INTO jurusan VALUES ('','$kelas','$jurusan','$tanggal') ";
      $query  = $this->db->query($sql);
      return $query;
    }

    //cari data sesuai menu dropdown
    public function cari($kelas,$jurusan){
      $sql   = "SELECT * FROM siswa WHERE kelas = '$kelas' && jurusan = '$jurusan' ";
      $query = $this->db->query($sql);
      return $query;
    }

    //cari data yang akan di update berdasarkan nis
    public function cariNis($nis,$nama){
      $sql   = "SELECT * FROM siswa WHERE nis LIKE '%$nis%'
                OR nama LIKE '%$nama%'";
      $query = $this->db->query($sql);
      return $query;
      //cek nis
      // if($query->fetch() != 0){
      //   return $query;
      // }else{
      //   return "False";
      // }

    }

    //tambah data siswa
    public function tambahSiswa($nis,$nama,$kelas,$jurusan,$semester){
      $sql    = "INSERT INTO siswa (nis,nama,kelas,jurusan,semester)
                 VALUES ('$nis','$nama','$kelas','$jurusan','$semester')";
      $query  = $this->db->query($sql);

        if(!$query){
          return "False";
        }else{
          return "True";
        }
    }

    //update data siswa
    public function updateData($id_siswa,$nis,$nama,$kelas,$jurusan,$semester){
      $sql    = "UPDATE siswa SET nis='$nis',nama='$nama',kelas='$kelas',
                 jurusan='$jurusan',semester='$semester' WHERE id_siswa='$id_siswa' ";
      $query  = $this->db->query($sql);
        if(!$query){
          return "False";
        }else{
          return "True";
        }
    }

    //rekap data absensi
    public function listAbsensi(){
      $sql   = "SELECT * FROM jurusan";
      $query = $this->db->query($sql);
      return $query;
    }

    // public function detailAbsen($jurusan,$id_siswa){
    //   $sql   = "SELECT siswa.nis , siswa.nama , siswa.kelas , siswa.jurusan , keterangan.keterangan
    //             FROM siswa INNER JOIN keterangan ON siswa.id_siswa = keterangan.id_siswa";
    //   $query = $this->db->query($sql);
    //   return $query;
    // }

    public function detailAbsen(){
      $sql    = "SELECT siswa.nis , siswa.nama , siswa.kelas , jurusan.jurusan , keterangan.tanggal , keterangan.keterangan
      FROM siswa
      INNER JOIN jurusan
      INNER JOIN keterangan ON siswa.id_siswa = keterangan.id_siswa
      WHERE siswa.kelas = 'XII' AND jurusan.jurusan = 'TKJ 1'";
      $query = $this->db->query($sql);
      return $query;
    }

    //login
    public function login($username,$password){
      $sql    = "SELECT username,password FROM users WHERE username = (('$username'))
                 AND password = (('$password')) LIMIT 0,1 ";
      $query  = $this->db->query($sql);
        if($query->fetch() > 0){
          return $query;
        }else{
          return "False";
        }
    }
   //cek level login
    public function cekLogin($username){
      $sql   = "SELECT * FROM users WHERE username = '$username' ";
      $query = $this->db->query($sql);
      // $cek = $query->fetch();
      return $query;
    }

    //change password guru/siswa
    public function updatePass($id_user,$password){
      $sql   = "UPDATE users SET password = '$password' WHERE id_user = '$id_user' ";
      $query = $this->db->query($sql);
      if(!$query){
        return "False";
      }else{
        return "True";
      }
    }

}
 ?>
