<?php
  error_reporting(0);
  include 'Pages/ajaxData.php';
  include 'connection.php';
  $sql="SELECT `us`.*,`desig`.`desig_id` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id` = `desig`.`desig_id` where `emp_code`='".$_SESSION["empid"]."'";
  $result = mysqli_query($conn, $sql);  
  $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count  = mysqli_num_rows($result); 

  $desig_id =$row["desig_id"];
  $_SESSION["desig_id"]=$desig_id;

  $sqll="SELECT `us`.*,`depart`.* FROM `employee` `us` LEFT JOIN `department` `depart` ON `us`.`desig_id` = `depart`.`dept_id` where `emp_code`='".$_SESSION["empid"]."' ";
  $result = mysqli_query($conn, $sqll);  
  $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count  = mysqli_num_rows($result); 

  $dept_id =$row["dept_id"];
  $_SESSION["dept_id"]=$dept_id;

if (isset($_POST['saveempdetails'])) 
{
  $emp_name=CF($_POST["empname"],$conn);
  $empid=CF($_POST["empid"],$conn);
  $designation=CF($_POST["designation"],$conn);
  $department=CF($_POST["department"],$conn);
  $role=CF($_POST["role"],$conn);
  $status=CF($_POST["status"],$conn);
  $gridRadios=CF($_POST["gridRadios"],$conn);
  $username=CF($_POST["username"],$conn);
  $password=CF($_POST["password"],$conn);
  $roleid=CF($_POST["roleid"],$conn);
  $savedby=CF($_POST["savedby"],$conn);
  $email=CF($_POST["email"],$conn);
  $phone=CF($_POST["phone"],$conn);
  $alternate_number=CF($_POST["alernate_number"],$conn);
  $gender=CF($_POST["gender"],$conn);
  $father_name=CF($_POST["father_name"],$conn);
  $father_mobile=CF($_POST["father_mobile"],$conn);
  $curr_add=CF($_POST["current_address"],$conn);
  $country=CF($_POST["country"],$conn);
  $region=CF($_POST["region"],$conn);
  $city=CF($_POST["city"],$conn);
  $pin_code=CF($_POST["pin_code"],$conn);
  $permanentadd_var=CF($_POST["permanent_address"],$conn);
  $joining_date=CF($_POST["joining_date"],$conn);
  $status=CF($_POST["status"],$conn);
  $beneficiary_name=CF($_POST["beneficiary_name"],$conn);
  $account_number=CF($_POST["account_number"],$conn);
  $bank_name=CF($_POST["bank_name"],$conn);
  $branchname=CF($_POST["branch_name"],$conn);
  $ifsc_code=CF($_POST["ifsc_code"],$conn);
  $aadharno=CF($_POST["aadhar_no"],$conn);
  $pan_no=CF($_POST["pan_no"],$conn);
  $uan_no=CF($_POST["uan_no"],$conn);
  $esi_no=CF($_POST["esi_no"],$conn);
  $pf_no=CF($_POST["pf_no"],$conn);
  $project_name=CF($_POST["project_name"],$conn);

  $special_var=preg_replace('/[^A-Za-z0-9\-]/', '', $str);
  $fathername_var=preg_replace('/[^A-Za-z0-9\-]/', '', $fathername);
  $currentaddress_var=preg_replace('/[^A-Za-z0-9\-]/', '', $currentaddress);
  $permanentadd_var=preg_replace('/[^A-Za-z0-9\-]/', '', $permanentadd_var);
  $beneficiary_name_var=preg_replace('/[^A-Za-z0-9\-]/', '', $beneficiary_name);
  $branchname_var=preg_replace('/[^A-Za-z0-9\-]/', '', $branchname);
  $bankname_var=preg_replace('/[^A-Za-z0-9\-]/', '', $bankname);
 
  $qry_Adv = "INSERT INTO `employee`(`emp_name`, `emp_code`, `desig_id`, `dept_id`, `emp_type`, `emp_status`, `user_login`, `username`, `password`, `role_id`, `CreatedBy`,`email`, `phone`, `alernate_number`, `gender`, `father_name`, `father_mobile`, `current_address`, `country_id`,`state_id`,`city_id`, `pin_code`, `permanent_address`, `joining_date`, `status`, `beneficiary_name`, `account_number`, `bank_name`, `branch_name`, `ifsc_code`, `aadhar_no`, `pan_no`, `uan_no`, `esi_no`, `pf_no`,`project_name`) VALUES
    ('".$emp_name."','".$empid."','".$designation."',
'".$department."','".$role."','".$status."',
'".$gridRadios."','".$username."','".$password."',
'".$roleid."','".$savedby."',
'".$email."','".$phone."','".$alternate_number."',
'".$gender."','".$father_name."','".$father_mobile."',
'".$curr_add."','".$country."','".$region."',
'".$city."','".$pin_code."','".$permanentadd_var."','".$joining_date."','".$status."','".$beneficiary_name."','".$account_number."','".$bank_name."','".$branchname."','".$ifsc_code."','".$aadharno."','".$pan_no."','".$uan_no."','".$esi_no."','".$pf_no."','".$project_name."')";

    $run_Sub = mysqli_query($conn, $qry_Adv);
    if($run_Sub > '0')
    {
      $message="Record Save successfully";
      header("location:PFC.php?PageName=employee_details&Mgs=1");
    }

    else
    {
      $message="Record Not Save.";
    }
}
?>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Data Saved.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
           <div class="pagetitle">
            <h1>Add New Salary</h1>
           </div>
            <?php echo $message; ?>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
                <div class="card-body">
                 <h5 class="card-title"><u>Add Salary:-</u></h5>
                  <Form method="POST">    
                      <input type="hidden" name="roleid"   id="roleid"   value="<?php echo $_SESSION["role_Id"];?>"/>
                      <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>
                      <input type="hidden" name="desigid"  id="desigid"  value="<?php echo $_SESSION["desig_id"];?>"/>
                      <input type="hidden" name="departid" id="departid" value="<?php echo $_SESSION["dept_id"];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                     
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee Name</label>
                          <span class="error">* <?php echo $nameErr;?></span>
                          <input type="text" class="name form-control" name="empname">
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee_ID</label>
                          <span class="error">* <?php echo $nameErr;?></span>
                          <input type="text" class="empid form-control" name="empid">
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                            <div class="col-4">
                                <label for="email" class="form-label">Email</label>
                                <span  class="error">* <?php echo $emailErr;?></span>
                                <input type="text" class="email form-control" name="email">
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">Phone No</span></label>
                                <span class="error">* <?php echo $phoneErr;?></span>
                                <input type="text"  class="phone form-control"  maxlength="10" name="phone" >
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">Alternate Phone No</label>
                                <span class="error">*<?php echo $alternateErr;?></span>
                                <input type="text"  class="alernate_number form-control"  maxlength="10" name="alernate_number">
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="deptid" id="deptid" value="<?php echo $_SESSION["dept_id"];?>">
                        <input type="hidden" name="desigid" id="desigid" value="<?php echo $_SESSION["desig_id"];?>">
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="desigantion" class="form-label">Designation</span> </label>
                            <span class="error">* <?php echo $desigantionErr;?></span>
                              <select name="designation" class="fstdropdown-select" id="designation" data-live-search="true"  data-size="8" tabindex="null">
                                <option value="NA">SELECT DESIGNATION</option>
                                <?php 
                                    $sql="SELECT * FROM `designation` ORDER BY `desig_id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while( $row = mysqli_fetch_array($result))
                                    {
                                      $desig_id=$row["desig_id"];
                                      $_SESSION["desig_id"]=$desig_id;
                                  ?>
                                  <option value="<?php echo $row["desig_id"];?>"><?php echo $row["Designation"];?></option>
                               <?php } ?>
                               </select>

                        </div>
                        <div class="col-4">
                            <label for="department" class="form-label">Department</span> </label>
                            <span class="error">* <?php echo $departmentErr;?></span>
                              <select name="department" class="fstdropdown-select" id="department" data-live-search="true"  data-size="8" tabindex="null">
                                <option value="NA">SELECT DEPARTMENT</option>
                                 <?php 
                                    $sql="SELECT * FROM `department` ORDER BY `dept_id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while( $row = mysqli_fetch_array($result))
                                    {
                                          $dept_id=$row["dept_id"];
                                          $_SESSION["dept_id"]=$dept_id;
                                  ?>
                                  <option value="<?php echo $row["dept_id"];?>"><?php echo $row["department"];?></option>
                               <?php } ?>
                               </select>

                           </div>
                           <div class="col-4">
                            <label for="text" class="form-label">Father Name</label>
                            <span class="error">* <?php echo $fatherErr;?></span>
                            <input type="text" class="father_name form-control" name="father_name">
                        </div>

                        </div><br>
                        <div class="row g-3">
                        <div class="col-6">
                          <label for="text" class="form-label">Father Phone No</label>
                          <span class="error">* <?php echo $fatherphoneErr;?></span>
                          <input type="text" class="father_mobile form-control" name="father_mobile" maxlength="10" placeholder="Enter Father Phone No ">
                            </div>

                    <div class="col-6">
                         <label for="text" class="form-label">Gender</label>
                          <span class="error">* <?php echo $genderErr;?></span>
                             <select name="gender" class="gender  form-control select_type" id="gender">
                                  <option value="NA">--SELECT--</option>   
                                  <option value="MALE">MALE</option>
                                  <option value="FEMALE">FEMALE</option>
                             </select>
                        </div>
                        </div>
                      <br>
                        <div class="row">
                         <div class="col">
                            <label for="text" class="form-label">Current Address</label>
                            <span class="error">* <?php echo $currentErr;?></span>
                            <input type="text" class="current_address form-control" name="current_address"  placeholder="Enter Address">
                            </div>
                        </div> 
                        <br>
                        <div class="row g-3">
                         <div class="col-6 mt-3"> 
                          <label for="country" class="form-label">Country <span class="error">* <?php echo $countryErr;?></span></label><br>
                            <select id="country" name="country"  id="country" class="country form-control" > 
                            <option value="NA">--Select Country--</option>
                            <?php       
                                  $sql = "SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC";
                                  $result = $conn->query($sql);

                                  if ($result->num_rows > 0) 
                                  {
                                    while($row = $result->fetch_assoc()) 
                                      {
                                      ?>
                                    <option value="<?php echo $row['country_id'];?>"><?php echo $row['country_name'];?></option>
                                  <?php 
                                      }
                                  }
                                 ?>
                               </select>
                            </div>
                            <div class="col-6">
                              <label for="inputState" class="form-label">State</label>
                              <span class="error">* <?php echo $stateErr;?></span>
                                <select  name="region" id="state" class="region form-control">
                                <option  value="NA">--Select State--</option>
                               </select>
                             </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-6">
                             <label for="inputCity" class="form-label">City</label>
                             <span class="error">*<?php echo $cityErr;?></span>
                              <select  name="city" id="city" class="city form-control">
                              <option value="NA">--Select city--</option>
                               </select>
                            </div>
                            <div class="col-6">
                                <label for="pincode" class="form-label">Pincode</label>
                                <span class="error">* <?php echo $pincodeErr;?></span>
                                <input type="pin_code"   maxlength="6" class="pin_code form-control" name="pin_code">
                            </div>
                        </div>
                        <br>                                             
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Permanent Address</label>
                                <span class="error">* <?php echo $permanentErr;?></span>
                                <input type="text" class="permanent_address form-control"  name="permanent_address" placeholder="Enter Address">
                            </div>
                        </div> 
                    <br>   
                      <div class="row g-3">
                         <div class="col">
                            <label for="text" class="form-label">Joining Date</label>
                            <span class="error">*<?php echo $joiningErr;?></span>
                            <input type="date"  class="joining_date form-control"  name="joining_date">
                            </div>
                     <div class="col ">  
                       <label for="">Status</label>
                       <span class="error">*<?php echo $statusErr;?></span>
                          <select name="status" class="status  form-control" id="status">
                            <option value="NA">-select--</option>  
                            <option value="1">ACTIVE</option>
                            <option value="2">DEACTIVE</option>
                        </select>
                     </div>
                   </div>
                  <br>                                
<!--Salay Slip-->
<div class="row g-3">
                         <div class="col">
                            <label for="text" class="form-label">Aadhar No</label>
                            <span class="error">*<?php echo $aadharnoErr;?></span>
                            <input type="text"  class="aadhar_no form-control"  name="aadhar_no" id="aadhar_no">
                            </div>
                     <div class="col">  
                       <label for="">PAN No</label>
                       <span class="error">*<?php echo $pannoErr;?></span>
                          <input type="text" name="pan_no" class="pan_no  form-control" id="pan_no">
                     </div>
  </div> <br>  
  <div class="row g-3">
                     <div class="col">  
                       <label for="">UAN No</label>
                       <span class="error">*<?php echo $uannoErr;?></span>
                       <input type="text" name="uan_no" class="uan_no  form-control" id="uan_no">
                     </div>

                     <div class="col">  
                       <label for="">ESI No</label>
                       <span class="error">*<?php echo $esinoErr;?></span>
                       <input type="text" name="esi_no" class="uan_no  form-control" id="esi_no">
                     </div>
  </div> <br>  
  <div class="row g-3">
                     <div class="col-6">  
                       <label for="">PF No</label>
                       <span class="error">*<?php echo $pfnoErr;?></span>
                       <input type="text" name="pf_no" class="pf_no  form-control" id="pf_no">
                     </div>
                     <div class="col-6">  
                       <label for="">Project_Name</label>
                       <span class="error">*<?php echo $project_nameErr;?></span>
                       <input type="text" name="project_name" class="project_name  form-control" id="project_name">
                     </div>
  </div>
<!--Salay Slip-->
<br><br>
<!--Bank Details Start-->
<fieldset class="scheduler-border">
    <legend class="scheduler-border mt-2"><u>Banking Details</u></legend>
    <div class="row">
        <div class="col mt-3">
            <div class="row g-3">
                <div class=" col-6 ">
                    <label for="text" class="form-label">Account Holder Name</label>
                    <span class="error">*<?php echo $beneficiaryErr;?></span>
                    <input type="text" class="beneficiary_name form-control" name="beneficiary_name" placeholder="Enter account holder name">
                </div>

                <div class=" col-6 ">
                    <label for="text" class="form-label">Account Number</label>
                    <span class="error">*<?php echo $accountErr;?></span>
                    <input type="text" class="account_number form-control" name="account_number" placeholder="Enter account number">
                </div>
            </div><br>
            <div class="row g-3">
                <div class=" col-4 ">
                    <label for="text" class="form-label">Bank Name</label>
                    <span class="error">*<?php echo $banknameErr;?></span>
                    <input type="text" class="bank_name form-control" name="bank_name">
                </div>
                <div class=" col-4 ">
                    <label for="text" class="form-label">Branch Name</label>
                    <span class="error">*<?php echo $branchErr;?></span>
                    <input type="text" class="branch_name form-control" name="branch_name" placeholder="Enter branch name">
                </div>
                <div class=" col-4 ">
                    <label for="text" class="form-label">IFSC Code</label>
                    <span class="error">*<?php echo $ifcErr;?></span>
                    <input type="text" class="ifsc_code form-control" name="ifsc_code"  placeholder="Enter IFSC code">
                </div>
            </div><br><br>
</fieldset>
<!--Bank Details End-->
                        <!--User Login Details End-->
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">User_Login</legend>
                      <div class="col-sm-10">

                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="yes">
                                  <label class="form-check-label" for="gridRadios1">  Yes </label>
                             </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="no" checked>
                                    <label class="form-check-label" for="gridRadios2">
                                      No
                                    </label>
                                </div>
                          
                        </div>
                            </fieldset>


                        <div class="userlogin" style="display:none;">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">UserName</label>
                                <div class="col-sm-3">

                                    <input type="text" name="username" id="username" class="form-control">
                               
                                </div>
                            </div>
<!--password start here-->
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-3">

                                    <input type="password" name="password" id="password" class="form-control">
                                
                                    </div>
                                    </div>
                                    <!--password close here-->
                                    <!--Role-->
                                    <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-3">
                                <select name="role" class="role form-control" id="role" data-live-search="true"  data-size="8" tabindex="null">
                                <option value="NA">--SELECT--</option>
                                <?php
                                        $sql="SELECT * FROM `roles`";
                                        $result1 = mysqli_query($conn, $sql);
                                        while( $row = mysqli_fetch_array($result1))
                                        {
                                          $_SESSION["role_Id"]=$row["role_id"];
                                    ?>
                                  <option value="<?php echo $row["role_id"];?>"><?php echo $row["role_name"];?></option>
                                  <?php } ?>
                               </select>
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


                         </div>
<br/>
<br/>
                         <div class="modal-footer">
                          <div class="row mb-3">
                          <div class="col-sm-3">
                         
                          </div>
                          </div>
                          <input type="submit" name="saveempdetails" class="btn btn-primary add_empolyee" value="Submit"> 
                         </div>
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

  <script src="assets/js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  setFstDropdown();
  </script>
<script type="text/Javascript">
$(document).ready(function(){
    $('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'./Pages/ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'./Pages/ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>

  <!-- ======= End Footer ======= -->
