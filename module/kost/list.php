<?php 
    $on = isset($_GET['on']) ? $_GET['on'] : false;
    $off = isset($_GET['off']) ? $_GET['off'] : false;
?>
<div class="row list px-5">
    
        <?php if($level == "superadmin") : ?>
        <!-- <a class="add" href='<?= BASE_URL."dashboard.php?module=kost&action=form";?>'>+ Tambah Kost</a> -->
        <?php if($on == false && $off == false) : ?>
        <a class="add">Data Kost</a>
        <?php elseif($on == "on") :?>
        <a class="add">Data Kost Aktif</a>
        <?php elseif($off == "off") :?>
        <a class="add">Data Kost Non-Aktif</a>
        <?php endif; ?>
        <?php else: ?>
        <a class="add" >Data Kost Anda</a>
        <?php endif; ?>
    
    <?php
    if($level == "pemilik"){
        $queryKost = mysqli_query($koneksi, "SELECT kost.*, kategori.kategori FROM kost JOIN kategori ON kost.kategori_id=kategori.kategori_id JOIN pengguna ON kost.id_pemilik=pengguna.user_id WHERE kost.id_pemilik = '$user_id' ORDER BY kost.nama_kost ASC");
    } else{
        if($on == "on"){
            $queryKost = mysqli_query($koneksi, "SELECT kost.*, kategori.kategori, pengguna.phone FROM kost JOIN kategori ON kost.kategori_id=kategori.kategori_id JOIN pengguna ON kost.id_pemilik=pengguna.user_id WHERE kost.status='on' ORDER BY kost.nama_kost ASC");
        }
        else if($off == "off"){
            $queryKost = mysqli_query($koneksi, "SELECT kost.*, kategori.kategori, pengguna.phone FROM kost JOIN kategori ON kost.kategori_id=kategori.kategori_id JOIN pengguna ON kost.id_pemilik=pengguna.user_id WHERE kost.status='off' ORDER BY kost.nama_kost ASC");
        }
        else{
            $queryKost = mysqli_query($koneksi, "SELECT kost.*, kategori.kategori, pengguna.phone FROM kost JOIN kategori ON kost.kategori_id=kategori.kategori_id JOIN pengguna ON kost.id_pemilik=pengguna.user_id ORDER BY kost.nama_kost ASC");
        }
    } 
    if(mysqli_num_rows($queryKost) == 0):?>
    <h3 class="text-dark">Saat ini belum ada kost yang terdaftar</h3>
    <?php else:?>
    <div class="table-responsive">
        <table class="table table_pendaftaran">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kost</th>
                    <th>Kategori</th>
                    <th>Alamat</th>
                    <th>Harga</th>
                    <th>Kontak</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
             $no = 1;
             while($row = mysqli_fetch_assoc($queryKost)):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_kost']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td>
                        <?php if(empty($row['harga'])) : ?>
                            Belum ada harga yang dimasukkan
                        <?php else :?>
                    Rp. <?= number_format($row['harga'], 0, ',
                    ', '.'); ?>
                    <?php endif; ?>    
                </td>
                    <td><?= $row['phone']; ?></td>
                    <td class="text-center"><?= $row['status']; ?></td>
                    <?php if($level == "superadmin") :?>
                    <td class="text-center">
                        <a href='<?= BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                            class="btn btn-edit">Edit</a>
                        <a href='<?= BASE_URL."module/kost/action.php?button=Delete&kost_id=$row[kost_id]";?>'
                            class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </td>
                <?php endif;?>
                <?php if($level == "pemilik") :?>
                <!-- <td class="text-center">
                    <a href='<?= BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                        class="btn btn-success">Detail</a>
                    </td> -->
                    <td class="text-center">
                    <a href='<?= BASE_URL."module/kost/list-pemilik.php?kost_id=$row[kost_id]";?>'
                        class="btn btn-success">Detail</a>
                    </td>
                    <?php endif;?>
                    <!-- <?php if($level == "pemilik") :?>
             <div class="kliksini">
                 <p>Klik <a href='<?= BASE_URL."dashboard.php?module=kost&action=form&kost_id=$row[kost_id]";?>'
                 >Di sini</a> untuk selengkapnya</p>
             </div>           
        <?php endif; ?>   -->
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>