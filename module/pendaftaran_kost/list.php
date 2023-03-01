<?php
    if(isset($_GET['coba'])){
        echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Ditambahkan',
            text: 'Data kost berhasil ditambahkan ke dalam antrian pendaftaran',
        });
        history.pushState('', document.title, window.location.pathname);
    </script>
    ";
    }

    $lolosverif = isset($_GET['lolosverif']) ? $_GET['lolosverif'] : false;
    $sedangverif = isset($_GET['sedangverif']) ? $_GET['sedangverif'] : false;
?>
<div class="row list px-5">
    <?php 
    if($level == "superadmin") : ?>
    <!-- <a 
        href='<?=BASE_URL."dashboard.php?module=pendaftaran_kost&action=form"?>'
        class="add">+ Tambah Pendaftaran Kost</a> -->
    <?php if($lolosverif == "lolosverif"): ?>
    <a class="add">Data Pendaftaran Kost <br> Lolos Verifikasi</a>
    <?php elseif($sedangverif == "sedangverif"): ?>
        <a class="add">Data Pendaftaran Kost <br> Sedang Diverifikasi</a>
    <?php else : ?>
        <a class="add">Data Pendaftaran Kost</a>
    <?php endif;?>
    <?php else : ?>
    <a class="add">
        Pendaftaran Kost Anda</a>
    <?php endif; ?>
    <?php
    if($level == "pemilik"){
    $query = mysqli_query($koneksi, "SELECT pendaftarankost.*, kategori.kategori FROM pendaftarankost 
    JOIN kategori ON pendaftarankost.id_kategori = kategori.kategori_id 
    WHERE pendaftarankost.id_pemilik = '$user_id' ORDER BY pendaftarankost.waktu_pendaftaran DESC");
    } else{
        if($lolosverif == "lolosverif"){
            $query = mysqli_query($koneksi, "SELECT pendaftarankost.*, kategori.kategori FROM pendaftarankost 
    JOIN kategori ON pendaftarankost.id_kategori = kategori.kategori_id WHERE pendaftarankost.status='Lolos Verifikasi' 
     ORDER BY pendaftarankost.waktu_pendaftaran DESC");
        } else if($sedangverif == "sedangverif"){
            $query = mysqli_query($koneksi, "SELECT pendaftarankost.*, kategori.kategori FROM pendaftarankost 
    JOIN kategori ON pendaftarankost.id_kategori = kategori.kategori_id WHERE pendaftarankost.status='Sedang Diverifikasi' 
     ORDER BY pendaftarankost.waktu_pendaftaran DESC");
        } else {
        $query = mysqli_query($koneksi, "SELECT pendaftarankost.*, kategori.kategori FROM pendaftarankost 
    JOIN kategori ON pendaftarankost.id_kategori = kategori.kategori_id 
     ORDER BY pendaftarankost.waktu_pendaftaran DESC");
        }
    }

    if(mysqli_num_rows($query) == 0) : ?>
    <h3>Belum ada data kost yang terdaftar</h3>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Kost</th>
                <th>Lokasi</th>
                <th>Alamat Lengkap</th>
                <th>Jumlah Kamar</th>
                <th>Kategori</th>
                <th>No Telepon</th>
                <th class="text-center">Status</th>
                <?php if($level == "superadmin") :?>
                <th class="text-center" style="width: 200px;">Aksi</th>
                <?php endif;?>
            </tr>
            <?php 
            $no=1;
        while($row=mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama_kost']?></td>
                <td><?=$row['lokasi']?></td>
                <td><?=$row['alamat']?></td>
                <td><?=$row['jumlah_kamar']?></td>
                <td><?=$row['kategori']?></td>
                <td><?=$row['phone']?></td>
                <td class="text-center"><?=$row['status']?></td>
                <?php if($level == "superadmin") :?>
                <td class="text-center">
                    <a class="btn btn-edit"
                        href='<?=BASE_URL."dashboard.php?module=pendaftaran_kost&action=form&id_pendaftaran=$row[id_pendaftaran]";?>'>Edit</a>
                    <a class="btn btn-danger"
                        href='<?=BASE_URL."module/pendaftaran_kost/action.php?button=Delete&id_pendaftaran=$row[id_pendaftaran]"?>'
                        onclick="return confirm('Anda yakin akan menghapus kost ini?')">Delete</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php 
            $no++;
        endwhile;
        ?>
        </table>
    </div>
    <?php endif;?>
</div>