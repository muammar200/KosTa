<!DOCTYPE html>
<html lang="en">
<head>
<?php
    ob_start();
    session_start();
    require "function/helper.php";
    require "function/koneksi.php";

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;    
    if($level == "superadmin"){
        header("location:".BASE_URL."dashboard.php");
    }
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="icon" href="img/logo.png">
    <title>KosTa'</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top py-3 shadow">
        <div class="container-fluid">
            <div class="div-margin">
                <a class="text-logo navbar-brand d-flex align-items-center name-web" href="<?=BASE_URL?>">
                    <img class="me-1" src="img/logo.png" width="64px">
                    KosTa'
                </a>
            </div>
            <!--  -->
            <div class="nav-none d-flex" id="nav-none">
            <ul class="d-flex align-items-center">
                    <li class="me-4">
                        <div class="d-flex icon-person align-items-center">
                            <?php if($user_id) :?>
                            <a class="img_person" href=""><img src="img/icon-person.png" alt="" width="20px" height="20px"></a>
                            <?php else : ?>
                            <a class="img_person" href="<?= BASE_URL.'index.php?page=login';?>"><img src="img/icon-person.png" alt="" width="20px" height="20px"></a>
                            <?php endif;?>
                            <?php
                                if ($user_id): ?>
                            <div class="profile btn-group ">
                                <button class="btn-profile p-1"><p class="profile_none">Profile</p></button>
                                <button type="" class="btn-profile dropdown-toggle dropdown-toggle-split p-0 drop-none"
                                    data-bs-toggle="dropdown">
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <p class="dropdown-item py-2" id="nama">Hi <?=$nama;?></p>
                                    </li>
                                    <?php if($level == "pemilik") :?>
                                    <div class="d-flex align-items-center mt-1" id="keluar">
                                    <i class="bi bi-layout-text-sidebar-reverse ms-3 me-0"></i><a href="dashboard.php" class="ms-2"
                                            id="logout">Dashboard</a>
                                    </div>
                                    <?php endif;?>
                                    <div class="d-flex align-items-center mt-1 mb-2" id="keluar">
                                        <i class="bi bi-person-fill ms-3 me-0 "></i><a href="<?=BASE_URL.'index.php?page=profile'?>" class="ms-2"
                                            id="logout">Profil Saya</a>
                                    </div>
                                    <div class="d-flex align-items-center mt-1 mb-2" id="keluar">
                                        <i class="bi bi-heart ms-3 me-0 "></i><a href="<?=BASE_URL.'index.php?page=daftar-tunggu'?>" class="ms-2"
                                            id="logout">Kost Idaman</a>
                                    </div>
                                    <div class="d-flex align-items-center mt-2" id="keluar">
                                        <i class="bi bi-box-arrow-right ms-3 me-0"></i><a href="logout.php" class="ms-2"
                                            id="logout">Keluar</a>
                                    </div>
                                </ul>
                            </div>
                            <?php elseif($user_id == false) :?>
                            <a class='login ms-1' href="<?= BASE_URL.'index.php?page=login';?>"><p class="masuk_daftar">Masuk/Daftar</p></a>
                            <?php endif; ?>
                        </div>
                    </li>
            </ul>
            <div class="d-flex align-self-center">
                        <ul>
                        <li class="me-4">
                            <div class="whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                <a class="text-wa" href="https://wa.me//+6282192789513?Assalamualaikum"
                                    target="_blank">WhatsApp</a>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
            <!--  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse main-navbar" id="navbarText">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 ul">
                    <li class="nav-item me-4 fs-5">
                        <a class="nav-link <?php if($page == false) :?> active-visible <?php endif;?>" href="<?=BASE_URL?>">Beranda</a>
                    </li>

                    <li class="nav-item me-4 fs-5">
                        <a class="nav-link <?php if($page == "daftarkos") :?> active-visible <?php endif;?>" href=<?=BASE_URL."index.php?page=daftarkos"?>>Daftar Kos</a>

                    </li>
                    <li class="nav-item me-4 fs-5">
                        <a class="nav-link <?php if($page == "sewakankost") :?> active-visible <?php endif;?>" href='<?=BASE_URL."index.php?page=sewakankost"?>'>Sewakan Kostmu</a>
                    </li>
                    <li class="nav-item me-4 fs-5">
                        <a class="nav-link <?php if($page == "tentang") :?> active-visible <?php endif;?>" href='<?=BASE_URL."index.php?page=tentang"?>'>Tentang KosTa'</a>
                    </li>
                </ul>

                <ul class="navbar-nav d-flex align-items-center menu">
                    <li class="nav-item me-4 ">
                        <div class="d-flex icon-person align-items-center">
                            <img src="img/icon-person.png" alt="" width="20px" height="20px">
                            <?php
                                if ($user_id): ?>
                            <div class="profile btn-group ">
                                <button class="btn-profile p-1">Profile</button>
                                <button type="" class="btn-profile dropdown-toggle dropdown-toggle-split p-0"
                                    data-bs-toggle="dropdown">
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <p class="dropdown-item py-2" id="nama">Hi <?=$nama;?></p>
                                    </li>
                                    <div class="d-flex align-items-center mt-1 mb-2" id="keluar">
                                        <i class="bi bi-person-fill ms-3 me-0 "></i><a href="<?=BASE_URL.'index.php?page=profile'?>" class="ms-2"
                                            id="logout">Profil Saya</a>
                                    </div>
                                    <div class="d-flex align-items-center mt-1 mb-2" id="keluar">
                                        <i class="bi bi-heart ms-3 me-0 "></i><a href="<?=BASE_URL.'index.php?page=daftar-tunggu'?>" class="ms-2"
                                            id="logout">Kost Idaman</a>
                                    </div>
                                    <?php if($level == "pemilik") :?>
                                    <div class="d-flex align-items-center mt-1" id="keluar">
                                    <i class="bi bi-layout-text-sidebar-reverse ms-3 me-0"></i><a href="dashboard.php" class="ms-2"
                                            id="logout">Dashboard</a>
                                    </div>
                                    <?php endif;?>
                                    <div class="d-flex align-items-center mt-2" id="keluar">
                                        <i class="bi bi-box-arrow-right ms-3 me-0"></i><a href="logout.php" class="ms-2"
                                            id="logout">Keluar</a>
                                    </div>
                                </ul>
                            </div>
                            <?php elseif($user_id == false) :?>
                            <a class='login ms-1' href="<?= BASE_URL.'index.php?page=login';?>">Masuk/Daftar</a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <div class="d-flex align-self-center">
                        <li class="nav-item me-4">
                            <div class="whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                <a class="text-wa" href="https://wa.me//+6282192789513?Assalamualaikum"
                                    target="_blank">WhatsApp</a>
                            </div>
                    </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php 
            $filename = "$page.php";
            if(file_exists($filename)){
                require "$filename";
            } else {
                include_once "main.php";
            }
        ?>
            </div>
        </div>
    </div>

    <div class="container-fluid footer text-center mt-5">
        <div class="row">
            <div class="col-12 px-0">
                <footer>
                    <p class="title">Cari Kost Terdekat dengan Mudah di KosTa.com</p>
                    <div class="d-flex justify-content-center mt-4 mb-4 logo">
                        <a class="d-flex align-items-center " href="<?=BASE_URL?>">
                        <img class="me-1" src="img/property.png" width="64px">
                        KosTa'
                    </a>
                    </div>
                    <div class="d-flex justify-content-center mb-4">
                    <i class="bi bi-facebook "></i>
                    <i class="bi bi-twitter "></i>
                    <i class="bi bi-instagram "></i>
                    </div>
                    <div class="copy-right">
                        <p>&#169;2023 KosTa.com</p>
                        <p>All rights reserved</p>
                    </div>

                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>
