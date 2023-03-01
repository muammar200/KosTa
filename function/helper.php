<?php
    define("BASE_URL", "http://localhost/Kos/");
    require "koneksi.php";
    
    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

    function rupiah($nilai = 0){
        $harga = "Rp. ". number_format($nilai);
        return $harga;
    }

?>