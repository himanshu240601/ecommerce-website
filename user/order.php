<?php
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true){
        header("location:../login.php");
    }
    include_once('header_footer/header.php');
    require_once("../config/db.php");
?>
<style>
    <?php
        include "css/placeorder.css";
    ?>
</style>
<h2 class="text-center" style="padding-top: 2rem">ORDERS</h2>
<?php
    $user_id = $_SESSION['user'];
    $data=mysqli_query($way,"SELECT * FROM `stylin_orders` WHERE `user_id_ref`='$user_id' ORDER BY `order_id` DESC;");
    $rowscount=mysqli_num_rows($data);
    if($rowscount==0){
    ?>
    <div class="container text-center" id="orderplaced">
        <h4>Currently You don't have any orders :)</h4>
        <img src="../assets/no orders.svg" style="margin:2rem 0;height:150px;" alt="">
    </div>
    <?php
    }
    else{
        ?>
        <div class="container" id="orderplaced">
            <div class="row gx-0">
                <div class="col-md-9">
                <?php
                    while($row=mysqli_fetch_array($data,MYSQLI_ASSOC)){
                        $order_id =$row['order_id'];
                        $product_id_ref =$row['product_id_ref'];
                        $product =$row['product'];
                        $deliver_to =$row['deliver_to'];
                        $delivery_add =$row['delivery_add'];
                        $state =$row['state'];
                        $zip_code =$row['zip_code'];
                        $price=$row['price'];
                        $status=$row['status'];
                        
                        $data1=mysqli_query($way,"SELECT * FROM `stylin_product_images` where `p_image_ref`='$product_id_ref' ORDER by p_image_id asc limit 1");
                        $row1=mysqli_fetch_array($data1,MYSQLI_ASSOC);
                        $p_image_name=$row1['p_image_name'];
                    ?>
                    <div class="row mb-5 gx-0">
                        <div class="col-md-4 col-4">
                            <img src="<?= $p_image_name ?>" class="w-100" alt="<?= $product ?>">
                        </div>
                        <div class="col-md-8 col-8" id="p-info">
                            <h4><?=$product?></h4>
                            <h6>Deliver to: <?=$deliver_to?></h6>
                            <h6>Address: <?=$delivery_add?>, <?=$state?></h6>
                            <h6>ZIP: <?=$zip_code?></h6>
                            <h6>Payable Amount: Rs.<?=$price?></h6>
                            <h6 class="fw-bold text-success mt-2" style="text-transform: uppercase"><?=$status?> <i class="bi bi-record-circle-fill"></i> </h6>
                        </div>
                    </div>
                <?php
            }
            ?>
            </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
        <?php
    }
    ?>
<?php    
    include_once('header_footer/footer.php');
?>