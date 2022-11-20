<?php
    session_start();
    if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true){
        header("location:../login.php");
    }
    require_once('../config/db.php');
    $username = $_SESSION['user'];
    if($_POST){
        $product_id = $_POST['data'];
        $data = mysqli_query($way, "SELECT * FROM `stylin_cart` WHERE `user_id_ref`='$username' AND `product_id_ref`=$product_id;");
        if(mysqli_num_rows($data)==0){
            mysqli_query($way,"INSERT INTO `stylin_cart`(`product_id_ref`, `user_id_ref`) VALUES ('$product_id','$username')");
        }
    }
?>