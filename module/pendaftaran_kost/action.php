<?php
    require "../../function/koneksi.php";
    require "../../function/helper.php";
   session_start();
   $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

    $id_pendaftaran = isset($_GET['id_pendaftaran']) ? $_GET['id_pendaftaran'] : false;
    $button = isset($_POST['button']) ? $_POST['button'] : (isset($_GET['button']) ? $_GET['button'] : "");
   $nama_kost = isset($_POST['nama_kost']) ? $_POST['nama_kost'] : false;
   $lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : false;
   $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : false;
   $jumlah_kamar = isset($_POST['jumlah_kamar']) ? $_POST['jumlah_kamar'] : false;
   $email = isset($_POST['email']) ? $_POST['email'] : false;
   $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
   $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : false;
   $status = isset($_POST['status']) ? $_POST['status'] : false;
   // var_dump($phone); die();
   if ($button == "Update") {
      mysqli_query($koneksi, "UPDATE pendaftarankost SET nama_kost='$nama_kost', lokasi='$lokasi', alamat='$alamat', jumlah_kamar='$jumlah_kamar', email='$email', phone='$phone', status='$status', id_kategori='$kategori' WHERE id_pendaftaran='$id_pendaftaran'");
      if($status == 'Lolos Verifikasi') {
         $select = mysqli_query($koneksi, "SELECT id_pemilik FROM pendaftarankost WHERE id_pendaftaran='$id_pendaftaran'");
         $row = mysqli_fetch_assoc($select);
         if ($row) {
             $id_pemilik = $row['id_pemilik'];
             $user_id = $_SESSION['user_id'];
             $queryKost = "INSERT INTO kost (nama_kost, lokasi, alamat, id_pemilik, kategori_id, phone, jumlah_kamar, sisa_jumlah_kamar,status) VALUES ('$nama_kost', '$lokasi', '$alamat', '$id_pemilik', '$kategori', $phone, '$jumlah_kamar', '$jumlah_kamar', 'off')";
             mysqli_query($koneksi, $queryKost);
         }  
  }
      header("location:".BASE_URL."dashboard.php?module=pendaftaran_kost&action=list&verifikasi_success");
      exit;
   } elseif ($button == "Delete") {
   mysqli_query($koneksi, "DELETE FROM pendaftarankost WHERE id_pendaftaran='$id_pendaftaran'");
   header("location:".BASE_URL."dashboard.php?module=pendaftaran_kost&action=list");
   exit;
} if ($status == "") {
   $status = "Sedang Diverifikasi";}
$user_id = $_SESSION['user_id'];
$queryPengguna = mysqli_query($koneksi, "SELECT email, phone FROM pengguna WHERE user_id ='$user_id'");
$rowPengguna = mysqli_fetch_assoc($queryPengguna);
$email = $rowPengguna['email'];
$phone = $rowPengguna['phone'];
$query = mysqli_query($koneksi, "INSERT INTO pendaftarankost (nama_kost, lokasi, alamat, jumlah_kamar, email, phone, status, id_pemilik, id_kategori) VALUES ('$nama_kost','$lokasi','$alamat','$jumlah_kamar', '$email', '$phone', '$status','$user_id', '$kategori')");
if($query){
   header("location:".BASE_URL."index.php?insert_kost_success");
   exit;
}

 
 