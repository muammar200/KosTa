<?php 
    session_start();
    require "../../function/helper.php";
    require "../../function/koneksi.php";
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $kost_id = isset($_GET['kost_id']) ? $_GET ['kost_id'] : false;
?>

<head>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/my-acount.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="../../css/lightbox.css">
</head>
<?php 
if($level == "pemilik"):
    $queryKost = mysqli_query($koneksi, "SELECT kost.*, kategori.kategori FROM kost JOIN kategori ON kost.kategori_id=kategori.kategori_id JOIN pengguna ON kost.id_pemilik=pengguna.user_id WHERE kost.id_pemilik = '$user_id' AND kost.kost_id='$kost_id' ORDER BY kost.nama_kost DESC");
endif;
while($row = mysqli_fetch_assoc($queryKost)):
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top py-3 shadow">
    <div class="container-fluid d-flex">
        <a class="text-logo navbar-brand d-flex align-items-center name-web" href="<?=BASE_URL?>">
            <img class="me-1" src="../../img/logo.png" width="64px">
            KosTa'
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ul" style="margin-left: 90px;">
            <li class="text-kost nav-item me-4 fs-5">
                <a class="">Foto <?=$row['nama_kost'];?></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container container-foto p-0">
    <div class="row detail-pict">
        <div class="col-12">
            <div class="d-flex col-title">
                <div class="">
                    <p class="title-foto-top">Tipe Foto</p>
                    <p class="fill-foto"><?=$row['tipe_foto'];?></p>
                </div>
                <div>
                    <p class="edit-one ms-3 align-self-center"><a
                    href='<?=BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                    class="">Edit</a></p>
                </div>
            </div>
            <hr class="" style="margin:0px; margin-bottom:12px;">  
        </div>
        <?php if($row['tipe_foto'] == "Foto Biasa") : ?>
        <div class="col-foto col-lg-6 col-md-12 col-sm-12 bangunan-foto">
            <div class="d-flex justify-content-between">
                <p class="title-foto">Foto Bangunan</p>
                <p class="edit-one align-self-center"><a
                    href='<?=BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                    class="">Edit</a></p>
            </div>
            <a href='<?=BASE_URL."images/$row[foto_bangunan]"?>'
                data-lightbox="models" data-title="Foto Bangunan">
                <img src='<?=BASE_URL."images/$row[foto_bangunan]"?>' alt="" height="400px">
            </a>
            <hr>
        </div>
        <div class="col-foto col-lg-6 col-md-12 col-sm-12 bangunan-foto">
        <div class="d-flex justify-content-between">
                <p class="title-foto">Foto Kamar</p>
                <p class="edit-one align-self-center"><a
                    href='<?=BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                    class="">Edit</a></p>
            </div>
            <a href="<?=BASE_URL."images/$row[foto_kamar]"?>" data-lightbox="models" data-title="Foto Kamar">
                        <img src="<?=BASE_URL."images/$row[foto_kamar]"?>" height="400px" alt="">
                    </a>
            <hr>
        </div>
        <div class="col-fot col-lg-6 col-md-12 col-sm-12 bangunan-foto">
        <div class="d-flex justify-content-between">
                <p class="title-foto">Foto Teras</p>
                <p class="edit-one align-self-center"><a
                    href='<?=BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                    class="">Edit</a></p>
            </div>
            <a href='<?=BASE_URL."images/$row[foto_teras]"?>' data-lightbox="models" data-title="Foto Teras">
                        <img src='<?=BASE_URL."images/$row[foto_teras]"?>' alt="" height="400px">
                    </a>
            <hr>
        </div>
        <div class="col-foto col-lg-6 col-md-12 col-sm-12 bangunan-foto">
        <div class="d-flex justify-content-between">
                <p class="title-foto">Foto WC</p>
                <p class="edit-one align-self-center"><a
                    href='<?=BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                    class="">Edit</a></p>
            </div>
            <a href='<?=BASE_URL."images/$row[foto_wc]"?>' data-lightbox="models" data-title="Foto WC">
                        <img src='<?=BASE_URL."images/$row[foto_wc]"?>' alt="" height="400px">
                    </a>
            <hr>
        </div>
        <?php else : ?>
        <div class="col-lg-6 col-md-12 col-sm-12 bangunan-foto">
            <div id="pannellum-viewer-bangunan" style="height: 400px;"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="mb-4" id="pannellum-viewer-kamar" style="height: 400px;"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div id="pannellum-viewer-teras" style="height: 400px;"></div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div id="pannellum-viewer-wc" style="height: 400px;"></div>
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
<?php endwhile;?>
<script src="../../lightbox-plus-jquery.js
">
</script>