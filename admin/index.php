<?php
    include_once("header_footer/header.php");

    $users = mysqli_query($way,"SELECT * FROM `stylin_user` WHERE `type`='user'");
    $totalusers=mysqli_num_rows($users);
    $products = mysqli_query($way, "SELECT * FROM `stylin_products`");
    $totalproducts = mysqli_num_rows($products);
    $orders = mysqli_query($way,"SELECT * FROM `stylin_orders` WHERE `status`='Order Placed'");
    $totalorders = mysqli_num_rows($orders);
    $total_earnings = 0;
    $earnings = mysqli_query($way,"SELECT `price` FROM `stylin_orders` WHERE `status`='Completed'");
    $completed_orders = mysqli_num_rows($earnings);
    while($row=mysqli_fetch_array($earnings,MYSQLI_ASSOC)){
        $total_earnings += $row['price'];
    }
?>
    <div id="home" class="col-md-10">
        <h4 class="mt-4 mx-3">Welcome, <?= $_SESSION['user'] ?></h4>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h5>Total Users</h5>
                    <h2><?= $totalusers ?>+</h2>
                    <span><i class="bi bi-arrow-up-circle-fill"></i></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Daily Visitors</h5>
                    <h2>1000+</h2>
                    <span><i class="bi bi-arrow-up-circle-fill"></i></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Total Products</h5>
                    <h2><?= $totalproducts ?>+</h2>
                    <span><i class="bi bi-arrow-up-circle-fill"></i></span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h5>Active Orders</h5>
                    <h2><?= $totalorders ?>+</h2>
                    <span><i class="bi bi-arrow-up-circle-fill"></i></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Completed Orders</h5>
                    <h2><?= $completed_orders ?>+</h2>
                    <span><i class="bi bi-arrow-up-circle-fill"></i></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <h5>Sales Revenue</h5>
                    <h2>Rs.<?= $total_earnings ?>+</h2>
                    <span><i class="bi bi-arrow-up-circle-fill"></i></span>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("header_footer/footer.php");
?>