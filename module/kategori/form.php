<?php
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    $kategori = "";
    $status = "";
    $button = "Add";
     
    if($kategori_id){
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id = '$kategori_id'");
        $row = mysqli_fetch_assoc($queryKategori);

        $kategori = $row['kategori'];
        $status = $row['status'];
        $button = "Update";
    }
?>
<form action="<?=BASE_URL."module/kategori/action.php?kategori_id=$kategori_id";?>" method="POST">
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori" value="<?=$kategori?>">
    </div>
    <div class="mb-2">
        <label class="form-labe l">Status</label>
    </div>

    <div class="form-check class me-3 align">
        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="on"
            <?php if($status == "on") : ?> checked="true">
        <?php endif; ?>
        <label class="form-check-label" for="exampleRadios1">
            On
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="off"
            <?php if($status == "off") : ?> checked="true">
        <?php endif; ?>
        <label class="form-check-label" for="exampleRadios2">
            Off
        </label>
    </div>

    <input class="btn btn-sm btn-warning mt-2" type="submit" name="button" value="<?=$button?>">
</form>