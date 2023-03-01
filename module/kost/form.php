<?php
    $kost_id = isset($_GET['kost_id']) ? $_GET['kost_id'] : false;
    
    $nama_kost = ""; 
    $kategori_id = ""; 
    $lokasi = ""; 
    $alamat = ""; 
    $link_maps = ""; 
    $foto_bangunan = ""; 
    $foto_kamar = ""; 
    $foto_wc = ""; 
    $foto_teras = ""; 
    $deskripsi = ""; 
    $harga = ""; 
    $jumlah_kamar=""; 
    $sisa_jumlah_kamar=""; 
    $phone = ""; 
    $status = ""; 
    $tipe_foto = "";
    $button = "Add";

    $keterangan_gambar = "Silahkan upload gambar";

    if($kost_id){
        $querykost = mysqli_query($koneksi, "SELECT kost.*, kategori.kategori FROM kost JOIN kategori ON kost.kategori_id=kategori.kategori_id JOIN pengguna ON kost.id_pemilik=pengguna.user_id  WHERE kost_id='$kost_id' ORDER BY kost.nama_kost ASC");
        $row = mysqli_fetch_assoc($querykost);
        $nama_kost = $row['nama_kost'];
        $kategori_id = $row['kategori_id'];
        $lokasi = $row['lokasi'];
        $alamat = $row['alamat'];
        $link_maps = $row['link_maps'];
        $tipe_foto = $row['tipe_foto'];
        $foto_bangunan = $row['foto_bangunan'];
        $foto_kamar = $row['foto_kamar'];
        $foto_wc = $row['foto_wc'];
        $foto_teras = $row['foto_teras'];
        $deskripsi = $row['deskripsi'];
        $harga = $row['harga'];
        $phone = $row['phone'];
        $jumlah_kamar = $row['jumlah_kamar'];
        $sisa_jumlah_kamar = $row['sisa_jumlah_kamar'];
        $status = $row['status'];
        $button = "Update";

        // var_dump($gambar);
        $keterangan_gambar= "(Klik Pilih File jika ingin mengganti foto)";
        $foto_bangunan = "<img src='".BASE_URL."img/kost/$foto_bangunan'/>";
        $foto_teras = "<img src='".BASE_URL."img/kost/$foto_teras'/>";
        $foto_kamar = "<img src='".BASE_URL."img/kost/$foto_kamar'/>";
        $foto_wc = "<img src='".BASE_URL."img/kost/$foto_wc'/>";


    }
?>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<style>
    .form-kost{
        height: 70vh;
        background-color: #fff;
        overflow: scroll;
        
    }

    .desc-edit{
        background-color: #35b0a7;
    padding: 40px;
    color: #f4f5f6;
    border-radius: 20px 20px 0px 0px;
    font-size: 24px;
    font-weight: 600;
    }

    .img-edit{
        height: 220px;
        width: 100%;
        display: block;
        object-fit: cover;
    }

    .form-img{
        width: 100%;
    }

    .btn-edit{
        background-color: #35b0a7;
        color: #f4f5f6;
    }
    .btn-edit:hover{
        background-color: #2596be;
        color: #f4f5f6;
    }
</style>
<div class="row desc-edit">
    <div class="col">
            <p class="title">Anda sedang mengakses form edit data <?= $nama_kost ?></p>
    </div>
</div>
<div class="row form-kost">
    <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
    <form class="form_barang py-4" action='<?= BASE_URL."module/kost/action.php?kost_id=$kost_id";?>' method="POST"
    enctype="multipart/form-data">
    <div class="mb-3">
        <label for="" class="form-label">Kategori</label>
        <select class="form-select" name="kategori_id" id="">
            <?php
            $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
            while($row=mysqli_fetch_assoc($query)):
                ?>
            <?php if($kategori_id == $row['kategori_id']):?>
                <option value="<?= $row['kategori_id'];?>" selected="true"><?=$row['kategori'];?></option>
                <?php else :?>
                    <option value="<?= $row['kategori_id'];?>"><?=$row['kategori'];?></option>
                    <?php endif; ?>
                    <?php endwhile;?>
                </select>
    </div>
    <div class="mb-3">
        <label for="kost" class="form-label">Nama Kost</label>
        <input type="text" class="form-control" id="kost" name="nama_kost" value="<?=$nama_kost?>">
    </div>
    <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi (Nama Kelurahan, Nama Kecamatan)</label>
        <textarea class="form-control" name="lokasi" cols="30" rows="1" placeholder="Contoh : Samata, Somba Opu"><?=$lokasi?></textarea>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Lengkap</label>
        <textarea class="form-control" name="alamat" cols="30" rows="1" placeholder="Contoh : Samata, Somba Opu"><?=$alamat?></textarea>
    </div>
    <div class="mb-3">
                                            <label for="link_maps" class="form-label">Link Google Maps</label>
                                            <textarea type="text" class="form-control" id="link_maps" name="link_maps"
                                                placeholder="Masukkan Link Google Maps (Optional)"><?=$link_maps?></textarea>
                                        </div>
    <div class="mb-3">
        <label class="form-label" for="jumlah_kamar">Jumlah Kamar</label>
        <input type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control" value="<?= $jumlah_kamar?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="sisa_jumlah_kamar">Sisa Jumlah Kamar</label>
        <input type="number" name="sisa_jumlah_kamar" id="sisa_jumlah_kamar" class="form-control" value="<?= $sisa_jumlah_kamar?>" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="editor" cols="30" rows="30" placeholder="Silahkan deskripsikan kost Anda dan cantumkan fasilitas apa saja yang dimiliki"><?=$deskripsi?></textarea>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Kontak</label>
        <input type="tel"  class="form-control" id="phone" pattern="^(\62\s?)[0-9]{9,13}$" name="phone" required placeholder="Contoh Format : +6282192789513" value="<?=$phone?>">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" value="<?=$harga?>" required>
    </div>
    <div class=" mt-3">
        <label class="form-label">Tipe Foto</label>
    </div>
    <div class="form-check class me-3 align">
        <input class="form-check-input" type="radio" name="tipe_foto" id="exampleRadios3" value="Foto Biasa"
        <?php if($tipe_foto == "Foto Biasa") : ?> checked="true">
            <?php endif; ?>
            <label class="form-check-label" for="exampleRadios3">
            Foto Biasa
        </label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="tipe_foto" id="exampleRadios4" value="Panorama 360"
            <?php if($tipe_foto == "Panorama 360") : ?> checked="true">
                <?php endif; ?>
                <label class="form-check-label" for="exampleRadios4">
                    Panorama 360 
                </label>
    </div>
    <p><?=$keterangan_gambar?></p>
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Foto Bangunan</label>
            <img class="img img-fluid img-edit"
            <?php echo $foto_bangunan;?>  
            <input type="hidden">
            <input type="file" class="form-control form-img" name="foto_bangunan">
        </div>
        <div class="col-6">
            <label for="" class="form-label">Foto Teras</label>
            <img class="img img-fluid img-edit" <?php echo $foto_teras;?>
            <input type="hidden">
            <input type="file" class="form-control" name="foto_teras">
        </div>
        <div class="col-6">
            <label for="kategori" class="form-label">Foto Kamar</label>
            <img class="img img-fluid img-edit"<?=$foto_kamar;?>
            <input type="hidden">
            <input type="file" class="form-control" name="foto_kamar">
        </div>
        <div class="col-6">
        <label for="kategori" class="form-label">Foto WC</label>
        <img class="img img-fluid img-edit" <?=$foto_wc?>
        <input type="hidden"> 
        <input type="file" class="form-control" name="foto_wc">
    </div>
</div>
    <div class=" mt-3">
        <label class="form-label">Status</label>
    </div>
    <div class="form-check class me-3 align">
        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="on"
        <?php if($status == "on") : ?> checked="true">
            <?php endif; ?>
            <label class="form-check-label" for="exampleRadios1">
            On
        </label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="off"
            <?php if($status == "off") : ?> checked="true">
                <?php endif; ?>
                <label class="form-check-label" for="exampleRadios2">
                    Off
                </label>
    </div>
    <div>
        <label for="form-label">Klik Update untuk simpan perubahan</label>
    </div>
    <input class="btn btn-sm btn-edit mt-2" type="submit" name="button" value="<?=$button?>">
</form>
</div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>