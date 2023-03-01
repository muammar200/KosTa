<?php

if(isset($_GET['insert_kost_success'])){
    echo "
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data Berhasil Ditambahkan',
        text: 'Data kost berhasil ditambahkan ke dalam antrian pendaftaran',
    });
    history.pushState('', document.title, window.location.pathname);
    setTimeout(function(){ window.location.href = 'dashboard.php?module=pendaftaran_kost&action=list'; }, 2000);
</script>
";
}

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

if(isset($_GET['code'])){
    echo "
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Anda belum login',
    });
    history.pushState('', document.title, window.location.pathname);
    setTimeout(function(){ window.location.href = ''; }, 10000);
</script>
";
}
?>
<?php
                if (!function_exists('addToWishlist')) {
                    
                    function addToWishlist($kost_id) {
                      global $koneksi;
                      global $user_id;
                       
                      if($user_id == false){
                        header("location:".BASE_URL."?code=notlogin");
                    }
                      
                      else if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                      }
                      $sql = "INSERT INTO wishlist (user_id, kost_id) VALUES ($user_id, $kost_id)";
                      mysqli_query($koneksi, $sql);
                      header("location:".BASE_URL."?coba");
                    }
                
                    if (isset($_POST['kost_id'])) {
                      addToWishlist($_POST['kost_id']);
                    }
                  }
                  
                ?>
<div class="container mt-5 mb-3 first-title p-0">
    <div class="row">
        <div class="col text-center">
            <p class="top-title">Temukan kost idamanmu di KosTa'</p>
        </div>
    </div>
</div>
<?php
// $result = isset($_SESSION['search_results']) ? $_SESSION['search_results'] : false;
// var_dump($result);
?>
<div class="container ammar">
    <div class="row">
        <div class="col ">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="border-radius: 8px;">
                    <div class="carousel-item active none" data-bs-interval="10000">
                        <img src="img/slide1banner.jpg" class="d-block w-100 h-50 img img-responsive" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="img/slide2.jpg" class="d-block w-100 h-50 img img-responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slide3.jpg" class="d-block w-100 h-50 img img-responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slide4.jpg" class="d-block w-100 h-50 img img-responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slide5.jpeg" class="d-block w-100 h-50 img img-responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slide6banner.jpg" class="d-block w-100 h-50 img img-responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slide7banner.jpg" class="d-block w-100 h-50 img img-responsive" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
<style>
    .search-input input {
        background-color: #e8e8e8;
        border: none;
        padding: 8px 16px;
        border-radius: 20px;
    }
</style>
<div class="container mt-5">
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

<div class="row kategori py-4">
    <div class="col-12 col-lg-3 col-md-6 col-sm-12 menu-kategori m-auto">
        <ul class="d-flex justify-content-between align-items-center ul-kategori">
            <?php $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
            if(mysqli_num_rows($queryKategori)>0) :
            while($rowKategori=mysqli_fetch_assoc($queryKategori)): ?>
            <?php if(($kategori_id==$rowKategori['kategori_id']) && ($rowKategori['kategori'] == "Putri")): ?>
            <li class="text-center putri-active">
                <a class="" href='<?=BASE_URL."index.php?kategori_id=$rowKategori[kategori_id]";?>'>
                    <img src='<?=BASE_URL."img/woman-active.png"?>' alt="" width="36px">
                    <p>Kost Putri</p>
                </a>
            </li>
            <?php elseif($rowKategori['kategori'] == "Putri"):?>
            <li class="text-center putri">
                <a class="" href='<?=BASE_URL."index.php?kategori_id=$rowKategori[kategori_id]";?>'>
                    <img src='<?=BASE_URL."img/woman.png"?>' alt="" width="36px">
                    <p>Kost Putri</p>
                </a>
            </li>
            <?php elseif(($kategori_id==$rowKategori['kategori_id']) && ($rowKategori['kategori'] == "Putra")): ?>
            <li class="text-center putra-active">
                <a class="" href='<?=BASE_URL."index.php?kategori_id=$rowKategori[kategori_id]";?>'><img
                        src='<?=BASE_URL."img/man-active.png"?>' alt="" width="36px">
                    <p>Kost Putra</p>
                </a>
            </li>
            <?php elseif($rowKategori['kategori'] == "Putra"):?>
            <li class="text-center putra">
                <a href='<?=BASE_URL."index.php?kategori_id=$rowKategori[kategori_id]";?>'>
                    <img src='<?=BASE_URL."img/man.png"?>' alt="" width="36px">
                    <p>Kost Putra</p>
                </a>
            </li>
            <?php elseif(($kategori_id==$rowKategori['kategori_id']) && ($rowKategori['kategori'] == "Putra/Putri")): ?>
            <li class="text-center putra_putri-active">
                <a class="" href='<?=BASE_URL."index.php?kategori_id=$rowKategori[kategori_id]";?>'>
                    <img class="img-fit" src='<?=BASE_URL."img/mw-active.png"?>' alt="" width="36px">
                    <p class="">Kost Putra/Putri</p>
                </a>
            </li>
            <?php elseif($rowKategori['kategori'] == "Putra/Putri") : ?>
            <li class="text-center putra_putri">
                <a href='<?=BASE_URL."index.php?kategori_id=$rowKategori[kategori_id]";?>'>
                    <img class="img-fit" src='<?=BASE_URL."img/mw.png"?>' alt="" width="36x">
                    <p>Kost Putra/Putri</p>
                </a>
            </li>
            <?php endif;
            endwhile; ?>
            <?php else:?>
            <h1 class="text-center" style="text-align: center;">Belum ada data Kost untuk ditampilkan</h1>
            <?php endif;?>
        </ul>
        <hr>
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
        WHERE kost.status='on' ORDER BY RAND() LIMIT 6"); 
      
        // $querySign = mysqli_query($koneksi, "SELECT wishlist.wishlist_id, kost.kost_id FROM wishlist JOIN kost ON wishlist.kost_id = kost.kost_id WHERE wishlist.user_id = $user_id");

        // $rowSign = mysqli_fetch_assoc($querySign);

        
      } else {
        $query = mysqli_query($koneksi, "SELECT kost.kost_id, kost.link_maps, kost.sisa_jumlah_kamar, kost.nama_kost, kost.alamat, kost.lokasi, kost.harga, kost.foto_kamar, kategori.kategori FROM kost JOIN kategori ON kost.kategori_id = kategori.kategori_id WHERE kost.kategori_id = '$kategori_id' AND kost.status='on'");
      
        // $querySign = mysqli_query($koneksi, "SELECT wishlist.wishlist_id, kost.kost_id FROM wishlist JOIN kost ON wishlist.kost_id = kost.kost_id WHERE wishlist.user_id = $user_id");

        // $rowSign = mysqli_fetch_assoc($querySign);

      }
    
    ?>

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
                        <i class="bi bi-link-45deg tautan fs-5 align-self-center"></i>
                        <p class="tautan align-self-center">Klik tautan untuk melihat lokasi</p>
                    </a>
                    <?php endif; ?>
                    <p <?php if($row['sisa_jumlah_kamar'] == 0) :?> class="sisa_jumlah_kamar_wait" <?php else : ?>
                        class="sisa_jumlah_kamar" <?php endif;?>>
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

<div class="container step text-center mt-4 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="top mb-5">
                <img src="img/stars.png" alt="" width="50px">
                <p class="mt-4">Cari kost di KosTa' semudah 1, 2, 3!</p>
            </div>
        </div>
        <div class="col-lg-4 step-section">
            <img src="img/map.png" alt="" width="170px">
            <p class="title mt-4 mb-3">Cari</p>
            <p>Temukan kost idamanmu di lokasi yang kamu inginkan.</p>
        </div>
        <div class="col-lg-4 step-section">
            <img src="img/office-building.png" alt="" width="170px">
            <p class="title mt-4 mb-3">Hubungi</p>
            <p>Hubungi pemiliki kost.</p>
        </div>
        <div class="col-lg-4 step-section">
            <img src="img/dismiss.png" alt="" width="170px">
            <p class="title mt-4 mb-2">Check In</p>
            <p>Kamar pilihanmu sudah siap ditempati.</p>
        </div>
    </div>
</div>
<div class="container container-offer mt-5 py-5">
    <div class="row offer justify-content-between ">
        <div class="col-lg-6 col-sm-12 col-md-12 pict-pemilik" style="border-radius: 8px;">
            <div class="pemilik">
                <div class="desc">
                    <p class="title text-end me-4">Anda Pemilik Kost?</p>
                    <p class="description text-end me-4">Daftarkan kost Anda sekarang dan dapatkan banyak pengunjung
                        potensial dengan mudah di website kami</p>
                </div>

                <div class="div-modal me-4">
                    <button type="button" class="btn modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Daftarkan Kost
                    </button>
                    <!--  -->
                    <!-- Modal -->
                    <?php if(($user_id == false) || ($level == "pencari")) : ?>
                    <!-- user_id tidak ada -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Anda belum masuk/login sebagai
                                        pemilik kost, silahkan masuk terlebih dahulu untuk bisa mendaftarkan kost Anda.
                                        Jika belum mempunyai akun silahkan mendaftar sebagai Pemilik Kost</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <a href='<?=BASE_URL."index.php?page=login"?>'
                                        class="btn btn-daftar-kost mt-2">Masuk</a>
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <p>Punya Pertanyaan?</p>
                                    <div class="whatsapp">
                                        <a class="text-wa" href="https://wa.me//+6282192789513?Assalamualaikum"
                                            target="_blank">
                                            <i class="bi bi-whatsapp"></i>
                                            WhatsApp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <!-- user_id ada -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Daftarkan Kost</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card p-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-exclamation-circle me-2"></i>
                                            <p>Segera daftarkan kost Anda. Tim kami akan menghubungi Anda segera.</p>
                                        </div>
                                    </div>
                                    <form action="<?= BASE_URL."module/pendaftaran_kost/action.php"?>" method="POST">
                                        <h2 class="mt-3 mb-3 data-kost">Data Kost</h2>
                                        <div class="mb-3">
                                            <label for="nama_kost" class="form-label">Nama Kost</label>
                                            <input type="text" class="form-control" id="nama_kost" name="nama_kost"
                                                placeholder="isi nama lengkap kost" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lokasi" class="form-label">Lokasi Kost</label>
                                            <textarea type="text" class="form-control" id="lokasi" name="lokasi"
                                                placeholder="Masukkan Nama Kelurahan, Nama Kecamatan. Contoh: Samata, Somba Opu"
                                                required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Isi alamat lengkap kost" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                                            <input type="text" class="form-control" id="jumlah_kamar"
                                                name="jumlah_kamar" placeholder="Nilai minimum adalah 1" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori Kost</label>
                                            <select class="form-control" id="kategori" name="kategori" required>
                                                <option value="" disabled selected>--Pilih Kategori--</option>
                                                <?php
                $queryKategori = "SELECT * FROM kategori WHERE status='on'";
                $result = mysqli_query($koneksi, $queryKategori);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['kategori_id']."'>".$row['kategori']."</option>";
                }
            ?>
                                            </select>

                                        </div>
                                        <button name="Add" type="submit" class="btn btn-daftar-kost mt-2">Daftarkan
                                            Kost</button>
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <p>Punya Pertanyaan?</p>
                                    <div class="whatsapp">
                                        <a class="text-wa" href="https://wa.me//+6282192789513?Assalamualaikum"
                                            target="_blank">
                                            <i class="bi bi-whatsapp"></i>
                                            WhatsApp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 pict-pencari" style="border-radius: 8px;">
            <div class="pencari">
                <div class="desc">
                    <p class="title ms-4">Anda Mencari Kost?</p>
                    <p class="description ms-4">Temukan pilihan kost di website kami. Kami menawarkan pilihan kost
                        terbaik dan terpercaya.</p>
                </div>
                <div class="div-cari ms-4">
                    <a class="btn" href="<?=BASE_URL."index.php?page=daftarkos"?>">
                        Mencari Kost
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Save current position
    var currentUrl = window.location.href;
    var previousUrl = sessionStorage.getItem('previousUrl');
    var scrollPosition = window.pageYOffset;

    if (currentUrl == previousUrl) {
        window.scrollTo(0, sessionStorage.getItem('scrollPosition'));
    } else {
        sessionStorage.setItem('previousUrl', currentUrl);
        window.scrollTo(0, 0);
    }

    window.onbeforeunload = function () {
        // Save current position
        sessionStorage.setItem('scrollPosition', scrollPosition);
    }
</script>

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