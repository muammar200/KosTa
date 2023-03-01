<?php
   
   $id_pendaftaran = isset($_GET['id_pendaftaran']) ? $_GET['id_pendaftaran'] : false;
    $nama_kost = "";
    $lokasi = "";
    $alamat = "";
    $jumlah_kamar = "";
    $status = "";
    $email = "";
    $phone = "";
    $button = "Add";
    $kategori_id = "";

   if($id_pendaftaran){
       $query = mysqli_query($koneksi, "SELECT * FROM pendaftarankost WHERE id_pendaftaran='$id_pendaftaran'");
       $row=mysqli_fetch_assoc($query);
       $nama_kost = $row['nama_kost'];
       $lokasi = $row['lokasi'];
       $alamat = $row['alamat'];
       $jumlah_kamar = $row['jumlah_kamar'];
       $email = $row['email'];
       $phone = $row['phone'];
       $status = $row['status'];
       $kategori_id = $row['id_kategori'];
        $button = "Update";
   }

?>

<form <?php if($id_pendaftaran == "") : ?> action="<?= BASE_URL."module/pendaftaran_kost/action.php"?>"
    <?php else : ?>
        action="<?= BASE_URL."module/pendaftaran_kost/action.php?id_pendaftaran=$id_pendaftaran"?>"
    <?php endif; ?>
    method="post">
    <input type="hidden" name="id_pendaftaran" value="<?= $row['id_pendaftaran']?>">
    <div class="mb-3">
        <label class="form-label" for="nama_kost">Nama Kost</label>
        <input type="text" name="nama_kost" id="nama_kost" class="form-control" value="<?= $nama_kost?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="lokasi">Lokasi</label>
        <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $lokasi ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="alamat">Alamat Lengkap</label>
        <textarea name="alamat" id="alamat" class="form-control" required><?= $alamat?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label" for="jumlah_kamar">Jumlah Kamar</label>
        <input type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control" value="<?= $jumlah_kamar?>" required>
    </div>
    <div class="mb-3">
    <label class="form-label" for="kategori">Kategori</label>
    <select name="kategori" id="kategori" class="form-control" required>
        <option value="" disabled selected>
            --Pilih Kategori--
        </option>
        <?php
            $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
            while($row = mysqli_fetch_assoc($queryKategori)) {
                $selected = "";
                if($row['kategori_id'] == $kategori_id) {
                    $selected = "selected";
                }
                echo "<option value='$row[kategori_id]' $selected>$row[kategori]</option>";
            }
        ?>
    </select>

</div>
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= $email?>" required>
    </div>
    <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Handphone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?=$phone?>"
                        required >
                </div>
    <div class="mb-3">
        <label class="form-label" for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Sedang Diverifikasi">Sedang Diverifikasi</option>
            <option value="Lolos Verifikasi">Lolos Verifikasi</option>
            <option value="Tidak Lolos Verifikasi">Tidak Lolos Verifikasi</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" name="button" value="<?=$button?>" class="btn btn-primary">
        <a href="dashboard.php?module=pendaftaran_kost&action=list" class="btn btn-secondary">Kembali</a>
    </div>
</form>
