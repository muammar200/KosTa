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

    <script>
        var showChar = 20; 
        var ellipsestext = "...";
        var moretext = "Read more";
        var lesstext = "Read less";

        $('.fill-deskripsi').each(function () {
            var content = $(this).html();

            if (content.length > showChar) {
                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);
                var html = c + '<span class="moreellipses">' + ellipsestext +
                    '&nbsp;</span><span class="morecontent"><span>' + h +
                    '</span><a href="#" class="morelink">' + moretext + '</a></span>';
                $(this).html(html);
            }

        });

        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    </script>x
</head>
<?php 
$queryDetail = mysqli_query($koneksi,"SELECT kost.*, kategori.kategori
FROM kost
JOIN kategori ON kost.kategori_id = kategori.kategori_id
WHERE kost.kost_id = '$kost_id';
");

$rowDetail = mysqli_fetch_assoc($queryDetail);
?>
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
                <a class="">Detail <?=$row['nama_kost'];?></a>
            </li>
        </ul>
    </div>
</nav>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svgjs="http://svgjs.com/svgjs" width="100%" height="180" preserveAspectRatio="none" viewBox="0 0 1500 200">
    <g mask="url(&quot;#SvgjsMask2381&quot;)" fill="none">
        <rect width="100%" height="180" x="0" y="0" fill="url(#SvgjsLinearGradient2382)"></rect>
        <use xlink:href="#SvgjsSymbol2389" x="0" y="0"></use>
        <use xlink:href="#SvgjsSymbol2389" x="720" y="0"></use>
        <use xlink:href="#SvgjsSymbol2389" x="1440" y="0"></use>
    </g>
    <defs>
        <mask id="SvgjsMask2381">
            <rect width="100%" height="180" fill="#ffffff"></rect>
        </mask>
        <linearGradient x1="21.67%" y1="-162.5%" x2="78.33%" y2="262.5%" gradientUnits="userSpaceOnUse"
            id="SvgjsLinearGradient2382">
            <stop stop-color="rgba(235, 243, 243, 1)" offset="1"></stop>
            <stop stop-color="rgba(235, 243, 243, 1)" offset="1"></stop>
        </linearGradient>
        <path d="M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z" id="SvgjsPath2386"></path>
        <path d="M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z" id="SvgjsPath2387"></path>
        <path d="M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z" id="SvgjsPath2383"></path>
        <path d="M2 -2 L-2 2z" id="SvgjsPath2388"></path>
        <path d="M6 -6 L-6 6z" id="SvgjsPath2384"></path>
        <path d="M30 -30 L-30 30z" id="SvgjsPath2385"></path>
    </defs>
    <symbol id="SvgjsSymbol2389">
        <use xlink:href="#SvgjsPath2383" x="30" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="30" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2385" x="30" y="150" stroke="rgba(3, 140, 136, 1)" stroke-width="3"></use>
        <use xlink:href="#SvgjsPath2386" x="30" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="90" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="90" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="90" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="90" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="150" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="150" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2387" x="150" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="150" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="210" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2387" x="210" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="210" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="210" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="270" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="270" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2385" x="270" y="150" stroke="rgba(3, 140, 136, 1)" stroke-width="3"></use>
        <use xlink:href="#SvgjsPath2384" x="270" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="330" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="330" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="330" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="330" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2387" x="390" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="390" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="390" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="390" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="450" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="450" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="450" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="450" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="510" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="510" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="510" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="510" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="570" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="570" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="570" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="570" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="630" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="630" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="630" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="630" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="690" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="690" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="690" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="690" y="210" stroke="rgba(3, 140, 136, 1)"></use>
    </symbol>
</svg>
<div class="container container-nama">
    <div class="row row-shape">
        <div class="col-12">
            <div class="d-flex">
                <div class="house-shape m-auto">
                    <p class="house-text"><?=$row['nama_kost'];?></p>
                </div>
                <p class="edit" style="margin-left:120px;"><a
                        href='<?=BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                        class="">Edit</a></p>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="nama">
                <div class="">
                    <p class="title-nama">Nama Kost</p>
                    <p class="fill-nama"><?=$row['nama_kost'];?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="status">
                <div>
                    <p class="title-status">Status Kost</p>
                    <p class="fill-status"><?=$row['status'];?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="kategori">
                <div>
                    <p class="title-kategori">Kategori Kost</p>
                    <p class="fill-kategori"><?=$rowDetail['kategori'];?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="jumlah_kamar">
                <div class="">
                    <p class="title-jumlah_kamar">Jumlah Kamar</p>
                    <p class="fill-jumlah_kamar"><?=$row['jumlah_kamar'];?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="jumlah_kamar">
                <div class="">
                    <p class="title-jumlah_kamar">Jumlah Kamar</p>
                    <p class="fill-jumlah_kamar"><?=$row['jumlah_kamar'];?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="harga">
                <div>
                    <p class="title-harga">Harga</p>
                    <p class="fill-harga"><?=rupiah($row['harga']);?><a>/Bulan</a></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="link_maps">
                <div>
                    <p class="title-link_maps">Link Maps</p>
                    <p class="fill-link_maps"><?php if(isset($row['link_maps'])):?>
                        Belum ada link yang dimasukkan
                        <?php else :
                    ?>
                        <?=$row['link_maps']?>
                        <?php endif; ?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="phone">
                <div>
                    <p class="title-phone">No. WhatsApp Kost</p>
                    <p class="fill-phone"><?=$row['phone'];?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="alamat">
                <div>
                    <p class="title-alamat">Alamat</p>
                    <p class="fill-lokasi"><?=$row['lokasi'];?></p>
                    <p class="fill-alamat"><?=$row['alamat'];?></p>
                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-6">
            <div class="foto">
                <div>
                    <p class="title-foto">Foto Kost</p>
                    <p class="fill-foto align-self-center"><a
                            href='<?=BASE_URL."module/kost/list-pemilik-foto.php?kost_id=$row[kost_id]";?>'
                            class="">Lihat Foto</a></p>

                </div>
            </div>
            <hr class="bg-dark" style="margin:0px; margin-bottom:12px;">
        </div>
        <div class="col-12 deskripsi-col">
            <div class="deskripsi">
                <p class="title-deskripsi">Deskripsi Kost</p>
                <p class="fill-deskripsi truncate"><?=$row['deskripsi'];?></p>
                <a class="read-more" href="#">Read more</a>
            </div>
            <div>
            </div>
            <hr>

        </div>
    </div>
<?php endwhile;?> 