<?php
    include_once("header_footer/header.php");
?>

<?php  
		require_once("../config/db.php");
		extract($_POST);
		if(isset($addoffer))
		{
            $data = mysqli_query($way,"SELECT * FROM stylin_slider_offers");
            $t_rows = mysqli_num_rows($data);
            if($t_rows<5){
                $image_name=$_FILES["oimages"]["name"];
                $image_tmp=$_FILES["oimages"]["tmp_name"];
                $image_upload="../assets/slider images/$image_name";
                move_uploaded_file($image_tmp,$image_upload);
    
			    $sql="INSERT INTO `stylin_slider_offers` (`offer_category`, `offer_title`, `offer_desc`, `offer_info`, `offer_image`) VALUES ('$ocategory','$otitle','$odesc','$oinfo','$image_upload')";
                if(mysqli_query($way,$sql)){
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Product Addded Successfully!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
			    }
                else{
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Error Adding Product!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
            }
            else{
                echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>You can add only 5 offers at one time! remove old offers to add new.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            }
        }		
?>	

<section id="add-offer" class="col-md-10">
    <h4 class="mt-4 mx-3">Add Offers in Slider</h4>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="ocategory">
                <option selected>Select Category</option>
                <option value="mens">Mens</option>
                <option value="womens">Womens</option>
                <option value="kids">Kids</option>
                <option value="footwear">Footwear</option>
                <option value="accessories">Accessories</option>
                <option value="bags">Bags</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Offer Title" name="otitle">
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Offer" name="odesc"></textarea>
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Offer Info" name="oinfo"></textarea>
        </div>
        <div class="mb-3">
            <input type="file" class="form-control" name="oimages">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-dark form-control" name="addoffer">Submit</button>
        </div>
    </form>
</section>

<?php
    include_once("header_footer/footer.php");
?>