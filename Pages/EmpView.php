<?php
error_reporting(0);
include 'connection.php';
//include '../Script/CommonFunctions.php';
$EmpID=$_REQUEST["EmpID"];
$EmpID=EDV($EmpID,2);
//echo $sql="SELECT `us`.*, `design`.`Designation`, `depart`.`department`,`co`.`country_id`,`co`.`country_name`,`st`.`state_id`,`st`.`country_id`,`st`.`state_name`,`ct`.`city_id`,`ct`.`state_id`,`ct`.`city_name` FROM `employee` `us` LEFT JOIN `designation` `design` ON `us`.`desig_id`= `design`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id` = `depart`.`dept_id` LEFT JOIN `countries` `co` ON `us`.`country_id`=`co`.`country_id` LEFT JOIN `states` `st` ON `us`.`state_id`=`st`.`state_id` LEFT JOIN `cities` `ct` ON `us`.`city_id`=`ct`.`city_id` where `us`.`Id`='$EmpID'";

$fetch = mysqli_query($conn, "SELECT `us`.*, `design`.`Designation`, `depart`.`department`,`co`.`country_id`,`co`.`country_name`,`st`.`state_id`,`st`.`country_id`,`st`.`state_name`,`ct`.`city_id`,`ct`.`state_id`,`ct`.`city_name` FROM `employee` `us` LEFT JOIN `designation` `design` ON `us`.`desig_id`= `design`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id` = `depart`.`dept_id` LEFT JOIN `countries` `co` ON `us`.`country_id`=`co`.`country_id` LEFT JOIN `states` `st` ON `us`.`state_id`=`st`.`state_id` LEFT JOIN `cities` `ct` ON `us`.`city_id`=`ct`.`city_id` where `us`.`Id`='$EmpID'");
$row   = mysqli_fetch_array($fetch);
?>

<main id="main" class="main">
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
              <form action="#" method="GET">
              <nav class="navbar navbar-light bg-light">
               <a class="btn btn-warning text-dark"  href="PFC.php?PageName=view_employee_details" style="font-size: large;height: 42px;padding: 7px;width: 102px;float: left;margin-left: 20px;" role="button">Back</a>
               </form><br>
              <center><h2 style="color:#012970;margin-right:659px;"><b>VIEW EMPLOYEE</b></h2></center>
              </nav>
                <div class="card-body">
                  <form method="POST">    
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3"> 
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee Name <span style="color:red">*</span></label>
                          <input type="text" class="name form-control" name="empname" value="<?php echo $row["emp_name"]; ?>" readonly>
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee ID <span style="color:red">*</span></label>
                          <input type="text" class="empid form-control" name="empid" value="<?php echo $row["emp_code"]; ?>" readonly>
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                          <div class="col-4">
                            <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                            <input type="text" class="email form-control" name="email" value="<?php echo $row["email"]; ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="text" class="form-label">Phone No <span style="color:red">*</span></label>
                            <input type="text"  class="phone form-control"  maxlength="10" name="phone" value="<?php echo $row["phone"]; ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="text" class="form-label">Alternate Phone No</label>
                            <span class="error">*<?php echo $alternateErr;?></span>
                            <input type="text"  class="alernate_number form-control"  maxlength="10" name="alernate_number" value="<?php echo $row["alernate_number"]; ?>" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="desigantion" class="form-label">Designation <span style="color:red">*</span></label>
                              <select name="designation" class="designation form-control" id="designation" disabled="true">
                                  <option value="<?php echo $row["desig_id"];?>" selected><?php echo $row["Designation"];?></option>
                               </select>

                        </div>
                        <div class="col-4">
                            <label for="department" class="form-label">Department <span style="color:red">*</span></label>
                              <select name="department" class="department form-control" id="department" data-live-search="true"  data-size="8" tabindex="null" disabled="true">
                                  <option value="<?php echo $row["dept_id"];?>" selected><?php echo $row["department"];?></option>
                               </select>

                           </div>
                           <div class="col-4">
                            <label for="text" class="form-label">Father Name <span style="color:red">*</span></label>
                            <input type="text" class="father_name form-control" name="father_name" value="<?php  echo $row["father_name"]; ?>" readonly>
                        </div>

                        </div><br>
                        <div class="row g-3">
                        <div class="col-6">
                          <label for="text" class="form-label">Father Phone No <span style="color:red">*</span></label>
                          <input type="text" class="father_mobile form-control" name="father_mobile" maxlength="10" placeholder="Enter Father Phone No " value="<?php echo $row["father_mobile"];?>" readonly>
                            </div>

                    <div class="col-6">
                         <label for="text" class="form-label">Gender <span style="color:red">*</span></label>
                             <select name="gender" class="gender  form-control select_type" id="gender" disabled="true">
                             <?php if(($_REQUEST['EmpID']!='')){?>
                                <option selected>select</option>
                                <option value="<?php if($row['gender']=="FEMALE"){ echo $row['gender']; } else {echo "FEMALE"; }?>"selected><?php if($row['gender']=="FEMALE"){ echo $row['gender']; } else {echo "FEMALE"; }?></option>
                                <option value="<?php if($row['gender']=="MALE"){ echo $row['gender']; } else {echo "MALE"; }?>"selected><?php if($row['gender']=="MALE"){ echo $row['gender']; } else {echo "MALE"; }?></option>
                    </select>
                    <?php } else {?>
                      <select class="form-select" name="empstatus" id="empstatus" aria-label="Default select example" readonly>
                      <option selected>select</option>
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                    <?php } ?>
                        </div>
                        </div>
                      <br>
                        <div class="row">
                         <div class="col">
                            <label for="text" class="form-label">Current Address <span style="color:red">*</span></label>
                            <input type="text" class="current_address form-control" name="current_address"  placeholder="Enter Address" value="<?php echo $row["current_address"];?>" readonly>
                            </div>
                        </div> 
                        <br>
                        <div class="row g-3">
                         <div class="col-6 mt-3"> 
                          <label for="country" class="form-label">Country <span style="color:red">*</span></label><br>
                            <select id="country" name="country"  id="country" class="country form-control" disabled="true"> 
                            <option value="NA">--Select Country--</option>
                            <?php if(($_REQUEST['EmpID']!='')){?>
                              <option value="<?php echo $row["country"];?>" selected><?php echo $row["country_name"];?></option>
                              <?php } else {
                                  include 'connection.php'; 
                                  $sql = "SELECT * FROM countries WHERE status = 1 and country_id=101 ORDER BY country_name ASC";
                                  $result = $conn->query($sql);

                                  if ($result->num_rows > 0) 
                                  {
                                    while($rowconutry = $result->fetch_assoc()) 
                                      { ?>
                                    <option value="<?php echo $rowconutry['country_id'];?>"><?php echo $rowconutry['country_name'];?></option>
                                    <?php 
                                      }
                                  }
                                }
                                 ?>
                               </select>
                            </div>
                            <div class="col-6">
                              <label for="inputState" class="form-label">State</label>
                              <span class="error">* <?php echo $stateErr;?></span>
                                <select  name="region" id="state" class="region form-control" disabled="true">
                                <option  value="NA">--Select State--</option>
                                <option value="<?php echo $row['state_id'];?>" selected><?php echo $row['state_name'];?></option>
                               </select>
                             </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-6">
                             <label for="inputCity" class="form-label">City</label>
                             <span class="error">*<?php echo $cityErr;?></span>
                              <select  name="city" id="city" class="city form-control" disabled="true">
                                  <option value="NA">--Select city--</option>
                                  <option value="<?php echo $row['city_id'];?>" selected><?php echo $row['city_name'];?></option>
                               </select>
                            </div>
                            <div class="col-6">
                                <label for="pincode" class="form-label">Pincode <span style="color:red">*</span></label>
                                <input type="pin_code" maxlength="6" class="pin_code form-control" name="pin_code" value="<?php echo $row["pin_code"];?>" readonly>
                            </div>
                        </div>
                        <br>                                             
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Permanent Address <span style="color:red">*</span></label>
                                <input type="text" class="permanent_address form-control"  name="permanent_address" placeholder="Enter Address" value="<?php echo $row["permanent_address"];?>" readonly>
                            </div>
                        </div> 
                    <br>   
                      <div class="row g-3">
                         <div class="col">
                            <label for="text" class="form-label">Joining Date <span style="color:red">*</span></label>
                            <input type="date"  class="joining_date form-control"  name="joining_date" value="<?php echo $row["joining_date"];?>" readonly>
                            </div>
                     <div class="col ">  
                       <label for="">Status<span style="color:red">*</span></label>
                     
                       <?php if(($_REQUEST['EmpID']!='')){?>
                        <select name="status" class="status  form-control" id="status">
                                <option selected>--SELECT STATUS--</option>
                                <option value="<?php if($row['emp_status']=="0"){ echo $row['emp_status']; } else {echo "0"; }?>"selected><?php if($row['emp_status']=="0"){ echo $row['emp_status']="DEACTIVE"; } else {echo "DEACTIVE"; }?></option>
                                <option value="<?php if($row['emp_status']=="1"){ echo $row['emp_status']; } else {echo "1"; }?>"selected><?php if($row['emp_status']=="1"){ echo $row['emp_status']="ACTIVE"; } else {echo "ACTIVE"; }?></option>
                        </select>
                        <?php } ?>
                     </div>
                   </div>
                  <br>                               
              <!--Bank Details Start-->
              <fieldset class="scheduler-border">
                  <legend class="scheduler-border mt-2"><b style="color:black">BANKING DETAILS</b></legend>
                  <div class="row">
                      <div class="col mt-3">
                          <div class="row g-3">
                              <div class=" col-6 ">
                                  <label for="text" class="form-label">Account Holder Name <span style="color:red">*</span></label>
                                  <input type="text" class="beneficiary_name form-control" name="beneficiary_name" placeholder="Enter account holder name" value="<?php echo $row["beneficiary_name"];?>" readonly>
                              </div>

                              <div class=" col-6 ">
                                  <label for="text" class="form-label">Account Number <span style="color:red">*</span></label>
                                  <input type="text" class="account_number form-control" name="account_number" placeholder="Enter account number" value="<?php echo $row["account_number"];?>" readonly>
                              </div>
                          </div><br>
                          <div class="row g-3">
                              <div class=" col-4 ">
                                  <label for="text" class="form-label">Bank Name <span style="color:red">*</span></label>
                                  <input type="text" class="bank_name form-control" name="bank_name" value="<?php echo $row["bank_name"];?>" readonly>
                              </div>
                              <div class=" col-4 ">
                                  <label for="text" class="form-label">Branch Name <span style="color:red">*</span></label>
                                  <input type="text" class="branch_name form-control" name="branch_name" placeholder="Enter branch name" value="<?php echo $row["branch_name"];?>" readonly>
                              </div>
                              <div class=" col-4 ">
                                  <label for="text" class="form-label">IFSC Code <span style="color:red">*</span></label>
                                  <input type="text" class="ifsc_code form-control" name="ifsc_code"  placeholder="Enter IFSC code" value="<?php echo $row["ifsc_code"];?>" readonly>
                              </div>
                          </div><br><br>
              </fieldset>
<!--Bank Details End-->
                        <!--User Login Details End-->
                <!-- <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Forget Password</legend>
                      <div class="col-sm-10">

                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="yes" readonly>
                                  <label class="form-check-label" for="gridRadios1">  Yes </label>
                             </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" readonly value="no" checked>
                                    <label class="form-check-label" for="gridRadios2">
                                      No
                                    </label>
                                </div>
                          
                        </div>
                            </fieldset> -->


                        <div class="userlogin">
                            <div class="row mb-3">
                                <!-- <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label> -->
                                <div class="col-sm-3">

                                    <!-- <input type="password" name="password" id="password" class="form-control" readonly> -->
                                
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
                         <!-----<input type="submit" name="update" class="btn btn-primary add_empolyee" value="Update Employee">---->
                          </div>
                          </div>
                        <!----<button type="submit" id="submit"   class="btn btn-primary add_empolyee">Submit</button>---->
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

