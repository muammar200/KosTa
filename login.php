<?php
 if(isset($_SESSION['user_id'])){
    header("location: ".BASE_URL);
}
?>
<style>
</style>
<div class="space-login">
</div>

<div class="login">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6  px-5">
                <a class="me-3 masuk <?php if($page == "login"):?>  active <?php endif;?>"
                    href='<?= BASE_URL."index.php?page=login"?>'>Masuk</a>
                <a class=" ms-1 daftar" href='<?= BASE_URL."index.php?page=register"?>'>Daftar</a>
                <hr>
                <form action="<?= BASE_URL."function/function.php"?>" method="POST">
                    <?php 
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                if($notif == "level") : ?>
                    <p>Anda mencoba mengakses form login admin, silahkan masuk pada form di bawah ini</p>
                <?php elseif ($notif == true) : ?>
                    <p class="py-2">Maaf, email atau passowrd yang anda masukkan tidak cocok. Silahkan daftar terlebih
                        dahulu jika
                        belum mempunyai akun</p>
                    <?php endif; ?>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-login">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>