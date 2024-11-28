<?php
if(isset($_POST["submit"]))
{
$mobile='91'.$_POST["mobile"];
$message=$_POST["message"];

	// Account details
	//$apiKey = urlencode('MzkzMjZiNDg2MTUxNTM0NzMzNTIzMjU1NTg0YjRmN2E=');
	$apiKey = urlencode('Njk2OTU0NzY3NTU0NGI1Nzc5MzM1NTYyNmM1OTMyNGY=');
	
	// Message details
	$numbers = array($mobile);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($message);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
}
?>
<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Password change Successfully.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<div class="row column1">
    <div class="col-md-8">
       <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
           <div class="pagetitle">
            <h1><u>SEND SMS:-</u></h1>
           </div>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-8">
              <div class="card-header"> 
                <div class="card-body">
                 <h5 class="card-title"><u>SEND SMS:-</u></h5>
                  <form method="POST">    
                  <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['PFC_UID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3"> 
                      <div class="row">
                      <div class="col-12">
                          <label for="mobile" class="form-label">Mobile Number</label>
                          <input type="number" class="mobile form-control" name="mobile" id="mobile" required>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-12">
                          <label for="emp_name" class="form-label">Message</label>
                          <textarea class="mobile form-control" name="message" id="message"></textarea>
                        </div>
                      </div> 
                      <!-- <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Confirm Password</label>
                          <input type="text" class="confirmpassword form-control" name="confirmpassword" id="confirmpassword">
                        </div>
                      </div> -->
<br/>
                         <!-- <div class="modal-footer"> -->
                          <div class="row mb-3">
                          <div class="col-sm-3">
                          <input type="submit" name="submit" class="btn btn-primary changepassword" value="submit">
                          </div>
                          </div>
                        <!-- <button type="submit" id="submit" class="btn btn-primary add_empolyee">Submit</button> -->
                        <!-- <input type="submit" name="changepassword" class="btn btn-primary add_empolyee" value="Change Password">   -->
                         <!-- </div> -->
                        </form>
                       </div>
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
