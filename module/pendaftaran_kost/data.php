<?php
$query_diverif = "SELECT COUNT(*) as jumlah_diverif FROM pendaftarankost WHERE status = 'Sedang Diverifikasi'";
$result_diverif = mysqli_query($koneksi, $query_diverif);
$row_diverif = mysqli_fetch_assoc($result_diverif);

$query_lolos = "SELECT COUNT(*) as jumlah_lolos FROM pendaftarankost WHERE status = 'Lolos Verifikasi'";
$result_lolos = mysqli_query($koneksi, $query_lolos);
$row_lolos = mysqli_fetch_assoc($result_lolos);

$query_all = "SELECT COUNT(*) as jumlah FROM pendaftarankost";
$result_all = mysqli_query($koneksi, $query_all);
$row_all = mysqli_fetch_assoc($result_all);


    ?>
    <div class="row  data-count d-flex justify-content-between">
        <!-- <div class="col-12 mb-3 add">
        <a 
        href='<?=BASE_URL."dashboard.php?module=pendaftaran_kost&action=form"?>'
        class="add">+ Tambah Pendaftaran Kost</a>
        </div> -->
        <div class="col-12 all">
            <a href="<?= BASE_URL."dashboard.php?module=pendaftaran_kost&action=list"?>">
            <i class="bi bi-houses"></i>
                <p>Jumlah Pendaftaran <br> Kost</p>
                <p class="number"><?=$row_all['jumlah']?></p>
            </a>
        </div>
        <div class="col-6 on">
            <a href="<?= BASE_URL."dashboard.php?module=pendaftaran_kost&action=list&lolosverif=lolosverif"?>">
                <i class="bi bi-list-check"></i>
                <p>Lolos Verifikasi</p>
                <p class="number"><?=$row_lolos['jumlah_lolos']?></p>
            </a>
        </div>
        <div class="col-6 off">
            <a href="<?= BASE_URL."dashboard.php?module=pendaftaran_kost&action=list&sedangverif=sedangverif"?>">
                <i class="bi bi-list-task"></i>
                <p>Sedang Diverifikasi</p>
                <p class="number"><?=$row_diverif['jumlah_diverif']?></p>
            </a>
        </div>
    </div>