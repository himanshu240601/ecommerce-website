<title>Online Shopping Store - Stylin</title>
<?php 
    include_once('header_footer/header.php');
    require_once('../config/db.php');
?>
<style>
    <?php
        include_once('css/style.css');
        include_once('slick/slick.css');
        include_once('slick/slick-theme.css');
    ?>
</style>

<!-- Slider -->
<section id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
    <?php
        $i=0;
        $data1=mysqli_query($way,"SELECT * FROM `stylin_slider_offers` ORDER BY `offer_id` DESC");
        while($row1=mysqli_fetch_array($data1,MYSQLI_ASSOC))
        {
            $offer_category = $row1['offer_category'];
            $offer_title = $row1['offer_title'];
            $offer_desc = $row1['offer_desc'];
            $offer_info = $row1['offer_info'];
            $offer_image = $row1['offer_image'];

            if($i==0){
                $i++;
                ?>
                <div class="carousel-item active">
                    <img src="<?= $offer_image ?>" class="d-block w-100" alt="<?= $offer_title ?>">
                    <div class="details">
                        <span class="category"><?= $offer_category ?></span>
                        <h1><?= $offer_title ?></h1>
                        <h4><?= $offer_desc ?></h4>
                        <p><?= $offer_info ?></p>
                        <a href="browse.php" class="btn btn-dark">Shop Now</a>
                    </div>
                </div>
                <?php
            }
            else{
                ?>
                <div class="carousel-item">
                    <img src="<?= $offer_image ?>" class="d-block w-100" alt="<?= $offer_title ?>">
                    <div class="details">
                        <span class="category"><?= $offer_category ?></span>
                        <h1><?= $offer_title ?></h1>
                        <h4><?= $offer_desc ?></h4>
                        <p><?= $offer_info ?></p>
                        <a href="browse.php" class="btn btn-dark">Shop Now</a>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</section>

<!-- Brands -->
<section class="container" id="brands">
    <div class="row align-items-center">
        <div class="col">
            <img src="../assets/brands/adidas.png" class="w-100" alt="adidas">
        </div>
        <div class="col">
            <img src="../assets/brands/louis philippe.png" class="w-100" alt="louis-philippe">
        </div>
        <div class="col">
            <img src="../assets/brands/levis.png" class="w-100" alt="levis">
        </div>
        <div class="col">
            <img src="../assets/brands/Calvin Klein.png" class="w-100" alt="calvin-klein">
        </div>
        <div class="col">
            <img src="../assets/brands/nike.png" class="w-100" alt="nike">
        </div>
        <div class="col">
            <img src="../assets/brands/puma.png" class="w-100" alt="puma">
        </div>
        <div class="col">
            <img src="../assets/brands/H&M.png" class="w-100" alt="h&m">
        </div>
        <div class="col">
            <img src="../assets/brands/chanel.png" class="w-100" alt="chanel">
        </div>
        <div class="col">
            <img src="../assets/brands/pepe.png" class="w-100" alt="pepe-jeans">
        </div>
        <div class="col">
            <img src="../assets/brands/flying machine.png" class="w-100" alt="flying-machine">
        </div>
    </div>
</section>

<!-- Topdeals -->
<section id="topdeals">
    <div class="container">
        <h2 class="text-light text-center">TOP DEALS</h2>
        <div class="slider">
            <?php
                $data2=mysqli_query($way,"SELECT * FROM `stylin_products` ORDER BY `p_discount` DESC LIMIT 6;");
                while($row2=mysqli_fetch_array($data2,MYSQLI_ASSOC)){
                    $p_id = $row2['p_id'];
                    $p_name = $row2['p_name'];
                    $p_price = $row2['p_price'];
                    $p_discount = $row2['p_discount'];
                    $discounted = ($p_price*$p_discount)/100;
                    $final_price = $p_price-$discounted;
                    $img_dat=mysqli_query($way,"SELECT * FROM `stylin_product_images` where p_image_ref=$p_id ORDER by p_image_ref asc limit 1");
                    $img_row=mysqli_fetch_array($img_dat,MYSQLI_ASSOC);
                    $p_image_name=$img_row['p_image_name'];
            ?>
            <div class="card">
                <img src="<?= $p_image_name ?>" class="card-img-top" alt="<?= $p_name ?>">
                <div class="card-body">
                    <span class="user-rating">4.5 <i class="bi bi-star-fill"></i></span>
                    <a href="product.php?prev=index.php&id=<?= $p_id ?>">
                        <h5><?= $p_name ?></h5>
                    </a>
                    <h6>Rs.<?= $final_price ?> <del class="offer">Rs.<?= $p_price ?></del></h6>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Featured -->
<section id="featured" class="container">
    <h2 class="text-center">FEATURED</h2>
    <div class="row gx-0">
        <div class="col-lg-4 col-md-6">
            <div class="f-box">
            <img src="../assets/product images/tshirt.jpg" class="w-100" alt="black-tshirt">
            <div class="featured-details">
                <span class="category">Mens</span>
                <h4>T-shirts Collection</h4>
                <h6>Starting at Rs.299</h6>
                <a href="browse.php">Shop Now <i class="bi bi-chevron-right"></i></a>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="f-box">
            <img src="../assets/product images/white shoes.png" class="w-100" alt="white-shoes">
            <div class="featured-details">
                <span class="category">Footwear</span>
                <h4>Shoes Collection</h4>
                <h6>Starting at Rs.999</h6>
                <a href="browse.php">Shop Now <i class="bi bi-chevron-right"></i></a>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="f-box">
            <img src="../assets/product images/whitetop.png" class="w-100" alt="white-top">
            <div class="featured-details">
                <span class="category">Womens</span>
                <h4>Western Collection</h4>
                <h6>Starting at Rs.299</h6>
                <a href="browse.php">Shop Now <i class="bi bi-chevron-right"></i></a>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Dealofday -->
<section id="dealofday">
    <div class="container">
        <div class="row">
            <?php
                $data3 = mysqli_query($way,"SELECT * FROM `stylin_products` ORDER BY `p_discount` DESC LIMIT 1;");
                $row3 = mysqli_fetch_array($data3,MYSQLI_ASSOC);
                $p_id = $row3['p_id'];
                $p_name = $row3['p_name'];
                $p_price = $row3['p_price'];
                $p_discount = $row3['p_discount'];
                $discounted = ($p_price*$p_discount)/100;
                $final_price = $p_price-$discounted;
                $img_dat = mysqli_query($way,"SELECT * FROM `stylin_product_images` where p_image_ref=$p_id ORDER by p_image_ref asc limit 1");
                $img_row = mysqli_fetch_array($img_dat,MYSQLI_ASSOC);
			    $p_image_name=$img_row['p_image_name'];
            ?>
            <div class="col-md-5">
                <img src="<?= $p_image_name ?>" class="w-100" alt="white-sneakers">
            </div>
            <div class="col-md-7 text-center">
                <h3>Deal of The Day</h3>
                <h2><?= $p_name ?></h2>
                <h4>at Rs.<?= $final_price ?> <del>Rs.<?= $p_price ?></del></h4>
                <h5>Grab it Now!</h5>
                <a href="product.php?prev=index.php&id=<?= $p_id ?>" class="btn btn-dark">Buy Now</a>
            </div>
        </div>
    </div>
</section>

<!-- products -->
<section id="products" class="container">
    <h2 class="text-center">POPULAR</h2>
    <div class="row gx-0">
        <?php
            $data4=mysqli_query($way,"SELECT * FROM `stylin_popular_products` ORDER BY p_popularity DESC LIMIT 12");
            while($row4=mysqli_fetch_array($data4,MYSQLI_ASSOC))
            {
                $p_popular_ref = $row4['p_popular_ref'];

                $data5 = mysqli_query($way,"SELECT * FROM `stylin_products` WHERE `p_id`=$p_popular_ref");
                $row5 = mysqli_fetch_array($data5,MYSQLI_ASSOC);

                $p_id = $row5['p_id'];
                $p_name = $row5['p_name'];
                $p_price = $row5['p_price'];
                $p_discount = $row5['p_discount'];
                $discounted = ($p_price*$p_discount)/100;
                $final_price = $p_price-$discounted;

                $img_dat=mysqli_query($way,"SELECT * FROM `stylin_product_images` WHERE p_image_ref=$p_id ORDER BY p_image_ref ASC LIMIT 1");
                $img_row=mysqli_fetch_array($img_dat,MYSQLI_ASSOC);
                $p_image_name=$img_row['p_image_name'];
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="card">
                    <img src="<?= $p_image_name ?>" class="card-img-top" alt="<?= $p_name ?>">
                    <div class="card-body">
                    <span class="user-rating">4.5 <i class="bi bi-star-fill"></i></span>
                    <a href="product.php?prev=index.php&id=<?= $p_id ?>"><h5><?= $p_name ?></h5></a>
                    <h6>Rs.<?= $final_price ?> <del class="offer">Rs.<?= $p_price ?></del> </h6>
                    </div>
                    </div>
                    </div>
                <?php
            }
        ?>
    </div>
    <div class="text-center">
        <a href="browse.php" class="btn btn-secondary">View More</a>
    </div>
</section>

<!-- Slickjs -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/slickslider.js"></script>

<?php 
    include_once('header_footer/footer.php'); 
?>