<?php
    include_once("header_footer/header.php");

    $order_data = mysqli_query($way, "SELECT * FROM `stylin_orders` ORDER BY `order_id` DESC");
    $order_data_rows = mysqli_num_rows($order_data);
    if($order_data_rows==0){
        ?>
        <section id="user-orders" class="col-md-10">
            <h4 class="text-center p-5">No Orders</h4>
        </section>
        <?php
    }
    else{
?>
    <section id="user-orders" class="col-md-10">
        <h4 class="mt-4 mx-3">Active Orders</h4>
        <hr>
        <div class="order-table">
            <table class="table table-bordered table-hover">
                <thead class="table-primary" style="border-color: #cfe2ff;">
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Product Id Ref</th>
                        <th scope="col">User Id Ref</th>
                        <th scope="col">Product</th>
                        <th scope="col">Deliver To</th>
                        <th scope="col">Delivery Address</th>
                        <th scope="col">ZIP Code</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                    $p_orders = mysqli_query($way, "SELECT * FROM `stylin_orders` WHERE `status`='Order Placed'");
                    $placed_orders = mysqli_num_rows($p_orders);
                    if($placed_orders==0){
                        ?>
                            <tbody>
                                <td colspan="10" class="text-center">
                                    No Active Orders
                                </td>
                            </tbody>
                        <?php
                    }
                    else{
                        while($row=mysqli_fetch_array($p_orders,MYSQLI_ASSOC)){
                            $order_id = $row['order_id'];
                            $product_id_ref = $row['product_id_ref'];
                            $user_id_ref = $row['user_id_ref'];
                            $product = $row['product'];
                            $deliver_to = $row['deliver_to'];
                            $delivery_add = $row['delivery_add'];
                            $state = $row['state'];
                            $zip_code = $row['zip_code'];
                            $price = $row['price'];
                            $status = $row['status'];
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $order_id ?></th>
                                    <td><?= $product_id_ref ?></td>
                                    <td><?= $user_id_ref ?></td>
                                    <td><?= $product ?></td>
                                    <td><?= $deliver_to ?></td>
                                    <td><?= $delivery_add.", ".$state ?></td>
                                    <td><?= $zip_code ?></td>
                                    <td><?= "Rs.".$price ?></td>
                                    <td><?= $status ?></td>
                                    <td>
                                        <button class="btn btn-success" onclick="order_completed('<?= $order_id; ?>')"><i class="bi bi-check2"></i></button>
                                        <button class="btn btn-danger" onclick="order_cancelled('<?= $order_id; ?>')"><i class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
        <h4 class="mt-4 mx-3">Completed Orders</h4>
        <hr>
        <div class="completed-order-table">
            <table class="table table-bordered table-hover">
                <thead class="table-primary" style="border-color: #cfe2ff;">
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Product Id Ref</th>
                        <th scope="col">User Id Ref</th>
                        <th scope="col">Product</th>
                        <th scope="col">Delivered To</th>
                        <th scope="col">Delivery Address</th>
                        <th scope="col">ZIP Code</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <?php
                    $c_orders = mysqli_query($way, "SELECT * FROM `stylin_orders` WHERE `status`='Completed'");
                    $completed_orders = mysqli_num_rows($c_orders);
                    if($completed_orders==0){
                        ?>
                            <tbody>
                                <td colspan="10" class="text-center">
                                    No Completed Orders
                                </td>
                            </tbody>
                        <?php
                    }
                    else{
                        while($row=mysqli_fetch_array($c_orders,MYSQLI_ASSOC)){
                            $order_id = $row['order_id'];
                            $product_id_ref = $row['product_id_ref'];
                            $user_id_ref = $row['user_id_ref'];
                            $product = $row['product'];
                            $deliver_to = $row['deliver_to'];
                            $delivery_add = $row['delivery_add'];
                            $state = $row['state'];
                            $zip_code = $row['zip_code'];
                            $price = $row['price'];
                            $status = $row['status'];
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $order_id ?></th>
                                    <td><?= $product_id_ref ?></td>
                                    <td><?= $user_id_ref ?></td>
                                    <td><?= $product ?></td>
                                    <td><?= $deliver_to ?></td>
                                    <td><?= $delivery_add.", ".$state ?></td>
                                    <td><?= $zip_code ?></td>
                                    <td><?= "Rs.".$price ?></td>
                                    <td> <i class="bi bi-check-circle-fill text-success"></i> <?= $status ?></td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    }
                    ?>
            </table>
        </div>
    </section>

    <script type="text/javascript">
        function order_completed(id){
            let dec=confirm("Click 'Ok' to Proceed.");
            if(dec){
                window.location = `order_completed.php?id=${id}`;
            }
            else{
                alert("Cancelled!");
            }
        }
    </script>
<?php
    }
    include_once("header_footer/footer.php");
?>