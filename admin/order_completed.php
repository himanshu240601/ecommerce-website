<?php
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true)
	{
		header("location:../login.php");
	}
	require("../config/db.php");
	$id=$_GET['id'];
    $data=mysqli_query($way,"UPDATE `stylin_orders` SET `status`='Completed' WHERE `order_id`='$id'");
	header("location:order.php");			
?>