<?php
require "helper.php";
require "koneksi.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['register']))  {
    proses_login($koneksi);
}
function proses_login($koneksi) {
    $email = $_POST['email'];
    // var_dump($email); 
    $password = $_POST['password'];
    // var_dump($password); die(); 
    $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$email' AND status='on'");
    // var_dump($query); die();
    if(mysqli_num_rows($query) == false){
        header("location: ".BASE_URL."index.php?page=login&notif=true");
    } else{
            $row = mysqli_fetch_assoc($query);
            if(password_verify($password, $row['password'])) {
                if(isset($_POST['hal_admin']) && $_POST['hal_admin'] == true){
                    if($row['level'] != "superadmin"){
                        header("location: ".BASE_URL."index.php?page=login&notif=level");
                        exit;
                    }
                }
                    session_start();
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['level'] = $row['level'];
                    header("location:".BASE_URL."index.php");
            } else {
                header("location: ".BASE_URL."index.php?page=login&notif=true");
            }
        }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register']))  {
    register($koneksi);
}

function register($koneksi){
    $status = 'on';
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$phone = $_POST['phone'];
if (substr($phone, 0, 1) == "0") {
    $phone = "62".substr($phone, 1);
}
$alamat = $_POST['alamat'];
$level = $_POST['level'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];

unset($_POST['password']);
unset($_POST['re_password']);
$dataForm = http_build_query($_POST);

$queryEmail = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$email'");

if(empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password) || empty($level)){
    header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm");
} elseif($password != $re_password){
    header("location: ".BASE_URL."index.php?page=register&notif=password&$dataForm");
} elseif(mysqli_num_rows($queryEmail) == 1){
    header("location: ".BASE_URL."index.php?page=register&notif=email&$dataForm");
}
else{
    $options = ['cost' => 12];
    $password = password_hash($password, PASSWORD_DEFAULT, $options);
// $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO pengguna (nama, email, alamat, phone, password, level, status) VALUES ('$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$level', '$status')");
    header("location: ".BASE_URL."index.php?page=login");
}    
}

$wishlist_id = isset($_GET['wishlist_id']) ? $_GET['wishlist_id'] : false;

if(isset($wishlist_id)){
    mysqli_query($koneksi, "DELETE FROM wishlist WHERE wishlist_id = $wishlist_id");

    header("location: ".BASE_URL."index.php?page=daftar-tunggu");
}


?>