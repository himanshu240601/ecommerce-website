<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        <?php
            include('style.css');
        ?>
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar-light container-fluid d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a class="btn menu nav_btns" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="bi bi-list"></i>
            </a>
            <h5 class="brand" style="transform: translateY(3px);"><span>STYL</span><strong>IN</strong></h5>
        </div>

        <!-- Sidebar -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
            <?php
                if(isset($_SESSION['user'])){
                ?>
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Welcome, <?= $_SESSION['user'] ?></h5>
                <?php
                }
                else{
                ?>
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><span>STYL</span><strong>IN</strong></h5>
                <?php
                }
            ?>
                <a type="button" class="btn menu nav_btns" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x"></i>
                </a>
            </div>

            <!-- Navlinks -->
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="browse.php">Browse</a>
                    </li>

                    <?php
                    if(isset($_SESSION['user'])){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">My Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order.php">Orders</a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <hr>
                    <div class="signin">
                        <?php
                        if(isset($_SESSION['user'])){
                        ?>
                            <a href="logout.php" class="btn logout">Logout</a>
                        <?php
                        }
                        else{
                        ?>
                            <a href="../login.php" class="btn login">Login</a>
                            <a href="../signup.php" class="btn signup">Signup</a>
                        <?php
                            }
                        ?>
                    </div>
                </ul>
            </div>
        </div>
        <div class="d-flex">
            <a class="btn search-btn nav_btns"><i class="bi bi-search"></i></li>
            <a href="<?php echo isset($_SESSION['user']) ? "cart.php" : "../login.php";?>" class="btn nav_btns"><i class="bi bi-bag"></i></a>
            <?php
                if(isset($_SESSION['user'])){
                    ?>
                    <a href="" class="btn user-profile"><i class="bi bi-person-circle"></i></a>
                <?php
                }
            ?>
        </div>
    </nav>
    <div id="search-box" class="container-fluid">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search_keyword" id="searchproduct" placeholder="Search for products, brands etc.">
            <button type="submit" class="btn btn-danger" id="button-addon2" onclick="search_product()" name="search"><i class="bi bi-search"></i></button>
        </div>
    </div>