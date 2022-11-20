<?php
    session_start();
    if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true)
	{
		header("location:../login.php");
	}
    require_once("../config/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylin Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        <?php include "style.css"; ?>
    </style>
</head>
<body>

    <!-- Navbar -->
    <header class="navbar navbar-dark sticky-top bg-dark container-fluid">
        <a class="navbar-brand">STYLIN Admin</a>
        <div class="navbar-nav">
            <div class="nav-item">
                <a class="nav-link" href="logout.php">Log out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-2 bg-light">
                <div class="pt-3">
                    <ul style="list-style:none; padding: 0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="bi bi-house"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="order.php" class="nav-link"><i class="bi bi-bag"></i> Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php"><i class="bi bi-grid"></i> Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="slider-offers.php"><i class="bi bi-tags"></i> Offers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tables.php"><i class="bi bi-clipboard-data"></i> Data</a>
                        </li>
                    </ul>
                </div>
            </nav>