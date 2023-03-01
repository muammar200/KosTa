<?php
    require "../../function/helper.php";
    require "../../function/koneksi.php";
    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    $kost_id = isset($_GET['kost_id']) ? $_GET['kost_id'] : "";

    $nama_kost = isset($_POST['nama_kost']) ? $_POST['nama_kost'] : false;
    $kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : false;
    $lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : false;
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : false;
    $link_maps = isset($_POST['link_maps']) ? $_POST['link_maps'] : false;
    
    $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : false;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
    $harga = isset($_POST['harga']) ? $_POST['harga'] : false;
    $status = isset($_POST['status']) ? $_POST['status'] : false;
    $jumlah_kamar = isset($_POST['jumlah_kamar']) ? $_POST['jumlah_kamar'] : false;
    $sisa_jumlah_kamar = isset($_POST['sisa_jumlah_kamar']) ? $_POST['sisa_jumlah_kamar'] : false;
    
    $tipe_foto = isset($_POST['tipe_foto']) ? $_POST['tipe_foto'] : false;
    $update_foto_bangunan="";
    $update_foto_kamar="";
    $update_foto_teras="";
    $update_foto_wc="";
   
    if(!empty($_FILES["foto_bangunan"]["name"])){
        $foto_bangunan = $_FILES["foto_bangunan"]["name"];
        move_uploaded_file($_FILES["foto_bangunan"] ["tmp_name"], "../../images/".$foto_bangunan);
        $update_foto_bangunan = ", foto_bangunan='$foto_bangunan'";
        }
    if(!empty($_FILES["foto_kamar"]["name"])){
        $foto_kamar = $_FILES["foto_kamar"]["name"];
        move_uploaded_file($_FILES["foto_kamar"] ["tmp_name"], "../../images/".$foto_kamar);
        $update_foto_kamar = ", foto_kamar='$foto_kamar'";
        }
    if(!empty($_FILES["foto_teras"]["name"])){
        $foto_teras = $_FILES["foto_teras"]["name"];
        move_uploaded_file($_FILES["foto_teras"] ["tmp_name"], "../../images/".$foto_teras);
        
        $update_foto_teras = ", foto_teras='$foto_teras'";
        }
    if(!empty($_FILES["foto_wc"]["name"])){
        $foto_wc = $_FILES["foto_wc"]["name"];
        move_uploaded_file($_FILES["foto_wc"] ["tmp_name"], "../../images/".$foto_wc);
        
        $update_foto_wc = ", foto_wc='$foto_wc'";
        }
        if($button == "Add"){
            mysqli_query($koneksi, "INSERT INTO kost (nama_kost, kategori_id, alamat, link_maps, lokasi, deskripsi, id_pemilik, tipe_foto, foto_bangunan, foto_kamar, foto_wc, foto_teras, harga, jumlah_kamar, sisa_jumlah_kamar, link_maps, status) 
            VALUES ('$nama_kost','$kategori_id', '$alamat', '$lokasi', '$deskripsi', '$id_pemilik','$tipe_foto', '$foto_bangunan', '$foto_kamar', '$foto_wc', '$foto_teras', '$harga', '$jumlah_kamar', '$sisa_jumlah_kamar', '$link_maps', '$status')");
            }
            if($button == "Update"){
                mysqli_query($koneksi, "UPDATE kost 
                JOIN pengguna ON kost.id_pemilik = pengguna.user_id 
                SET kost.kategori_id ='$kategori_id', 
                    kost.nama_kost ='$nama_kost',
                    kost.harga ='$harga',
                    kost.alamat ='$alamat',
                    kost.link_maps ='$link_maps',
                    kost.link_maps ='$link_maps',
                    kost.deskripsi ='$deskripsi',
                    pengguna.phone ='$phone',
                    kost.jumlah_kamar ='$jumlah_kamar',
                    kost.sisa_jumlah_kamar ='$sisa_jumlah_kamar',
                    kost.status ='$status',
                    kost.tipe_foto ='$tipe_foto'
                    $update_foto_bangunan
                    $update_foto_teras
                    $update_foto_kamar 
                    $update_foto_wc
                WHERE kost.kost_id='$kost_id'");
            }
                else if ($button = "Delete"){
                mysqli_query($koneksi, "DELETE FROM kost WHERE kost_id='$kost_id'");
                }
                header("location: ".BASE_URL."dashboard.php?module=kost&action=list");
?>