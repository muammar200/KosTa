<div class="row list px-5">
    <div class="add">
        <a class="a" href="<?=BASE_URL."dashboard.php?module=kategori&action=form";?>">+ Tambah Kategori</a>
    </div>
    <?php
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
        if(mysqli_num_rows($queryKategori)== 0): ?>
    <h3>Saat ini belum ada kategori yang ditambahkan</h3>
    <?php else:?>
    <div class="table-responsive">
        <table class="table table-module">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <?php endif;?>
            <?php
            $no=1;
            while($row = mysqli_fetch_assoc($queryKategori)): ?>
            <tbody>
                <tr>
                    <td><?=$no;?></td>
                    <td><?=$row['kategori'];?></td>
                    <td class="text-center"><?=$row['status'];?></td>
                    <td class="text-center">
                        <a class="btn btn-edit"
                            href='<?=BASE_URL."dashboard.php?module=kategori&action=form&kategori_id=$row[kategori_id]";?>'>Edit</a>
                        <a class="btn btn-danger"
                            href='<?=BASE_URL."module/kategori/action.php?button=Delete&kategori_id=$row[kategori_id]"?>'
                            onclick="return confirm('Anda yakin akan menghapus kategori ini?')">Delete</a>
                    </td>
                </tr>
            </tbody>
            <?php $no++;
                endwhile;
            ?>

        </table>
    </div>

</div>