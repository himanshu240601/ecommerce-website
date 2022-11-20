<?php 
    include_once('header_footer/header.php');
?>
<style>
    <?php include "css/product.css";?>
</style>

<?php
    require_once('../config/db.php');
    error_reporting(0);
    $prev_page = $_GET["prev"];
    $p_id = $_GET["id"];
    $user_id = $_SESSION['user'];

    //Reviews
    extract($_POST);
	if(isset($submit_review))
	{
        $sql="INSERT INTO `stylin_user_reviews` (`product_id_ref`, `user_id_ref`, `user_review`, `user_rating`) VALUES ('$p_id','$user_id','$ureview','$urating')";
        if(mysqli_query($way,$sql)){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
    
    //For Product
    $data = mysqli_query($way,"SELECT * FROM `stylin_products` WHERE `p_id`='$p_id'");
    $row = mysqli_fetch_array($data,MYSQLI_ASSOC);
    $p_category = $row['p_category'];
    $p_subcategory = $row['p_subcategory'];
    $p_name = $row['p_name'];
    $p_information = $row['p_information'];
    $p_description = $row['p_description'];
    $p_type = $row['p_type'];
    $p_color = $row['p_color'];
    $p_size = $row['p_size'];
    $p_material = $row['p_material'];
    $p_price = $row['p_price'];
    $p_discount = $row['p_discount'];
    $discounted = ($p_price*$p_discount)/100;
    $final_price = $p_price-$discounted;
    
    /* For popular product fetch */
    $pop_data=mysqli_query($way,"SELECT * FROM `stylin_popular_products` WHERE `p_popular_ref`='$p_id'");
    $count=mysqli_num_rows($pop_data);
    if($count==0)
    {
        mysqli_query($way,"INSERT INTO `stylin_popular_products`(`p_popular_ref`, `p_popularity`) VALUES ('$p_id',1)");
    }
    else
    {
        $pop_row=mysqli_fetch_array($pop_data,MYSQLI_ASSOC);
        $product_pop=$pop_row['p_popularity'];
        $product_pop++;
        mysqli_query($way,"UPDATE `stylin_popular_products` SET `p_popularity`='$product_pop' WHERE `p_popular_ref`='$p_id'");
    }
    ?>

    <title><?= $p_name ?></title>
    
    <!-- Bread Navigation -->
    <nav class="container-fluid breadnav" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $prev_page ?>">Back</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $p_name ?></li>
        </ol>
    </nav>

    <!-- Product -->
    <section id="product" class="container">
        <div class="row g-0" id="product-summary">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php
                            $i=0;
                            $data=mysqli_query($way,"SELECT * FROM `stylin_product_images` WHERE p_image_ref=$p_id ORDER BY p_image_ref ASC");
                            while($row=mysqli_fetch_array($data,MYSQLI_ASSOC)){
                                $p_image_name=$row['p_image_name'];
                                if($i==0){
                                    $i++;
                                ?>
                                    <div class="carousel-item active">
                                        <img src="<?= $p_image_name ?>" class="d-block w-100" alt="<?= $p_image_name ?>">
                                    </div>
                                <?php
                                }
                                else{
                                ?>
                                    <div class="carousel-item">
                                        <img src="<?= $p_image_name ?>" class="d-block w-100" alt="<?= $p_image_name ?>">
                                    </div>
                                <?php
                                }
                            ?>
                            <?php
                            }
                            ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-6" id="product-summary-details">
                <span class="category"><?= $p_category ?> <i class="bi bi-chevron-right"></i> <?= $p_subcategory ?></span>
                <h2><?= $p_name ?></h5></h2>
                <h4>Rs.<?= $final_price ?> <del>Rs.<?= $p_price ?></del></h4>
                <!-- user-ratings -->
                <div class="star-reviews">
                <?php
                    for($i=0;$i<4;$i++){
                        echo "<i class='bi bi-star-fill'></i>";
                    }
                ?>    
                </div>
                <p class="product-summary">
                    <?= $p_information ?>
                </p>
                <div class="d-flex">
                    <div class="product-color">
                        <span>Color : <?= $p_color ?></span>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="product-size">
                        <span>Size : <?= $p_size ?></span>
                    </div>
                </div>
                <div class="buttons">
                    <?php
                        if(isset($_SESSION['user'])){
                            $username = $_SESSION['user'];
                            $data = mysqli_query($way, "SELECT * FROM `stylin_cart` WHERE `user_id_ref`='$username' AND `product_id_ref`='$p_id';");
                            if(mysqli_num_rows($data)==0){
                            ?>
                                <button class="btn btn-remove btn-outline-dark" onclick="cart(<?= $p_id ?>)"><i class="bi bi-bag"></i> Add to Cart</button>
                            <?php
                            }
                            else{
                            ?>
                                <a class="btn btn-primary" href="cart.php"><i class="bi bi-check-lg"></i> Added to Cart</a>
                            <?php
                            }
                        }
                        else{
                            ?>
                            <a class="btn btn-remove btn-outline-dark" href="../login.php"><i class="bi bi-bag"></i> Add to Cart</a>
                            <?php
                        }
                    ?>
                    <a class="btn btn-danger" href="<?php
                        echo isset($_SESSION['user']) ? "checkout.php?id=".$p_id : '../login.php';?>">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Product Information -->
        <div id="product-description">
            <div class="card" style="border: 1px solid gainsboro; border-radius: 0;">
                <div class="card-body">
                    <div class="d-flex">
                        <a class="card-title card-title-active" id="link-description">Description</a>
                        <a class="card-title" id="link-details">Details</a>
                        <a class="card-title" id="link-reviews-by-buyers">Reviews</a>
                    </div>

                    <div class="card-inside">
                        <!-- Description -->
                        <div class="card-info container" id="description">
                            <p class="card-text">
                                <?= $p_description ?>
                            </p>
                        </div>

                        <!-- Details -->
                        <div class="card-info container" id="details" style="display:none">
                            <span class="weight"><strong>Type</strong>: <?= $p_type ?></span><br />
                            <span class="material"><strong>Materials</strong>: <?= $p_material ?></span><br />
                            <span class="mat-col"><strong>Color</strong>: <?= $p_color ?></span><br />
                            <span class="mat-size"><strong>Size</strong>: <?= $p_size ?></span><br />
                        </div>

                        <!-- Reviews -->
                        <div class="card-info container" id="reviews-by-buyers" style="display:none">
                            <div class="row g-0">
                                <?php
                                    $dataRev=mysqli_query($way,"SELECT * FROM `stylin_user_reviews` WHERE `product_id_ref`='$p_id' ORDER BY `review_id` DESC");
                                    while($rowRev=mysqli_fetch_array($dataRev,MYSQLI_ASSOC)){    
                                        $user_id_ref =$rowRev['user_id_ref'];
                                        $user_review =$rowRev['user_review'];
                                        $user_rating =$rowRev['user_rating'];
                                    ?>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-2 col-4">
                                                <img src='../assets/review/man.png' class="w-100" alt="">
                                            </div>
                                            <div class="col-lg-11 col-md-10 col-8">
                                                <h5><?= $user_id_ref ?></h5>
                                                <span class="star-reviews" style="margin: 0">
                                                    <?php
                                                        for($i=0;$i<$user_rating;$i++){
                                                            echo "<i class='bi bi-star-fill'></i>";
                                                        }
                                                    ?>
                                                </span>
                                                <p><?= $user_review ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                ?>
                            </div>

                            <?php
                                if(isset($_SESSION['user'])){
                                ?>
                                    <div class="add-a-review">
                                        <h4>Add a Review</h4>
                                        <form method='post'>
                                            <div>
                                                <label>Your Rating:</label> 
                                                <?php
                                                    for($i=0;$i<5;$i++){
                                                    ?>
                                                        <span class="bi bi-star" id="<?php echo $i+1 ?>" onclick="checkRev(this.id)"></span>
                                                        <?php
                                                    }
                                                ?>
                                                <input type="text" id="urating" value="" name="urating" style="display: none;">
                                            </div>
                                            <label>Your Review:</label>
                                            <textarea name="ureview" id="ureview" class="form-control" rows="3"></textarea>
                                            <button type="submit" class="btn btn-dark" name="submit_review">Submit</button>
                                        </form>
                                    </div>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="row g-0" id="related-items">
            <h2 class="text-center">RELATED PRODUCTS</h2>
            <div class="row g-0">
                <?php
                    $data1=mysqli_query($way,"SELECT * FROM `stylin_products` WHERE `p_subcategory`='$p_subcategory' AND `p_id` != '$p_id'");
                    while($row1=mysqli_fetch_array($data1,MYSQLI_ASSOC)){
                        $p_id2 =$row1['p_id'];
                        $p_name =$row1['p_name'];
                        $p_price =$row1['p_price'];
                        $p_discount =$row1['p_discount'];
                        $discounted = ($p_price*$p_discount)/100;
                        $final_price = $p_price-$discounted;

                        $data2=mysqli_query($way,"SELECT * FROM `stylin_product_images` WHERE p_image_ref=$p_id2 ORDER by p_image_ref ASC LIMIT 1");
                        $row2=mysqli_fetch_array($data2,MYSQLI_ASSOC);
                        $p_image_name=$row2['p_image_name'];
                        ?>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <img src="<?= $p_image_name ?>" class="card-img-top" alt="<?= $p_name ?>">
                                <div class="card-body">
                                    <h6><span class="user-rating">4.5 <i class="bi bi-star-fill"></i></span></h6>
                                    <a href="?prev=browse.php&id=<?= $p_id2 ?>"><h5><?= $p_name ?></h5></a>
                                    <h6>Rs.<?= $final_price ?> <del class="offer">Rs.<?= $p_price ?></del></h6>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="js/addtocart.js"></script>
    <script type="text/javascript" src="js/product.js"></script>

<?php 
    include_once('header_footer/footer.php'); 
?>