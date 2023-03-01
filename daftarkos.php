<head>
    <link rel="stylesheet" href="css/daftarkost.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

</head>
<?php
                if (!function_exists('addToWishlist')) {
                    function addToWishlist($kost_id) {
                      global $koneksi;
                  
                      if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                      }
                      $sql = "INSERT INTO wishlist (user_id, kost_id) VALUES ($user_id, $kost_id)";
                      mysqli_query($koneksi, $sql);
                      header("location:".BASE_URL."index.php?page=daftarkos&coba");
                    }
                    
                    if (isset($_POST['kost_id'])) {
                      addToWishlist($_POST['kost_id']);
                    }
                  }
                  
                ?>
<?php 
    if(isset($_GET['coba'])){
        echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Ditambahkan',
            text: 'Kost ditambahkan dalam daftar Kost Idaman',
        });
        history.pushState('', document.title, window.location.pathname);
        setTimeout(function(){ window.location.href = ''; }, 10000);
    </script>
    ";
}
?>
<div class="row kategori daftarkos" style="margin-top: 140px;">
    <div class="col-12 col-lg-3 menu-kategori m-auto">
        <ul class="d-flex justify-content-between align-items-center ul-kategori">
            <?php $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
            while($rowKategori=mysqli_fetch_assoc($queryKategori)): ?>
            <?php if(($kategori_id==$rowKategori['kategori_id']) && ($rowKategori['kategori'] == "Putri")): ?>
            <li class="text-center putri-active">
                <a class="" href='<?=BASE_URL."index.php?page=daftarkos&kategori_id=$rowKategori[kategori_id]";?>'>
                    <img src='<?=BASE_URL."img/woman-active.png"?>' alt="" width="36px">
                    <p>Kost Putri</p>
                </a>
            </li>
            <?php elseif($rowKategori['kategori'] == "Putri"):?>
            <li class="text-center putri">
                <a class="" href='<?=BASE_URL."index.php?page=daftarkos&kategori_id=$rowKategori[kategori_id]";?>'>
                    <img src='<?=BASE_URL."img/woman.png"?>' alt="" width="36px">
                    <p>Kost Putri</p>
                </a>
            </li>
            <?php elseif(($kategori_id==$rowKategori['kategori_id']) && ($rowKategori['kategori'] == "Putra")): ?>
            <li class="text-center putra-active">
                <a class="" href='<?=BASE_URL."index.php?page=daftarkos&kategori_id=$rowKategori[kategori_id]";?>'><img
                        src='<?=BASE_URL."img/man-active.png"?>' alt="" width="36px">
                    <p>Kost Putra</p>
                </a>
            </li>
            <?php elseif($rowKategori['kategori'] == "Putra"):?>
            <li class="text-center putra">
                <a href='<?=BASE_URL."index.php?page=daftarkos&kategori_id=$rowKategori[kategori_id]";?>'>
                    <img src='<?=BASE_URL."img/man.png"?>' alt="" width="36px">
                    <p>Kost Putra</p>
                </a>
            </li>
            <?php elseif(($kategori_id==$rowKategori['kategori_id']) && ($rowKategori['kategori'] == "Putra/Putri")): ?>
            <li class="text-center putra_putri-active">
                <a class="" href='<?=BASE_URL."index.php?page=daftarkos&kategori_id=$rowKategori[kategori_id]";?>'>
                    <img class="img-fit" src='<?=BASE_URL."img/mw-active.png"?>' alt="" width="36px">
                    <p class="">Kost Putra/Putri</p>
                </a>
            </li>
            <?php elseif($rowKategori['kategori'] == "Putra/Putri") : ?>
            <li class="text-center putra_putri">
                <a href='<?=BASE_URL."index.php?page=daftarkos&kategori_id=$rowKategori[kategori_id]";?>'>
                    <img class="img-fit" src='<?=BASE_URL."img/mw.png"?>' alt="" width="36x">
                    <p>Kost Putra/Putri</p>
                </a>
            </li>
            <?php endif;
            endwhile;?>
        </ul>
        <hr>
    </div>
</div>
<style>
    .search-input input{
        background-color: #e8e8e8;
        border: none;
        padding: 8px 16px;
        border-radius: 20px;
    }
</style>
<div class="container mt-2 mb-5">
    <div class="row text-center">
        <div class="col-12 col-lg-3 col-md-6 col-sm-12 text-center m-auto">
            <form action="" method="post">
                    <div class="search-box">
                    <div class="search-input">
                        <input style="width: 100%;" type="text" name="search" placeholder="Cari..."
                            onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">    
                    </div>
                    </div>
                    <button type="submit" name="search_submit" style="display: none"></button>
                </form>

        </div>
    </div>
</div>
<?php 
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = mysqli_query($koneksi, "SELECT kost.kost_id, kost.link_maps, kost.sisa_jumlah_kamar, kost.status, kost.nama_kost, kost.alamat, kost.lokasi, kost.harga, kost.foto_kamar, kategori.kategori
    FROM kost 
    JOIN kategori ON kost.kategori_id = kategori.kategori_id 
    WHERE (kost.nama_kost LIKE '%$search%' OR kost.alamat LIKE '%$search%' OR kost.lokasi LIKE '%$search%' OR kost.harga LIKE '%$search%' OR kategori.kategori LIKE '%$search%') AND kost.status='on'"); 
  
    // $querySign = mysqli_query($koneksi, "SELECT wishlist.wishlist_id, kost.kost_id FROM wishlist JOIN kost ON wishlist.kost_id = kost.kost_id WHERE wishlist.user_id = $user_id");

    // $rowSign = mysqli_fetch_assoc($querySign);

    
    if (mysqli_num_rows($query) == 0) {
      echo "<h1 class='text-center'>Tidak ada hasil ditemukan</h1>";
    } 
  } elseif ($kategori_id == false) {
    $query = mysqli_query($koneksi, "SELECT kost.kost_id, kost.link_maps, kost.sisa_jumlah_kamar, kost.nama_kost, kost.lokasi, kost.alamat, kost.harga, kost.foto_kamar, kategori.kategori
    FROM kost 
    JOIN kategori ON kost.kategori_id = kategori.kategori_id 
    WHERE kost.status='on' ORDER BY RAND()"); 
  
    // $querySign = mysqli_query($koneksi, "SELECT wishlist.wishlist_id, kost.kost_id FROM wishlist JOIN kost ON wishlist.kost_id = kost.kost_id WHERE wishlist.user_id = $user_id");

    // $rowSign = mysqli_fetch_assoc($querySign);

    
  } else {
    $query = mysqli_query($koneksi, "SELECT kost.kost_id, kost.link_maps, kost.sisa_jumlah_kamar, kost.nama_kost, kost.alamat, kost.lokasi, kost.harga, kost.foto_kamar, kategori.kategori FROM kost JOIN kategori ON kost.kategori_id = kategori.kategori_id WHERE kost.kategori_id = '$kategori_id' AND kost.status='on'");
  
    // $querySign = mysqli_query($koneksi, "SELECT wishlist.wishlist_id, kost.kost_id FROM wishlist JOIN kost ON wishlist.kost_id = kost.kost_id WHERE wishlist.user_id = $user_id");

    // $rowSign = mysqli_fetch_assoc($querySign);

  }
    ?>
<style>
    .bi-heart-main {
                        position: absolute;
                        right: 0;
                        margin-top: -20px;
                        font-size: 22px;
                        font-weight: 600;
                        cursor: pointer;
                    }

                    .bi-heart-main:hover {
                        color: red;
                    }
</style>
<div class="container">
    <div class="row main">
        <?php
    while($row=mysqli_fetch_assoc($query)):?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-daftar-kost">
                <div class="img img-top">
                    <a href='<?=BASE_URL."index.php?page=detail&kost_id=$row[kost_id]"?>'>
                        <img src='<?= BASE_URL."img/kost/$row[foto_kamar]"?>' alt="" width="100%" height="280px">
                    </a>
                </div>
                <div class="card-body p-0 py-3">
                    <p class="alamat"><?=$row['lokasi']?></p>
                    <form action="" method="post">
                        <input type="hidden" name="kost_id" value="<?=$row['kost_id'];?>">
                        <button type="submit" style="border:none; position:absolute;right:0; background-color:#fff;">
                            <i class="bi bi-heart bi-heart-main"></i>
                        </button>
                    </form>
                    <?php if($row['link_maps']) : ?>
                    <a href="<?=$row['link_maps']?>" target="_blank" class="d-flex align-items-center">
                    <i class="bi bi-link-45deg tautan fs-5 align-self-center"></i><p class="tautan align-self-center">Klik tautan untuk melihat lokasi</p>
                    </a>
                    <?php endif; ?>
                    <p <?php if($row['sisa_jumlah_kamar'] == 0) :?>
                    class="sisa_jumlah_kamar_wait"
                    <?php else : ?>
                        class="sisa_jumlah_kamar"
                    <?php endif;?>>
                    <?php if($row['sisa_jumlah_kamar'] == 0) :?>
                        Sedang Penuh
                    <?php else : ?> 
                        <?= $row['sisa_jumlah_kamar'].' Kamar Tersedia' ?>
                    <?php endif;?> 
                </p>
                    <p class="nama"><?=$row['nama_kost']?></p>
                    <p class="harga"><?=rupiah($row['harga'])?>/Bulan</p>
                    <p class="kategori <?php if($row['kategori'] == "Putri") :?> 
                    putri
                    <?php elseif($row['kategori'] == "Putra") : ?>
                    putra
                    <?php else: ?>
                        putra_putri
                    <?php endif;?>
                    "><?=$row['kategori']?></p>
                </div>
            </div>
        </div>
        <?php endwhile;?>
    </div>
</div>

<script>
    var currentScrollPosition = 0;
    window.addEventListener('scroll', function () {
        currentScrollPosition = window.pageYOffset;
    });

    // Save current position
    window.onbeforeunload = function () {
        // Save current position
        sessionStorage.setItem('scrollPosition', currentScrollPosition);
    }
    window.onload = function () {
        // Restore previous scroll position
        var savedPosition = sessionStorage.getItem('scrollPosition');
        if (savedPosition) {
            window.scrollTo(0, savedPosition);
        }
    }
</script>
