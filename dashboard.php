<?php
    ob_start();
    session_start();
    require "function/helper.php";
    require "function/koneksi.php";
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $module = isset($_SESSION['module']) ? $_SESSION['module'] : false;
    $action = isset($_GET['action']) ? $_GET['module'] : false;
    if(!isset($_SESSION['level'])){
        header("location:".BASE_URL."index.php?page=login");
    }
    else if(($_SESSION['level']) == "superadmin"){
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
    }
    else if(($_SESSION['level']) == "pemilik"){
        $user_id = $_SESSION['user_id'];
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        if($module !="kost" && $module !="pendaftaran_kost" ){
            header("location:".BASE_URL."dashboard.php?module=kost&action=list");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/module.css">
    <title>Dashboard</title>
    <style>
        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        @media screen and (max-width:576px) {
            .row-kategori .col-kategori .ul-kategori {
                display: flex;
                justify-content: space-between;
                padding: 0px;
            }
        }

        .dashboard {
            max-height: 100vh;
            overflow: scroll;
        }

        .col-top-kategori {
            background-color: #f1f6f0;

        }

        .col-top-kategori a {
            color: #000;
            font-size: 18px;
            font-weight: 600;
        }

        .top-category {
            background-color: #f1f6f0;
            height: 80vh;
        }

        .kategori,
        .dashboard {
            /* background-color: red; */
        }

        .logo-top {
            background-color: #f1f6f0;
        }
    </style>
</head>
<?php if(isset($_GET['success_on'])) {
  echo '<script>swal("Success!", "Data has been saved successfully", "success");</script>';
}
?>
<body>
    <div class="row logo-top">
        <div class="col-12">
            <div class="d-flex ms-5 py-3 logo">
            <a class="d-flex align-items-center" href="<?=BASE_URL?>" style="font-size:30px; text-decoration: none; font-weight:600; color:#000;"
                    style="font-size:42px; font-weight:600; color:#000;">
                    <img class="me-1" src="img/logo.png" width="64px">
                    KosTa'
                </a>
            </div>
        </div>
    </div>
    <div class="row top-category d-flex align-items-center p-0 m-0">
        <div class="col-lg-2 col-md-4 kategori d-flex align-items-center justify-content-around col-top-kategori"
            >
            <div class="row row-kategori">
                <div class="col col-kategori">
                    <ul class="ul-kategori">
                        <?php if($level == "superadmin") :?>
                        <li style="" class="d-flex align-items-center py-5">
                            <a href="<?=BASE_URL."dashboard.php?module=user&action=list";?>">
                                <?php if($module == "user"):?>
                                <img src="img/users-active.png" alt="" width="50px" class="me-2">
                                User</a>
                            <?php else :?>
                            <img src="img/users.png" alt="" width="50px" class="me-2">
                            User</a>
                            <?php endif;?>
                        </li>
                        <li style="" class="d-flex align-items-center py-5">
                            <a href="<?=BASE_URL."dashboard.php?module=kategori&action=list";?>">
                                <?php if($module == "kategori"):?>
                                <img src="img/categories (1).png" alt="" width="50px" class="me-2">
                                Kategori</a>
                            <?php else :?>
                            <img src="img/categories.png" alt="" width="50px" class="me-2">
                            Kategori</a>
                            <?php endif;?>
                        </li>
                        <li style="" class="d-flex align-items-center py-5">
                            <a href="<?=BASE_URL."dashboard.php?module=kost&action=data";?>">
                                <?php if($module == "kost"):?>
                                <img src="img/home (1).png" alt="" width="50px" class="me-2">
                                Kost</a>
                            <?php else :?>
                            <img src="img/home.png" alt="" width="50px" class="me-2">
                            Kost</a>
                            <?php endif;?>
                        </li>
                        <li style="" class="d-flex align-items-center py-5">
                            <a href="<?=BASE_URL."dashboard.php?module=pendaftaran_kost&action=data";?>">
                                <?php if($module == "pendaftaran_kost"):?>
                                <img src="img/audit (1).png" alt="" width="50px" class="me-2">
                                Pendaftaran Kost</a>
                            <?php else :?>
                            <img src="img/audit.png" alt="" width="50px" class="me-2">
                            Pendaftaran Kost</a>
                            <?php endif;?>
                        </li>
                        <?php else: ?>
                        <li style="" class="d-flex align-items-center py-5">
                            <a href="<?=BASE_URL."dashboard.php?module=kost&action=list";?>">
                                <?php if($module == "kost"):?>
                                <img src="img/home (1).png" alt="" width="50px" class="me-2">
                                Kost</a>
                            <?php else :?>
                            <img src="img/home.png" alt="" width="50px" class="me-2">
                            Kost</a>
                            <?php endif;?>
                        </li>
                        <li style="" class="d-flex align-items-center py-5">
                            <a href="<?=BASE_URL."dashboard.php?module=pendaftaran_kost&action=list";?>">
                                <?php if($module == "pendaftaran_kost"):?>
                                <img src="img/audit (1).png" alt="" width="50px" class="me-2">
                                Pendaftaran Kost</a>
                            <?php else :?>
                            <img src="img/audit.png" alt="" width="50px" class="me-2">
                            Pendaftaran Kost</a>
                            <?php endif;?>
                        </li>
                        <?php endif; ?>
                        <?php if($level == "superadmin") :?>
                        <li>
                            <a href="logout.php">Keluar</a>
                        </li>
                        <?php else : ?>
                        <li>
                            <a href="<?=BASE_URL?>">Kembali</a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
                </div>
                <div class="col-lg-10 col-md-8 col-sm-12 dashboard">
        <?php
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $filename = "module/$module/$action.php";
        if($action == "data" || $action == "list" || $action == "form" || $action == "list-pemilik"){
            if(file_exists($filename)){
                include ($filename);
            } 
        } 
        else{
            if($level == "pemilik"){
                header("location:".BASE_URL."dashboard.php?module=kost&action=list");
            } else if ($level == "superadmin"){
                header("location:".BASE_URL."dashboard.php?module=pendaftaran_kost&action=data");
            }
        }
        ?>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>