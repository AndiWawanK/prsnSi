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

    //Data Guru
    public function data_guru(){
      $sql    = "SELECT * FROM guru";
      $query  = $this->db->query($sql);
      return $query;
    }
    //tambah data guru
    public function tambah_guru($nip,$nama,$tanggal_lahir,$pangkat,$status,$pendidikan,$foto_profile){
      $sql    = "INSERT INTO guru (nip,nama,tanggal_lahir,pangkat,status,pendidikan,foto_profile)
                 VALUES ('$nip','$nama','$tanggal_lahir','$pangkat','$status','$pendidikan','$foto_profile')";
      $query  = $this->db->query($sql);
        if(!$query){
          return "False";
        }else{
          return "True";
        }
      }

      //tambah user
      public function tambah_user($nama_lengkap,$username,$password,$wali){
        $sql   = "INSERT INTO users VALUES ('','$nama_lengkap','$username','$password','guru','$wali')";
        $query = $this->db->query($sql);
        if(!$query){
          return "False";
        }else{
          return "True";
        }
      }
      //tampilkan semua kelas yang ada
      public function ambil_kelas(){
        $sql   = "SELECT DISTINCT jurusan FROM siswa";
        $query = $this->db->query($sql);
        return $query;
      }
      //input data ke table wali
      public function input_wali($username,$kelas){
        $sql   = "INSERT INTO wali VALUES ('$username','$kelas')";
        $query = $this->db->query($sql);
        if(!$query){
          return "False";
        }else{
          return "True";
        }
      }

      //untuk anu ini yang ke mapel guru
      public function mapel_guru($id_guru,$id_mapel){
        $sql   = "INSERT INTO mapel_guru VALUES ('$id_guru','$id_mapel')";
        $query = $this->db->query($sql);
        if(!$query){
          return "False";
        }else{
          return "True";
        }
      }
      //max id guru
      public function max_guru(){
        $sql   = "SELECT MAX(id_guru) AS 'id_guru' FROM guru";
        $query = $this->db->query($sql);
        return $query;
      }
    //tampil sub jurusan
    public function tampil_sub_jurusan($jurusan){
      $sql   = "SELECT DISTINCT jurusan FROM siswa WHERE jurusan LIKE '%$jurusan%'";
      $query = $this->db->query($sql);
      return $query;
    }

    //tambah mata pelajaran
    public function tambah_mapel($mapel){
      $sql   = "INSERT INTO mapel VALUES ('','$mapel')";
      $query = $this->db->query($sql);
      if(!$query){
        return "False";
      }else{
        return "True";
      }
    }
    //Tampil mata pelajaran
    public function tampil_mapel(){
      $sql   = "SELECT * FROM mapel";
      $query = $this->db->query($sql);
      return $query;
    }
    //delete mapel
    public function delete_mapel($id_mapel){
      $sql   = "DELETE * FROM mapel WHERE id_mapel='$id_mapel'";
      $query = $this->db->query($sql);
      if(!$query){
        return "False";
      }else{
        return "True";
      }

    }
}
 ?>
