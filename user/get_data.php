<?php  
    require_once("../config/db.php");
    if($_POST){
        $category=$_POST['data'];
        if($category){
            $data=mysqli_query($way,"SELECT * FROM `stylin_products` WHERE `p_category`='$category' or `p_subcategory`='$category' ORDER BY `p_id` DESC");
        }
        else{
            $data=mysqli_query($way,"SELECT * FROM `stylin_products` ORDER BY `p_id` DESC");
        }
    while($row=mysqli_fetch_array($data,MYSQLI_ASSOC)){
        $p_id =$row['p_id'];
        $p_name =$row['p_name'];
        $p_price =$row['p_price'];
        $p_discount =$row['p_discount'];
        $discounted = ($p_price*$p_discount)/100;
        $final_price = $p_price-$discounted;
        $data1=mysqli_query($way,"SELECT * FROM `stylin_product_images` where p_image_ref=$p_id ORDER by p_image_ref asc limit 1");
        $row1=mysqli_fetch_array($data1,MYSQLI_ASSOC);
        $p_image_name=$row1['p_image_name'];
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
        <div class="card">
            <img src="<?= $p_image_name ?>" class="card-img-top" alt="<?= $p_name ?>">
            <div class="card-body">
                <span class="user-rating" onclick="addtofav(<?= $p_id ?>)">4.5 <i class="bi bi-star-fill"></i></span>
                <a href="product.php?prev=browse.php&id=<?= $p_id ?>"><h5><?= $p_name ?></h5></a>
                <h6>Rs.<?= $final_price ?> <del class="offer">Rs.<?= $p_price ?></del> </h6>
            </div>
        </div>
    </div>
    <?php
    }
    }
?>