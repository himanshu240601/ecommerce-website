<?php
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['logged']!=true){
        header("location:../login.php");
    }
    include_once('header_footer/header.php');
    require_once('../config/db.php');
?>
<style>
    <?php include 'css/cart.css'; ?>
</style>

    <div class="container" id="cart">
        <h2 class="text-center">MY CART</h2>
        <div class="row" id="products-in-cart">
            <div class="col-md-8" id="main-col">
                <?php    
                    $username = $_SESSION['user'];
                    $data = mysqli_query($way, "SELECT `product_id_ref`, `cart_id` FROM `stylin_cart` WHERE `user_id_ref`='$username' ORDER BY `cart_id` DESC");
                    $total_items = mysqli_num_rows($data);
                    if($total_items==0){
                        ?>
                        <div class="text-center">
                            <h2>Your Cart is Empty :)</h2>
                            <img src="../assets/empty cart.svg" style="height: 150px; margin: 2rem 0;" alt="empty cart">
                            <p>You don't have any items added to cart.</p>
                        </div>
                        <?php
                    }
                    $total_price = 0;
                    $shipping_charges = 0;
                    $additional_charges = 0;
                    while($row1=mysqli_fetch_array($data,MYSQLI_ASSOC)){
                        $cart_id = $row1['cart_id'];
                        $product_id = $row1['product_id_ref'];
                        $p_data = mysqli_query($way, "SELECT * FROM `stylin_products` WHERE `p_id`=$product_id;");
                        $row=mysqli_fetch_array($p_data,MYSQLI_ASSOC);
                        $p_id =$row['p_id'];
                        $p_category =$row['p_category'];
                        $p_subcategory =$row['p_subcategory'];
                        $p_name =$row['p_name'];
                        $p_type =$row['p_type'];
                        $p_color =$row['p_color'];
                        $p_size =$row['p_size'];
                        $p_price =$row['p_price'];
                        $p_discount =$row['p_discount'];
                        $discounted = ($p_price*$p_discount)/100;
                        $final_price = $p_price-$discounted;
                        $data1=mysqli_query($way,"SELECT * FROM `stylin_product_images` where p_image_ref=$p_id ORDER by p_image_ref asc limit 1");
                        $row_img=mysqli_fetch_array($data1,MYSQLI_ASSOC);
                        $p_image_name=$row_img['p_image_name'];
                        $total_price += $final_price;
                        $shipping_charges += 50; 
                        $additional_charges += ($final_price*5)/100;
                    ?>
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <img src="<?= $p_image_name ?>" class="w-100" alt="<?= $p_image_name ?>">
                        </div>
                        <div class="col-md-8 col-8">
                            <span class="category"><?= $p_category ?> <i class="bi bi-chevron-right"></i> <?= $p_subcategory ?></span>
                            <h5><?= $p_name ?></h5>
                            <h6>Rs.<?= $final_price ?> <del class="offer">Rs.<?= $p_price ?></del></h6>
                            <span class="details">Color: <?= $p_color ?></span> |
                            <span class="details">Size: <?= $p_size ?></span> |
                            <span class="details">Type: <?= $p_type ?></span><br>
                            <span class="details qty">
                                Quantity: <button class="btn btn-min" onclick="min(quantity<?=$p_id?>)">-</button><input type="button" id="quantity<?=$p_id?>" class="btn" value="1" readonly><button class="btn btn-add" onclick="add(quantity<?=$p_id?>)">+</button><br>
                            </span>
                            <button class="btn btn-remove btn-danger" onclick="rem(<?= $cart_id ?>)">Remove</button>
                        </div>
                    </div>
                    <hr>
                    <?php
                    }
                    ?>
            </div>
            <div class="col-md-4">
                <div class="order-summary">
                    <div class="card">
                        <div class="card-title">
                            Total <?= $total_items ?> item(s)
                        </div>
                        <div class="card-body">
                            <div class="price">Total : Rs.<?= $total_price ?></div>
                            <div class="price">Shipping : Rs.<?= $shipping_charges ?></div>
                            <div class="price">Taxes : Rs.<?= $additional_charges ?></div>
                        </div>
                        <?php
                            $grand_total = $total_price+$shipping_charges+$additional_charges;
                        ?>
                    </div>
                    <a class="form-control btn" href="checkout.php?prev=cart">Proceed to Pay (Rs.<?= $grand_total ?>)</a>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="js/cart.js"></script>

<?php 
    include_once('header_footer/footer.php'); 
?>