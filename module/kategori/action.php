<?php

    require "../../function/koneksi.php";
    require "../../function/helper.php";
    $kategori_id = isset($_GET['kategori_id'])?$_GET['kategori_id'] : false;

    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : false;
    $status = isset($_POST['status']) ? $_POST['status'] : false;
    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
    } else if($button == "Update"){
        $kategori_id = $_GET['kategori_id'];
        mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori', status='$status' WHERE kategori_id='$kategori_id'");
    } else{
        mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id ='$kategori_id'");
    }

    header("location: ".BASE_URL."dashboard.php?module=kategori&action=list");
?>