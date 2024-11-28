<?php
error_reporting(0);

require_once 'connection.php';

// Check if the request is AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['action'])) {
        $action = $data['action'];
        // Perform your server-side logic here
        echo json_encode(['message' => "Received: $action"]);
    } else {
        echo json_encode(['message' => 'No action received']);
    }
}


?>
<style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .swipe-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f3f3f3;
      overflow: hidden;
      touch-action: none; /* Improves touch responsiveness */
    }
    .swipe-box {
      width: 300px;
      height: 200px;
      background: #4caf50;
      color: white;
      text-align: center;
      line-height: 200px;
      font-size: 24px;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
  </style>


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
                 <div class="swipe-container">
                    <div class="swipe-box" id="swipeBox">Swipe Me</div>
                </div>
               
                 </div>
                 
        
</section>

</main><!-- End #main -->
<script>
    // Swipe detection script
  

</script>



  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
