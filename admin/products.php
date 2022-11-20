<?php
    include_once("header_footer/header.php");
?>

<?php  
		require_once("../config/db.php");
		extract($_POST);
		if(isset($addproduct))
		{
			$sql="INSERT INTO `stylin_products` (`p_category`, `p_subcategory`, `p_name`, `p_brand`, `p_information`, `p_description`, `p_type`, `p_color`, `p_size`, `p_material`, `p_quantity`, `p_price`, `p_discount`) VALUES ('$pcategory','$psubcategory','$pname','$pbrand','$psummary','$pdescription','$ptype','$pcolor','$psize','$pmaterial',$pquantity,$pprice,'$pdiscount')";
			if(mysqli_query($way,$sql)){
                $data=mysqli_query($way,"SELECT `p_id` FROM `stylin_products` order by p_id desc limit 1");
                $row=mysqli_fetch_array($data,MYSQLI_ASSOC);
				$id=$row['p_id'];
                
                foreach($_FILES["pimages"]["tmp_name"] as $key=>$tmp_name){
                    $image_name=$_FILES["pimages"]["name"][$key];
                    $image_tmp=$_FILES["pimages"]["tmp_name"][$key];
                    $image_upload="../assets/product images/$image_name";
                    move_uploaded_file($image_tmp,$image_upload);
                    mysqli_query($way,"INSERT INTO `stylin_product_images`(`p_image_ref`, `p_image_name`) VALUES ($id,'$image_upload')");
                }
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Product Addded Successfully!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
			}
        else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Error Adding Product!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }		
?>	

<section id="add-products" class="col-md-10">
    <h4 class="mt-4 mx-3">Add New Products</h4>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="pcategory">
                <option selected>Select Category</option>
                <option value="mens">Mens</option>
                <option value="womens">Womens</option>
                <option value="kids">Kids</option>
                <option value="accessories">Accessories</option>
                <option value="bags">Bags</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="psubcategory">
                <option selected>Select Sub Category</option>
                <option value="shirt">Shirt</option>
                <option value="jeans">Jeans</option>
                <option value="tshirts">T-Shirts</option>
                <option value="top">Top</option>
                <option value="sweatshirt">Sweatshirt</option>
                <option value="sweater">Sweater</option>
                <option value="shoes">Shoes</option>
                <option value="watches">Watches</option>
                <option value="glasses">Glasses</option>
                <option value="jewellery">Jewellery</option>
                <option value="travelbag">Travel Bag</option>
                <option value="handbag">Handbag</option>
                <option value="laptopbag">Laptop Bag</option>
            </select>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Name" name="pname">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Brand" name="pbrand">
            </div>
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Summary" name="psummary"></textarea>
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Description" name="pdescription"></textarea>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Type" name="ptype">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Color" name="pcolor">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Size" name="psize">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Material" name="pmaterial">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Quantity" name="pquantity">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Price" name="pprice">
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Discount" name="pdiscount">
            </div>
        </div>
        <div class="mb-3">
            <input type="file" class="form-control" multiple="" name="pimages[]">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-dark form-control" name="addproduct">Submit</button>
        </div>
    </form>
</section>

<?php
    include_once("header_footer/footer.php");
?>