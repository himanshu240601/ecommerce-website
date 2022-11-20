<title>Browse Catergories - Stylin</title>
<?php 
    include_once('header_footer/header.php');
?>
<style>
    <?php
        include "css/shop.css"; 
    ?>
</style>

<section class="container tab">
    <div class="row">
        <div class="col-md-6">
            <ul class="tab-links" id="tabLinks">
                <li><a class="link active-tab-link" id="all" onclick="dataBySubmenu('')">All</a></li>
                <li><a class="link" id="mens" onclick="dataBySubmenu(this.id)">Mens</a></li>
                <li><a class="link" id="womens" onclick="dataBySubmenu(this.id)">Womens</a></li>
                <li><a class="link" id="accessories" onclick="dataBySubmenu(this.id)">Accessories</a></li>
                <li><a class="link" id="shoes" onclick="dataBySubmenu(this.id)">Shoes</a></li>
                <li><a class="link" id="bags" onclick="dataBySubmenu(this.id)">Bags</a></li>
            </ul>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3 text-end">
            <button class="btn filter"><i class="bi bi-filter"></i> Filter</button>
        </div>
    </div>
</section>

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
                <input type="range" min="100" max="10000" value="10000" step="100" name="price-range" class="w-100" onchange="document.getElementById('max_price').innerHTML = this.value">
                <div class="row">
                    <div class="col-6">
                        Rs.<span id="min_price">100</span>+
                    </div>
                    <div class="col-6 text-end">
                        Rs.<span id="max_price">10,000</span>+
                    </div>
                </div>
            </div>
        </div>
</section>

<section id="all-products" class="container">
    <div class="row gx-0" id="list-products">
    </div>
    <div class="text-center">
        <a href="#" class="btn btn-secondary">Load More</a>
    </div>
</section>

<script type="text/javascript" src="js/shop.js"></script>
<script type="text/javascript" src="js/filtertoggle.js"></script>

<?php 
    include_once('header_footer/footer.php'); 
?>