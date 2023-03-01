<?
    require "function/function.php";
    if($user_id){
        header("location: ".BASE_URL);
    }  
?>
<style>
     #error-message {
            color: red;
          }

    .register .notif{
        background-color: red;
        color: #f4f5f6;
        width: max-content;
        padding: 8px;
        border-radius: 4px;
        font-weight: 600;
    }
          
</style>
<div class="space-regist">

</div>
<div class="container register mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 px-5">
            <a class="me-3 masuk" href='<?= BASE_URL."index.php?page=login"?>'>Masuk</a>
            <a class="ms- 1 daftar  <?php if($page == "register"):?> active <?php
            endif;?>" href='<?= BASE_URL."index.php?page=register"?>'>Daftar</a>
            <hr>
            <form action="function/function.php" method="POST">
                <input type="hidden" name="register" value="on">
                <?php 
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
        $email = isset($_GET['email']) ? $_GET['email'] : false;
        $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
        $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
        if ($notif == "require") : ?>
                <p class="notif">Maaf, Anda harus melengkapi form di bawah</p>
                <?php elseif ($notif == "password"): ?>
                <p class="notif">Maaf, password yang kamu masukkan tidak sama</p>
                <?php elseif ($notif == "email"): ?>
                <p class="notif">Maaf, email yang kamu masukkan sudah terdaftar</p>
                <?php endif; ?>
                <div class="mb-3 mt-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama_lengkap" value="<?= $nama_lengkap ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email?>"
                        aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Handphone</label>
                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{8,13}"
 name="phone"
                    value="<?=$phone?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat"><?= $alamat?></textarea>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Re-type Password</label>
                    <input type="password" class="form-control" id="re-password" name="re_password">
                </div>
                <div id="error-message" class="mb-3"></div>
                <div>
                    <label for="form-label mb-3">Gabung Sebagai</label>
                </div>
                <div class="form-check class me-3 mt-2 align">
                    <input class="form-check-input" type="radio" name="level" id="exampleRadios1" value="pemilik">
                    <label class="form-check-label" for="exampleRadios1">
                        Pemilik Kost
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="level" id="exampleRadios2" value="pencari">
                    <label class="form-check-label" for="exampleRadios2">
                        Pencari Kost
                    </label>
                </div>
                <button type="submit" class="btn btn-register">Daftar</button>
            </form>
        </div>
    </div>
</div>