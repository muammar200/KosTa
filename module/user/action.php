<?php
require "../../function/koneksi.php";
require "../../function/helper.php";
session_start();
$button = isset($_POST['button']) ? $_POST['button'] : false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$user_idGET = isset($_GET['user_id']) ? $_GET['user_id'] : false;



if ($button == "Delete") {
    mysqli_query($koneksi, "DELETE FROM pengguna WHERE user_id='$user_id'");
    header("location:".BASE_URL."dashboard.php?module=user&action=list");
    exit;
}
else if($button == "Update"){
    $level = $_POST['level'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE pengguna SET level = '$level', status = '$status' WHERE user_id = '$user_idGET' ");
    header("location:".BASE_URL."dashboard.php?module=user&action=list");
    exit;

}
else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['phone']) || isset($_POST['email'])) {
    $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    if (substr($phone, 0, 1) == "0") {
        $phone = "62".substr($phone, 1);
    }
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM pengguna where user_id = '$user_id' AND status = 'on' ");
    $row = mysqli_fetch_assoc($query);

    if(password_verify($password, $row['password']) && $phone == true) {
        mysqli_query($koneksi, "UPDATE pengguna SET phone='$phone' WHERE user_id='$user_id'");
        header("location:".BASE_URL."index.php?page=profile&success=phone_updated");
        exit;
    }else if(password_verify($password, $row['password']) && $email == true){
        mysqli_query($koneksi, "UPDATE pengguna SET email='$email' WHERE user_id='$user_id'");
        header("location:".BASE_URL."index.php?page=profile&success=phone_updated");
        exit;
    } 
    else {
        header("location:".BASE_URL."index.php?page=edit-no-hp&error=wrong_password");
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nama']) && isset($_POST['alamat'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    

    mysqli_query($koneksi, "UPDATE pengguna SET nama='$nama', alamat='$alamat' WHERE user_id='$user_id'");

    header("location:".BASE_URL."index.php?page=profile&success=profile_updated");
    exit;
} 
// KONDISI UBAH PASSWORD
else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['passbaru'])) {
    $passlama = $_POST['passlama'];
    $passbaru = $_POST['passbaru'];
    $passkonfir = $_POST['passkonfir'];

    // Validasi password lama

    $query = mysqli_query($koneksi, "SELECT password FROM pengguna WHERE user_id = $user_id");
    $row = mysqli_fetch_assoc($query);
    $hashed_password = $row['password'];
    if (!password_verify($passlama, $hashed_password)) {
        // Password lama tidak cocok
        header("Location: " . BASE_URL . "index.php?page=edit-pass&code=wrong_pass");
        exit();
    }    
    $hashed_password = password_hash($passbaru, PASSWORD_DEFAULT);

    // Update password dan waktu terakhir password diubah di database
    $query = mysqli_query($koneksi, "UPDATE pengguna SET password = '$hashed_password', chgpassword = NOW() WHERE user_id = $user_id");

    header("Location: " . BASE_URL . "index.php?page=setting&code=sucess");
    exit();
}
else {
    header("location:".BASE_URL);
    exit;
}

?>

