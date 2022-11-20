<?php
    if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true){
        header("location:../login.php");
    }
    require_once('../config/db.php');
    if($_POST){
        $cart_id = $_POST['data'];
        mysqli_query($way, "DELETE FROM `stylin_cart` WHERE `cart_id`=$cart_id;");
    }
?>