<?php
require "function/helper.php";
//  function logout();
    session_start();
    // var_dump($_SESSION['level']); die();
    
    if($_SESSION['level'] == "superadmin"){
        session_destroy();
        // unset($_SESSION['user_id']);
        header("location:".BASE_URL);
    } else{
        session_destroy();
        // unset($_SESSION['user_id']);
        header("location: index.php?page=login");
    }

// ?>