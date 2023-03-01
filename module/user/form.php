<?php
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;
    
    if($user_id){
        $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE user_id='$user_id'");
        $row=mysqli_fetch_assoc($query);
            $level = $row["level"];
            $status = $row["status"];
            $button ="Update";
    } 

?>

<form action="<?= BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST">
    <label for="" class="form-label">
        Level
    </label>
    <div class="form-check class me-3 align">
        <input class="form-check-input" type="radio" name="level" id="exampleRadios1" value="pemilik"
            <?php if($level == "pemilik") : ?> checked="true">
        <?php endif; ?>
        <label class="form-check-label" for="exampleRadios1">
            Pemilik Kost
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="level" id="exampleRadios2" value="pencari"
            <?php if($level == "pencari") : ?> checked="true">
        <?php endif;?>
        <label class="form-check-label" for="exampleRadios2">
            Pencari Kost
        </label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="level" id="exampleRadios2" value="superadmin"
            <?php if($level == "superadmin") : ?> checked="true">
        <?php endif;?>
        <label class="form-check-label" for="exampleRadios2">
            Superadmin
        </label>
    </div>
    <label for="" class="form-label">
        Status
    </label>
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
    <div class="">
        <a class="btn btn-success">
            <input style="background-color:#198754; color:#fff; border:none;" type="submit" name="button" value="<?=$button;?>">
        </a>
    </div>
</form>