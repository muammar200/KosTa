<?php
    session_start();
    require "function/helper.php";
    require "function/koneksi.php";
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
 if($user_id){
        header("location: ".BASE_URL);
    }
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
    <link rel="stylesheet" href="css/style.css">

</head>
<div class="space-login">
</div>
<div class="login">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6  px-5">
                <p class="text-center log-admn">Login Admin</p>
                <hr>
                <form action="<?= BASE_URL."function/function.php"?>" method="POST">
                    <?php 
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                if ($notif == true) : ?>
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
                    <input type="hidden" name="hal_admin" value="true">
                    <button type="submit" class="btn btn-login">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>