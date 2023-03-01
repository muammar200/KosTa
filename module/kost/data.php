<?php
$query_on = "SELECT COUNT(*) as jumlah_on FROM kost WHERE status = 'on'";
$result_on = mysqli_query($koneksi, $query_on);
$row_on = mysqli_fetch_assoc($result_on);

$query_off = "SELECT COUNT(*) as jumlah_off FROM kost WHERE status = 'off'";
$result_off = mysqli_query($koneksi, $query_off);
$row_off = mysqli_fetch_assoc($result_off);

$query_all = "SELECT COUNT(*) as jumlah FROM kost";
$result_all = mysqli_query($koneksi, $query_all);
$row_all = mysqli_fetch_assoc($result_all);
?>
    <div class="row  data-count d-flex justify-content-between">
        <div class="col-12 all">
        <a href="<?= BASE_URL."dashboard.php?module=kost&action=list"?>">
        <i class="bi bi-house-fill"></i>
                <p>Jumlah Kost</p>
                <p class="number"><?=$row_all['jumlah']?></p>
            </a>
        </div>
        <div class="col-6 on">
            <a href="<?= BASE_URL."dashboard.php?module=kost&action=list&on=on"?>">
                <i class="bi bi-house-check"></i>
                <p>Jumlah Kost <br> Aktif</p>
                <p class="number"><?=$row_on['jumlah_on']?></p>
            </a>
        </div>
        <div class="col-6 off">
            <a href="<?= BASE_URL."dashboard.php?module=kost&action=list&off=off"?>">
                <i class="bi bi-house-dash-fill"></i>
                <p>Jumlah Kost <br> Non-Aktif</p>
                <p class="number"><?=$row_off['jumlah_off']?></p>
            </a>
        </div>
        </div>