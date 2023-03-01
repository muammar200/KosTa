<div class="row list px-5">
    <a class="add">Data Users</a>
<?php
    $query = mysqli_query($koneksi, "SELECT * FROM pengguna ORDER BY nama ASC");
    if(mysqli_num_rows($query) == 0) : ?>
        <h3>Belum ada Data User yang dimasukkan</h3>
    <?php else: ?>
        <div class="table-responsive">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Level</th>
                <th class="text-center">Status</th>
                <th class="text-center aksi">Aksi</th>
            </tr>
        <?php 
            $no=1;
        while($row=mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['alamat']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['level']?></td>
                <td class="text-center"><?=$row['status']?></td>
                <td class="text-center aksi">
                    <a class="btn btn-edit" href='<?=BASE_URL."dashboard.php?module=user&action=form&user_id=$row[user_id]";?>'>Edit Status</a>
                    <a class="btn btn-danger" href='<?=BASE_URL."module/user/action.php?button=Delete&user_id=$row[user_id]"?>' onclick="return confirm('Anda yakin akan menghapus kost ini?')">Hapus</a>
                </td>
            </tr>
        <?php 
            $no++;
        endwhile;
        ?>
        </table>
        </div>
    <?php endif;?>
    </div>