<?php 
    include_once('header_footer/header.php');
    require_once("../config/db.php");
    $query = $_GET['query'];
?>
<style>
    <?php
        include "css/shop.css"; 
    ?>
</style>

<title><?=$query?> - Search</title>
<section class="container tab">
    <div class="row">
        <div class="col-md-6">
            <h4>Search results for '<?= $query ?>'</h4>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3 text-end">
            <button class="btn filter"><i class="bi bi-filter"></i> Filter</button>
        </div>
    </div>
</section>

<!-- filter box -->
<section id="filters" class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <h6>Sort By</h6>
            <ul>
                <li><a href="">Relevant</a></li>
                <li><a href="">Popular</a></li>
                <li><a href="">New Arrivals</a></li>
                <li><a href="">Price: Low to High</a></li>
                <li><a href="">Price: High to Low</a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-4">
            <h6>Color</h6>
            <ul>
                <li><a href="">Beige</a></li>
                <li><a href="">Black</a></li>
                <li><a href="">Blue</a></li>
                <li><a href="">Red</a></li>
                <li><a href="">Yellow</a></li>
                <li><a href="">Green</a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-4">
            <h6>Brand</h6>
            <ul>
                <li><a href="">Addidas</a></li>
                <li><a href="">Nike</a></li>
                <li><a href="">Jack & Jones</a></li>
                <li><a href="">Puma</a></li>
                <li><a href="">Peter England</a></li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-4">
            <h6>Price</h6>
            <input type="range" min="100" max="10000" value="10000" name="price-range" class="w-100">
            <div class="row">
                <div class="col-6">
                    Rs.100+
                </div>
                <div class="col-6 text-end">
                    Rs.10,000+
                </div>
            </div>
        </div>
    </div>
</section>

<!-- search results -->
<section id="all-products" class="container">
    <div class="row gx-0" id="list-products">
    <?php
        $data=mysqli_query($way,"SELECT * FROM `stylin_products` WHERE `p_name` LIKE '%$query%' or `p_category` = '$query' or `p_subcategory` LIKE '%$query%' or `p_brand` = '$query' ORDER BY `p_id` DESC;");
        $rowscount=mysqli_num_rows($data);
        if($rowscount){
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
                            <span class="user-rating">4.5 <i class="bi bi-star-fill"></i></span>
                            <a href="product.php?prev=search.php&id=<?= $p_id ?>"><h5><?= $p_name ?></h5></a>
                            <h6>Rs.<?= $final_price ?> <del class="offer">Rs.<?= $p_price ?></del> </h6>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
        else{
            ?>
            <div class="container text-center no-results-found">
                <h2>No Results Found :(</h2>
                <img src="../assets/not found.svg" style="height: 150px; margin: 2rem 0;" alt="no results found">
                <p>We couldn't find products related to your search. Please check the spelling or Try! searching something else.</p>
            </div>
            <?php
        }
    ?>
    </div>
</section>

<script type="text/javascript" src="js/filtertoggle.js"></script>

<?php 
    include_once('header_footer/footer.php'); 
?>