<?php
    $kost_id = $_GET['kost_id'];

    $query = mysqli_query($koneksi, "SELECT * FROM kost WHERE kost_id ='$kost_id' AND status='on'");
    $row = mysqli_fetch_assoc($query);

    
?>

<head>
    <link rel="stylesheet" href="css/lightbox.css">
</head>
<div class="container detail">
    <div class="row detail-pict">
        <?php if($row['tipe_foto'] == "Foto Biasa") : ?>
        <div class="col-lg-6 col-md-12 col-sm-12 bangunan">
            <a href='<?=BASE_URL."images/$row[foto_bangunan]"?>'
                data-lightbox="models" data-title="Foto Bangunan">
                <img src='<?=BASE_URL."images/$row[foto_bangunan]"?>' alt="" height="400px">
            </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-12 kamar">
                    <a href="<?=BASE_URL."images/$row[foto_kamar]"?>" data-lightbox="models" data-title="Foto Kamar">
                        <img src="<?=BASE_URL."images/$row[foto_kamar]"?>" height="200px" alt="">
                    </a>

                </div>
            </div>
            <div class="row">
                <div class="col-6 teras">
                    <a href='<?=BASE_URL."images/$row[foto_teras]"?>' data-lightbox="models" data-title="Foto Teras">
                        <img src='<?=BASE_URL."images/$row[foto_teras]"?>' alt="" height="195px">
                    </a>
                </div>
                <div class="col-6 wc">
                    <a href='<?=BASE_URL."images/$row[foto_wc]"?>' data-lightbox="models" data-title="Foto WC">
                        <img src='<?=BASE_URL."images/$row[foto_wc]"?>' alt="" height="195px">
                    </a>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="col-lg-6 col-md-12 col-sm-12 bangunan">
            <div id="pannellum-viewer-bangunan" style="height: 400px;"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-12 kamar">
                    <div id="pannellum-viewer-kamar" style="height: 200px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 teras">
                    <div id="pannellum-viewer-teras" style="height: 195px;"></div>
                </div>
                <div class="col-6 wc">
                    <div id="pannellum-viewer-wc" style="height: 195px;"></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.pannellum.org/2.5/pannellum.js"></script>
<script>
    var viewerBangunan = pannellum.viewer('pannellum-viewer-bangunan', {
        "type": "equirectangular",
        "panorama": '<?=BASE_URL."img/kost/$row[foto_bangunan]"?>',
        "autoLoad": true
    });
    var viewerKamar = pannellum.viewer('pannellum-viewer-kamar', {
        "type": "equirectangular",
        "panorama": '<?=BASE_URL."img/kost/$row[foto_kamar]"?>',
        "autoLoad": true
    });
    var viewerTeras = pannellum.viewer('pannellum-viewer-teras', {
        "type": "equirectangular",
        "panorama": '<?=BASE_URL."img/kost/$row[foto_teras]"?>',
        "autoLoad": true
    });
    var viewerWc = pannellum.viewer('pannellum-viewer-wc', {
        "type": "equirectangular",
        "panorama": '<?=BASE_URL."img/kost/$row[foto_wc]"?>',
        "autoLoad": true
    });
</script>


<div class="container">
    <div class="row detail-desc mt-3">
        <div class="col-lg-9 col-md-7 col-sm-6 col-6">
            <p class="nama"><?=$row['nama_kost'];?></p>
            <p class="lokasi mt-3"><?=$row['lokasi'];?></p>
            <div class="alamat d-flex">
                <i class="bi bi-geo-alt"></i>
                <p class=""><?=$row['alamat'];?></p>
            </div>
            <?php if($row['link_maps']) : ?>
            <a href="<?=$row['link_maps']?>" target="_blank" class="d-flex align-items-center">
                <i class="bi bi-link-45deg tautan fs-5 align-self-center"></i>
                <p class="tautan align-self-center">Klik tautan untuk melihat lokasi</p>
            </a>
            <?php endif; ?>
            <?php 
$queryDetail = mysqli_query($koneksi,"SELECT kost.*, kategori.kategori
FROM kost
JOIN kategori ON kost.kategori_id = kategori.kategori_id
WHERE kost.kost_id = '$kost_id';
");
?>
            <div class="kategori">
                <?php while ($rowDetail = mysqli_fetch_assoc($queryDetail)) : ?>
                <p class=" <?php if($rowDetail['kategori'] == "Putri") :?> 
                        putri
                        <?php elseif($rowDetail['kategori'] == "Putra") : ?>
                        putra
                        <?php else: ?>
                            putra_putri
                        <?php endif;?>
                        "><?=$rowDetail['kategori']?></p>
                <?php endwhile; ?>
            </div>
            <hr class="hr-detail-lg">
        </div>
        <div class="col-lg-3 col-md-5 col-sm-6 col-6">
            <div class="card">
                <div class="card-body p-0">
                    <p class="harga"><?=rupiah($row['harga'])?><a class="month">/Bulan</a></p>
                    <a href='https://wa.me/<?= $row['phone'] ?>' target="_blank">
                        <!-- <i class=""></i> -->
                        <p class="contact">Hubungi</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-detail-sm">
</div>
<div class="container">
    <div class="row desc-deskripsi">
        <div class="col-lg-9 col-md-12 col-sm-12 ">
            <p class="title mb-2">Deskripsi</p>
            <div class="lengkap">
                <p><?=$row['deskripsi']?></p>
            </div>
        </div>
    </div>
</div>

<script src="lightbox-plus-jquery.js
">
</script>