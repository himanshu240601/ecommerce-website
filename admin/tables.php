<?php
    include_once("header_footer/header.php");
?>
    <section id="data" class="col-md-10">
        <div class="current-offers">
            <h4>Current Offers</h4>
            <hr>
            <table class="table table-bordered table-hover">
                <thead class="table-primary" style="border-color: #cfe2ff;">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Information</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <?php
                require_once("../config/db.php");
                $data1=mysqli_query($way,"SELECT * FROM `stylin_slider_offers`");
                while($row=mysqli_fetch_array($data1,MYSQLI_ASSOC)){
                    $offer_id =$row['offer_id'];
                    $offer_category =$row['offer_category'];
                    $offer_title =$row['offer_title'];
                    $offer_desc =$row['offer_desc'];
                    $offer_info =$row['offer_info'];
                    ?>
                    <tbody>
                        <tr>
                        <th scope="row"><?= $offer_id ?></th>
                        <td><?= $offer_category ?></td>
                        <td><?= $offer_title ?></td>
                        <td><?= $offer_desc ?></td>
                        <td><?= $offer_info ?></td>
                        <td><button class="btn btn-danger" onclick="delete_data('<?= $offer_id; ?>')">Remove</button></td>
                        </tr>
                    <?php
                }
                ?>
                    </tbody>
            </table>
        </div>
        <div class="top-deals">
            <h4>Current Top Deals</h4>
            <hr>
            <table class="table table-bordered">
                <thead class="table-primary" style="border-color: #cfe2ff;">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price (in Rs.)</th>
                        <th scope="col">Discount (in Rs.)</th>
                        <th scope="col">Final Price (in Rs.)</th>
                    </tr>
                </thead>
                <?php
                $data2=mysqli_query($way,"SELECT * FROM `stylin_products` ORDER BY `p_discount` DESC LIMIT 6;");
                while($row=mysqli_fetch_array($data2,MYSQLI_ASSOC)){
                    $p_id =$row['p_id'];
                    $p_category =$row['p_category'];
                    $p_subcategory =$row['p_subcategory'];
                    $p_name =$row['p_name'];
                    $p_brand =$row['p_brand'];
                    $p_price =$row['p_price'];
                    $p_discount =$row['p_discount'];
                    $discounted = ($p_price*$p_discount)/100;
                    $final_price = $p_price-$discounted;
                    ?>
                    <tbody>
                    <tr>
                        <th scope="row"><?= $p_id ?></th>
                        <td><?= $p_category ?></td>
                        <td><?= $p_subcategory ?></td>
                        <td><?= $p_name ?></td>
                        <td><?= $p_brand ?></td>
                        <td><?= $p_price ?></td>
                        <td><?= $discounted ?></td>
                        <td><?= $final_price ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="popular-products">
            <h4>Current Popular Products</h4>
            <hr>
            <table class="table table-bordered">
            <thead class="table-primary" style="border-color: #cfe2ff;">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price (in Rs.)</th>
                    <th scope="col">Discount (in Rs.)</th>
                    <th scope="col">Final Price (in Rs.)</th>
                </tr>
            </thead>
            <?php
            $data2=mysqli_query($way,"SELECT * FROM `stylin_popular_products` order by p_popularity desc limit 12");
            while($row=mysqli_fetch_array($data2,MYSQLI_ASSOC)){
                $p_popular_ref=$row['p_popular_ref'];
                $data5=mysqli_query($way,"SELECT * FROM `stylin_products` WHERE `p_id`=$p_popular_ref");
                $row5=mysqli_fetch_array($data5,MYSQLI_ASSOC);
                $p_id =$row5['p_id'];
                $p_category =$row5['p_category'];
                $p_subcategory =$row5['p_subcategory'];
                $p_name =$row5['p_name'];
                $p_brand =$row5['p_brand'];
                $p_price =$row5['p_price'];
                $p_discount =$row5['p_discount'];
                $discounted = ($p_price*$p_discount)/100;
                $final_price = $p_price-$discounted;
                ?>
                <tbody>
                <tr>
                    <th scope="row"><?= $p_id ?></th>
                    <td><?= $p_category ?></td>
                    <td><?= $p_subcategory ?></td>
                    <td><?= $p_name ?></td>
                    <td><?= $p_brand ?></td>
                    <td><?= $p_price ?></td>
                    <td><?= $discounted ?></td>
                    <td><?= $final_price ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
        </div>
    </section>

    <script type="text/javascript">
        function delete_data(id)
        {
            let dec=confirm("Do yo want to delete "+id+" ?");
            if(dec){
                window.location = `delete.php?id=${id}`;
                alert("Record Deleted Successfully!")
            }
            else{
                alert("Deletion Cancelled!");
            }
        }
    </script>

<?php include_once("header_footer/footer.php"); ?>