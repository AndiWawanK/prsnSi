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

    //keterangan absensi
    public function keterangan($keterangan,$tanggal){
      $jumlah = count($keterangan);
      for($x=0;$x<$jumlah;$x++){
      $query = $this->db->query("INSERT INTO keterangan VALUES ('','$keterangan[$x]','$tanggal')");
      }
        if(!$query){
          return "Failed";
        }else{
          return "Success";
        }

    }

    //cari data sesuai menu dropdown
    public function cari($kelas,$jurusan){
      $sql   = "SELECT * FROM siswa WHERE kelas = '$kelas' && jurusan = '$jurusan' ";
      $query = $this->db->query($sql);
      return $query;
    }

    //cari data yang akan di update berdasarkan nis
    public function cariNis($nis){
      $sql   = "SELECT * FROM siswa WHERE nis = '$nis'";
      $query = $this->db->query($sql);
      return $query;
      //cek nis
      // if($query->fetch() > 0){
      //   return $query;
      // }else{
      //   return "False";
      // }

    }

    public function cekNis(){
      $cek   = "SELECT nis FROM siswa ";
      $query = $this->db->query($cek);
      if($query->fetch() > 0){
        return $query;
      }else{
        return "False";
      }
    }

}
 ?>
