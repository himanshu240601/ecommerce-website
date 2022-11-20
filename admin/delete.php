<?php
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true)
	{
		header("location:../login.php");
	}
	require("../config/db.php");
	$id=$_GET['id'];
    $data=mysqli_query($way,"DELETE FROM `stylin_slider_offers` WHERE `offer_id`='$id'");
	header("location:tables.php");			
?>