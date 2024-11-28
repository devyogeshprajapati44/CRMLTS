<?php
error_reporting(0);

require_once 'connection.php';
include("Pages/pagi_script.php");

if (isset($_POST["submit"])) {
    // Sanitize input and avoid SQL injection
    $product_name = CF($_POST["product_name"], $conn);
    $product_serial_no = CF($_POST["product_serial_no"], $conn);
    $product_quantity = CF($_POST["product_quantity"], $conn);
    $product_rates = CF($_POST["product_rates"], $conn);
    $product_amounts = CF($_POST["product_amounts"], $conn);
    $product_date = CF($_POST["product_date"], $conn);
    $product_size = CF($_POST["product_size"], $conn);
    $product_location = CF($_POST["product_location"], $conn);
    $address = CF($_POST["address"], $conn);
    $product_pin_code = CF($_POST["product_pin_code"], $conn);
    $states = CF($_POST["states"], $conn);
    $product_city = CF($_POST["product_city"], $conn);

    // File upload logic

    $product_image = ""; // Initialize variable for image path
    $target_dir = "./product_image_uploads/uploads/"; // Directory to save uploaded images

    if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] === UPLOAD_ERR_OK) {
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image file
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
        } elseif (!in_array($image_file_type, ['jpg', 'png', 'jpeg', 'gif'])) {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } elseif ($_FILES["product_image"]["size"] > 5000000) {
            echo "File is too large (max 5MB).";
        } elseif (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $product_image = $target_file; // Save the file path
        } else {
            echo "Error uploading file.";
        }
    }

    // SQL query to insert data into the `products` table
    $sql_insert = "INSERT INTO `product` (
        `product_name`, `product_serial_no`, `product_quantity`, `product_rates`, `product_amounts`, 
        `product_date`, `product_size`, `product_location`, 
        `address`, `product_pin-code`, `states`, `product_city`, `product_image`
    ) VALUES (
        '$product_name', '$product_serial_no' , '$product_quantity', '$product_rates', '$product_amounts', 
        '$product_date', '$product_size', '$product_location', 
        '$address', '$product_pin_code', '$states', '$product_city', '$product_image'
    )";

    // Execute the query
    if (mysqli_query($conn, $sql_insert)) {
        // Redirect to the success page with a message
        header("Location: PFC.php?PageName=product&Mgs=1");
    } else {
        // Handle error
        echo "Error: " . mysqli_error($conn);
    }
}

?>


<main id="main" class="main">
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <?php echo $message; ?>
          </div> 
           <div class="container-fluid px-4">
             <div class="row mt-4">
              <div class="col-md-12">
                <div class="card-header"> 
                <nav class="navbar navbar-light bg-light">
                   <form method="POST">
                      <input type="text" name="searchvalue" style="margin:-25;height:39px;padding:6px;width:300px;margin-top: 5px"  placeholder="Enter Prodcut" value="">
                      <input class="btn btn-outline-success my-2 my-sm-0" style="height:38px;padding:8px;width:100px;" type="submit" name="submitsearch" value="Search">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left:751px;margin-top:-57px;">+ Add Prodcut</button>
                      <h2 style="color:#012970;margin-left:451px;margin-top:-57px;;"><b>ADD Product</b></h2>
                    </form>
                   </nav>

               <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                    <Form  id="productForm" action="#"  method="POST"  enctype="multipart/form-data" >
                      <div class="modal-header">
                        <legend class="card-title"  id="myModalLabel" style="color:#012970;">Add Prodcut</legend>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-6">
                                        <label for="emp_name" class="form-label">Product Name <span style="color:red">*</span></label>
                                        <input type="text" class="name form-control" name="product_name" placeholder="Enter Product Name"  required>
                                     </div> 
                                     <div class="col-6">
                                        <label for="product_serial_no" class="form-label">Product ID <span style="color:red">*</span></label>
                                        <input type="text" class="product_serial_no form-control" name="product_serial_no" id="product_serial_no"  placeholder="Enter Product ID Name"  required>
                                     </div>
                                    </div> 
                                    <br>
                                    <div class="row">
                                     <div class="col-6">
                                        <label for="product_quantity" class="form-label">Product Quantity <span style="color:red">*</span></label>
                                        <input type="number" class="product_quantity form-control" name="product_quantity" placeholder="Enter QUT"  required>
                                      </div> 
                                     <div class="col-6">
                                        <label for="product_rates" class="form-label">Product Rates <span style="color:red">*</span></label>
                                        <input type="text" class="product_rates form-control" name="product_rates" id="product_rates"  placeholder="Enter Product Rates"  required>
                                     </div>
                                    </div> 
                                    <br>
                                    <div class="row">
                                     <div class="col-6">
                                        <label for="product_amounts" class="form-label">Product Amount <span style="color:red">*</span></label>
                                        <input type="text" class="name form-control" name="product_amounts" placeholder="Enter Product Amount"  required>
                                     </div> 
                                     <div class="col-6">
                                        <label for="product_date" class="form-label">Product Date <span style="color:red">*</span></label>
                                        <input type="date" class="name form-control" name="product_date" id="product_date"  placeholder="Enter Product Date"  required>
                                    </div>
                                    </div> 
                                    <br>
                                    <div class="row">
                                       <div class="col-6">
                                        <label for="product_size" class="form-label">Product Size <span style="color:red">*</span></label>
                                        <input type="text" class="name form-control" name="product_size" placeholder="Enter Product Size"  required>
                                      </div> 
                                     <div class="col-6">
                                        <label for="product_location" class="form-label">Product Loction <span style="color:red">*</span></label>
                                        <input type="text" class="product_location form-control" name="product_location" id="product_location"  placeholder="Enter Product Loction"  required>
                                      </div>
                                    </div> 
                                    <br>
                                     <div class="row">
                                      <div class="col-6">
                                        <label for="images" class="form-label">
                                            Product Size <span style="color:red">*</span>
                                        </label>
                                        <input  type="file" class="form-control"   name="product_image"  id="product_image"  accept=".jpg, .jpeg, .png, .gif"  required >
                                        <small class="form-text text-muted">
                                            Allowed file types: JPG, JPEG, PNG, GIF. Max size: 5MB.
                                        </small>
                                            </div>
                                        </div>
                                        <br>
                                  
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="address" class="form-label">Address  <span style="color:red">*</span></label>
                                            <input type="text" class="name form-control" name="address" placeholder="Enter Address"  required>
                                        </div> 
                                        <div class="col-6">
                                            <label for="product_pin_code" class="form-label">Pin Code<span style="color:red">*</span></label>
                                            <input type="text" class="product_pin_code form-control" name="product_pin_code" id="product_pin_code"  placeholder="Enter Zip Code"  required>
                                        </div>
                                    </div> 
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="emp_name" class="form-label">State<span style="color:red">*</span></label>
                                            <input type="text" class="name form-control" name="states" placeholder="Enter states"  required>
                                        </div> 
                                        <div class="col-6">
                                            <label for="product_city" class="form-label">City<span style="color:red">*</span></label>
                                            <input type="text" class="product_city form-control" name="product_city" id="product_city"  placeholder="Enter City"  required>
                                        </div>
                                     </div> 
                                   </div>
                                  </div>
                                 <div class="modal-footer">
                               <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancel">
                             <input type="submit" id="submit"  name="submit" class="btn btn-primary add_desig" value="product">
                        </div>
                      </form>
                    </div>
                </div>
                </div>
                <div class="card-body">
                 <h5 class="card-title"></h5>
                 <!-- <u>Create Ticket:-</u> -->
                 <table  id="myTable" class="hover table table-striped" style="width:100%; margin-left: -34px;">
                    <thead class="thead-pink" >
                    <tr>
                        <th><b>S.No.</b></th>
                        <th hidden><b>ID</b></th>
                        <th><b>Product Name</b></th> 
                        <th><b>ProdSerailNo</b></th> 
                        <!-- <th><b>ProdQuantity</b></th> 
                        <th><b>Product Rates</b></th>  -->
                        <th><b>Product Amounts</b></th> 
                        <th><b>Product Date</b></th> 
                        <th><b>Product Size</b></th> 
                        <th><b>Address</b></th> 
                        <th><b>PinCode</b></th> 
                        <th><b>states</b></th> 
                        <th><b>City</b></th>
                        <th><b>Product Image</b></th>  
                        <th><b>Action</b></th>
                    </tr>
                        </thead>
                        <tbody>
                        <?php

                        $sql = "SELECT * FROM `product` order by `prod_id` LIMIT $offset, $no_of_records_per_page";
                        if(isset($_POST['submitsearch']))
                        {
                            $filtervalue=strtoupper($_REQUEST['searchvalue']);
                            $sql = "SELECT * FROM `product` WHERE `product_name` LIKE '%$filtervalue' OR `product_name` LIKE '$filtervalue%' OR `product_name` LIKE '%$filtervalue%'  ORDER BY `prod_id` LIMIT $offset, $no_of_records_per_page";
                        }

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) 
                        {
                            $cnt=0;
                        while($row = $result->fetch_assoc()) 
                            {?>  
                            <tr>
                                <td><?php echo ++$cnt;?></td>
                                <td hidden><?php echo $row["prod_id"];?></td>
                                <td><?php echo $row['product_name'];?></td>
                                <td><?php echo $row['product_serial_no'];?></td>
                                <td><?php echo $row['product_amounts'];?></td>
                                <td><?php echo $row['product_date'];?></td>
                                <td><?php echo $row['product_size'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['product_pin-code'];?></td>
                                <td><?php echo $row['states'];?></td>
                                <td><?php echo $row['product_city'];?></td> 
                                <td>
                                <a href="#">
                                    <img 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#imageModal<?php echo $row['prod_id']; ?>" 
                                        src="<?php echo $row['product_image']; ?>" 
                                        alt="<?php echo $row['product_name']; ?>" 
                                        style="width: 100px; height: auto;">
                                </a>
                               <!-- Button trigger modal -->

                                    <!-- Image  Modal -->
                                    <div class="modal fade" id="imageModal<?php echo $row['prod_id']; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $row['prod_id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel<?php echo $row['prod_id']; ?>">
                                                        <?php echo $row['product_name']; ?>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <!-- Full Image in Modal -->
                                                    <img  src="<?php echo $row['product_image']; ?>"  alt="<?php echo $row['product_name']; ?>"  class="img-fluid"  style="max-width: 100%;">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- <img src="<?php // echo $row['product_image']; ?>" alt="Product Image" style="width: 100px; height: auto;"> -->
                                 <!-- Image  Modal -->
                                </td> 
                                 <td><button  data-bs-toggle='modal' class='btn btn-success editbtn'>Edit</button></td>
                            </tr>
                            <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                        $sql1 = "SELECT * FROM `product`";
                        echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
                    ?>
                </div>
        
</section>

</main><!-- End #main -->



<script>
    let table = new DataTable('#myTable');
</script>

  <!-- ======= Footer ======= -->
  <br/>
