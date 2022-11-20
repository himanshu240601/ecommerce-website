<?php 
    error_reporting(1);
    session_start();
    if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true){
        header("location:../login.php");
    }
    include_once('header_footer/header.php');
    require_once('../config/db.php');
    $user_id = $_SESSION['user'];
    $shipping_charges=0;
    $additional_charges=0;
    $total_items = 1;
    if($_GET['prev']!='cart'){
        $p_id = $_GET['id'];
        $data=mysqli_query($way,"SELECT * FROM `stylin_products` where `p_id`=$p_id");
        $row=mysqli_fetch_array($data,MYSQLI_ASSOC);
        $p_name = $row['p_name'];
        $p_price = $row['p_price'];
        $p_discount = $row['p_discount'];
        $discounted = ($p_price*$p_discount)/100;
        $final_price = $p_price-$discounted;
        $shipping_charges += 50;
        $additional_charges += ($final_price*5)/100;
    }
    else{
        $data = mysqli_query($way, "SELECT `product_id_ref`, `cart_id` FROM `stylin_cart` WHERE `user_id_ref`='$user_id'");
        $total_items = mysqli_num_rows($data);
        $final_price=0;
        while($row1=mysqli_fetch_array($data,MYSQLI_ASSOC)){
            $product_id_ref = $row1['product_id_ref'];
            $p_data = mysqli_query($way, "SELECT * FROM `stylin_products` WHERE `p_id`=$product_id_ref;");
            $row=mysqli_fetch_array($p_data,MYSQLI_ASSOC);
            $p_id =$row['p_id'];
            $p_name =$row['p_name'];
            $p_price =$row['p_price'];
            $p_discount =$row['p_discount'];
            $discounted = ($p_price*$p_discount)/100;
            $f_price = $p_price-$discounted;
            $final_price += $f_price;
            $shipping_charges += 50; 
            $additional_charges += ($f_price*5)/100;
        }
    } 
    $grand_total = $final_price+$shipping_charges+$additional_charges;

    //Place Order
    extract($_POST);
    if(isset($purchase)){
        $name = $firstname." ".$last_name;
        if($_GET['prev']!='cart'){
            $place_order = "INSERT INTO `stylin_orders`(`product`, `product_id_ref`,`user_id_ref`, `deliver_to`, `delivery_add`, `state`, `zip_code`, `price`) VALUES ('$p_name','$p_id','$user_id','$name','$address','$state','$zipcode','$grand_total')";
            if(mysqli_query($way,$place_order)){
                echo "<script>window.location.href='order.php';</script>";
                exit;
            }
        }
        else{
            $data = mysqli_query($way, "SELECT `product_id_ref`, `cart_id` FROM `stylin_cart` WHERE `user_id_ref`='$user_id' ORDER BY `cart_id` DESC");
            while($row1=mysqli_fetch_array($data,MYSQLI_ASSOC)){
                $product_id_ref = $row1['product_id_ref'];
                $p_data = mysqli_query($way, "SELECT * FROM `stylin_products` WHERE `p_id`=$product_id_ref;");
                $row=mysqli_fetch_array($p_data,MYSQLI_ASSOC);
                $p_id =$row['p_id'];
                $p_name =$row['p_name'];
                $place_order = "INSERT INTO `stylin_orders`(`product`, `product_id_ref`,`user_id_ref`, `deliver_to`, `delivery_add`, `state`, `zip_code`, `price`) VALUES ('$p_name','$p_id','$user_id','$name','$address','$state','$zipcode','$grand_total')";
                mysqli_query($way,$place_order);
            }
            echo "<script>window.location.href='order.php';</script>";
            exit;
        }
    }
?>
<style>
    <?php
        include 'css/cart.css';
        include 'css/checkout.css';
    ?>
</style>

<div class="container" id="checkout">
    <h2 class="text-center">CHECKOUT</h2>
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-3">Billing address</h4>
            <form method='post'>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" id="firstName" name="firstname" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" placeholder="abc@example.com">
                </div>
                <div class="mb-3">
                    <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input type="text" class="form-control" id="zip" placeholder="ZIP" name="zipcode">
                    </div>
                    <div class="col-md-9 mb-3">
                        <select name="state" id="state" class="form-select">
                            <option value="">Select State</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Uttrakhand">Uttrakhand</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Tamilnadu">Tamilnadu</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-danger" name="purchase">Purchase</button>
            </form>
        </div>
        <div class="col-md-4">
            <div class="order-summary">
                <div class="card">
                    <div class="card-title">
                        Total <?= $total_items ?> item(s)
                    </div>
                    <div class="card-body">
                        <div class="price">Total : Rs.<?= $final_price ?></div>
                        <div class="price">Shipping : Rs.<?= $shipping_charges ?></div>
                        <div class="price">Taxes : Rs.<?= $additional_charges ?></div>
                    </div>
                </div>
                <div class="price bg-danger text-light p-3">Grand Total: Rs.<?= $grand_total ?></div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once('header_footer/footer.php');
?>