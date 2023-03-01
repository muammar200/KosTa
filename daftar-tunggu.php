<head>
    <link rel="stylesheet" href="css/my-acount.css">
</head>
<?php 
    if($user_id && $level != "superadmin"){
        $query = mysqli_query($koneksi, "SELECT wishlist.*, kost.*, kategori.kategori FROM wishlist 
INNER JOIN kost ON wishlist.kost_id = kost.kost_id 
INNER JOIN kategori ON kost.kategori_id = kategori.kategori_id 
WHERE wishlist.user_id ='$user_id'");
        
        $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_wishlist FROM wishlist WHERE user_id = '$user_id'");
        $row_count = mysqli_fetch_assoc($query_count);
    }      
?>
<section class="daftar-tunggu">
    <div class="container container-title">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="d-flex div-title">
                    <p class="title me-1">Kost Idaman</p>
                    <p class="number"><?=$row_count['jumlah_wishlist']?></p>
                </div>
                <div class="count d-flex"><p class="me-1"><?=$row_count['jumlah_wishlist']?></p><p>Kost yang kamu simpan</p> </div>
            </div>
        </div>
    </div>
    <div class="container container-list">
        <div class="row justify-content-center">
        <?php
    while($row=mysqli_fetch_assoc($query)):
    ?>
        <div class="col-list col-12 col-lg-10 col-md-12 col-sm-12 py-3">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-daftar-kost">
                <div class="img img-top">
                    <a href='<?=BASE_URL."index.php?page=detail&kost_id=$row[kost_id]"?>'>
                        <img src='<?= BASE_URL."img/kost/$row[foto_kamar]"?>' alt="" width="100%" height="280px">
                    </a>
                </div>
                </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-6">
                    <div class="desc">
                        <p class="lokasi"><?=$row['lokasi']?></p>
                        <div class="d-flex justify-content-between div-alamat">
                            <p class="alamat"><?=$row['alamat']?></p>
                            <!-- <p><?=$row['wishlist_id']?></p> -->
                            <a href="#" onclick="hapusWishlist(<?=$row['wishlist_id'];?>)"><i class="bi bi-x-circle"></i></a>
                        </div>
                        <p class="nama"><?=$row['nama_kost']?></p>
                        <?php if($row['link_maps']) : ?>
                        <a href="<?=$row['link_maps']?>" target="_blank" class="d-flex align-items-center tautan">
                        <i class="bi bi-link-45deg fs-5 align-self-center"></i><p class=" align-self-center">Klik untuk melihat lokasi</p>
                        </a>
                        <?php endif; ?>
                        <p <?php if($row['sisa_jumlah_kamar'] == 0) :?>
                        class="kamar_full"
                        <?php else : ?>
                            class="kamar_tersedia"
                        <?php endif;?>>
                        <?php if($row['sisa_jumlah_kamar'] == 0) :?>
                            Sedang Penuh
                        <?php else : ?> 
                            <?= $row['sisa_jumlah_kamar'].' Kamar Tersedia' ?>
                        <?php endif;
                        
                        ?> 
                    </p>
                         
                        <p class="harga"><?=rupiah($row['harga'])?>/Bulan</p>
                        <div class="d-flex justify-content-between">
                            <p class="kategori <?php if($row['kategori'] == "Putri") :?> 
                            putri
                            <?php elseif($row['kategori'] == "Putra") : ?>
                            putra
                            <?php else: ?>
                                putra_putri
                            <?php endif;?>
                            "><?=$row['kategori']?></p>
                            <a href='https://wa.me/<?= $row['phone'] ?>' target="_blank" class="align-self-center contact d-flex"><i class="bi bi-whatsapp me-1 wa"></i><p>Hubungi</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <?php endwhile;?>
        </div>
    </div>
</section>

<script>
function hapusWishlist(wishlist_id) {
    if (confirm("Apakah Anda yakin ingin menghapus wishlist ini?")) {
        window.location.href = 'function/function.php?wishlist_id=' + wishlist_id;
    }
}
</script>
