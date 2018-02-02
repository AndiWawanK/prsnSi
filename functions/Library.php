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
    public function tambahSiswa($nis,$nama,$jenis_kel,$alamat,$tanggal_lahir,$kelas,$jurusan,$semester){
      $sql    = "INSERT INTO siswa (nis,nama,jenis_kelamin,alamat,tanggal_lahir,kelas,jurusan,semester)
                 VALUES ('$nis','$nama','$jenis_kel','$alamat','$tanggal_lahir','$kelas','$jurusan','$semester')";
      $query  = $this->db->query($sql);

        if(!$query){
          return "False";
        }else{
          return "True";
        }
    }

    public function absenByTanggal($kelas,$tanggal,$jurusan)
    {
      $sql = "SELECT * FROM `siswa` INNER JOIN keterangan ON siswa.id_siswa=keterangan.id_siswa WHERE siswa.kelas='$kelas' AND siswa.jurusan='$jurusan' AND keterangan.tanggal='$tanggal'";
      $query = $this->db->query($sql);
      return $query;
    }

    //update data siswa
    public function update_data_siswa($id_siswa,$nis,$nama,$jenis_kel,$alamat,$tanggal_lahir,$kelas,$jurusan,$semester){
      $sql    = "UPDATE siswa SET nis='$nis',nama='$nama',
                 jenis_kelamin='$jenis_kel',alamat='$alamat',tanggal_lahir='$tanggal_lahir',kelas='$kelas',
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

    //cari kelas dan jurusan (rekap)
    public function cariKelasRekap($kelas,$jurusan){
      $sql   = "SELECT * FROM jurusan WHERE kelas = '$kelas' AND jurusan = '$jurusan' ";
      $query = $this->db->query($sql);
      return $query;
    }
    //delete rekap absensi
    public function deletPresensi($id_tanggal){
      $sql   = "DELETE FROM jurusan WHERE id_tanggal ='$id_tanggal'";
      $query = $this->db->query($sql);
      return $query;
    }
    // public function detailAbsen($jurusan,$id_siswa){
    //   $sql   = "SELECT siswa.nis , siswa.nama , siswa.kelas , siswa.jurusan , keterangan.keterangan
    //             FROM siswa INNER JOIN keterangan ON siswa.id_siswa = keterangan.id_siswa";
    //   $query = $this->db->query($sql);
    //   return $query;
    // }

    // public function detailAbsen(){
    //   $sql    = "SELECT siswa.nis , siswa.nama , siswa.kelas , jurusan.jurusan , keterangan.tanggal , keterangan.keterangan
    //   FROM siswa
    //   INNER JOIN jurusan
    //   INNER JOIN keterangan ON siswa.id_siswa = keterangan.id_siswa
    //   WHERE siswa.kelas = 'XII' AND jurusan.jurusan = 'TKJ 1'";
    //   $query = $this->db->query($sql);
    //   return $query;
    // }

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
    //cek mata pelajaran guru ketika login
    public function cek_mapel_guru($nip){
      $sql   = "SELECT guru.nama , mapel.nama_mapel , mapel_guru.id_guru
                FROM guru
                INNER JOIN mapel_guru ON guru.id_guru = mapel_guru.id_guru
                INNER JOIN mapel ON mapel_guru.id_mapel = mapel.id_mapel
                WHERE guru.nip = '$nip'";
      $query = $this->db->query($sql);
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
    //data guru beserta mata pelajarannya
    public function guru_mapel(){
      $sql    = "SELECT DISTINCT guru.nip , guru.nama , guru.tanggal_lahir , guru.jenis_kelamin , guru.pangkat , guru.status , guru.pendidikan , guru.foto_profile , mapel_guru.id_guru , mapel_guru.id_mapel , mapel.nama_mapel
                 FROM mapel_guru
                 INNER JOIN mapel ON mapel_guru.id_mapel = mapel.id_mapel
                 INNER JOIN guru ON mapel_guru.id_guru = guru.id_guru GROUP BY id_guru";
      $query  = $this->db->query($sql);
      return $query;
    }
    //tambah data guru
    public function tambah_guru($nip,$nama,$tanggal_lahir,$gender,$pangkat,$status,$pendidikan,$foto_profile){
      $sql    = "INSERT INTO guru (nip,nama,tanggal_lahir,jenis_kelamin,pangkat,status,pendidikan,foto_profile)
                 VALUES ('$nip','$nama','$tanggal_lahir','$gender','$pangkat','$status','$pendidikan','$foto_profile')";
      $query  = $this->db->query($sql);
        if(!$query){
          return "False";
        }else{
          return "True";
        }
      }

      //tambah user
      public function tambah_user($nama_lengkap,$username,$password,$wali,$foto_profile){
        $sql   = "INSERT INTO users VALUES ('','$nama_lengkap','$username','$password','guru','$wali','$foto_profile')";
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
      $sql   = "DELETE FROM mapel WHERE id_mapel='$id_mapel'";
      $query = $this->db->query($sql);
      if(!$query){
        return "False";
      }else{
        return "True";
      }
    }
    //delete data guru
    public function delete_data_guru($id_guru){
      $sql   = "DELETE FROM guru WHERE id_guru='$id_guru'";
      $query = $this->db->query($sql);
      return $query;
    }
    //delete data siswa
    public function delete_siswa($id_siswa){
      $sql   = "DELETE FROM siswa WHERE id_siswa='$id_siswa'";
      $query = $this->db->query($sql);
      return $query;
    }
    //edit data guru
    public function edit_guru($id_guru){
      $sql    = "SELECT * FROM guru WHERE id_guru = '$id_guru' ";
      $query  = $this->db->query($sql);
      return $query;
    }

    //edit data siswa
    public function edit_siswa($id_siswa){
      $sql    = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'";
      $query  = $this->db->query($sql);
      return $query;
    }

    //ceklis Download
    public function download_presensi($id_prsensi){
      $sql    = "SELECT * FROM siswa.kelas , siswa.jurusan ,keterangan.tanggal
                 FROM siswa
                 INNER JOIN keterangan
                 ON siswa.id_siswa = keterangan.id_siswa WHERE siswa.id_siswa = '$id_siswa' ";
      $query  = $this->db->query($sql);
      if(!$query){
        return "False";
      }else{
        return "True";
      }
    }

}
 ?>
