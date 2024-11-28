<?php
$tz = 'Asia/Kolkata';   
date_default_timezone_set($tz);
error_reporting(0);
session_start();
include 'connection.php';
//include '../Script/CommonFunctions.php';
$EmpID=$_REQUEST["EmpID"];
$EmpID=EDV($EmpID,2);

$fetch = mysqli_query($conn, "SELECT `us`.*, `design`.`Designation`, `depart`.`department`,`co`.`country_id`,`co`.`country_name`,`st`.`state_id`,`st`.`country_id`,`st`.`state_name`,`ct`.`city_id`,`ct`.`state_id`,`ct`.`city_name` FROM `employee` `us` LEFT JOIN `designation` `design` ON `us`.`desig_id`= `design`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id` = `depart`.`dept_id` LEFT JOIN `countries` `co` ON `us`.`country_id`=`co`.`country_id` LEFT JOIN `states` `st` ON `us`.`state_id`=`st`.`state_id` LEFT JOIN `cities` `ct` ON `us`.`city_id`=`ct`.`city_id` where `us`.`Id`='$EmpID'");
$row   = mysqli_fetch_array($fetch);

//update code start here.
if(isset($_POST['update']))
{
    $emp_name=CF($_POST["empname"],$conn);
    $emp_code=CF($_POST["empid"],$conn);
    $desig_id=CF($_POST["designation"],$conn);
    $dept_id=CF($_POST["department"],$conn);
    $attendence_id='';
    $emp_type='';
    $emp_status=CF($_POST["status"],$conn);
    //$user_login=CF($_POST["gridRadios"],$conn);
    $role_id=CF($_POST["roleid"],$conn);
    $email=CF($_POST["email"],$conn);
    $phone=CF($_POST["phone"],$conn);
    $alernate_number=CF($_POST["alernate_number"],$conn);
    $gender=CF($_POST["gender"],$conn);
    $father_name=CF($_POST["father_name"],$conn);
    $father_mobile=CF($_POST["father_mobile"],$conn);
    $current_address=CF($_POST["current_address"],$conn);
    $country=CF($_POST["country"],$conn);
    $state=CF($_POST["region"],$conn);
    $city=CF($_POST["city"],$conn);
    $pin_code=CF($_POST["pin_code"],$conn);
    $permanent_address=CF($_POST["permanent_address"],$conn);
    $joining_date=CF($_POST["joining_date"],$conn);
    // $status=CF($_POST["status"],$conn);
    $beneficiary_name=CF($_POST["beneficiary_name"],$conn);
    $account_number=CF($_POST["account_number"],$conn);
    $bank_name=CF($_POST["bank_name"],$conn);
    $branch_name=CF($_POST["branch_name"],$conn);
    $ifsc_code=CF($_POST["ifsc_code"],$conn);
    $forget_password=CF($_POST["gridRadios"],$conn);
    $aadhar_no=CF($_POST["aadhar_no"],$conn);
    $pan_no=CF($_POST["pan_no"],$conn);
    $uan_no=CF($_POST["uan_no"],$conn);
    $esi_no=CF($_POST["esi_no"],$conn);
    $pf_no=CF($_POST["pf_no"],$conn);
    $project_name=CF($_POST["project_name"],$conn);

    echo $update="UPDATE `employee` SET `emp_name`='$emp_name',`emp_code`='$emp_code',`desig_id`='$desig_id',`dept_id`='$dept_id',`attendence_id`='$attendence_id',`emp_type`='$emp_type',`emp_status`='$emp_status',`user_login`='$user_login',`role_id`='$role_id',`email`='$email',`phone`='$phone',`alernate_number`='$alernate_number',`gender`='$gender',`father_name`='$father_name',`father_mobile`='$father_mobile',`current_address`='$current_address',`country_id`='$country',`state_id`='$state',`city_id`='$city',`pin_code`='$pin_code',`permanent_address`='$permanent_address',`joining_date`='$joining_date',`beneficiary_name`='$beneficiary_name',`account_number`='$account_number',`bank_name`='$bank_name',`branch_name`='$branch_name',`ifsc_code`='$ifsc_code',`forget_password`='$forget_password',`aadhar_no`='$aadhar_no',`pan_no`='$pan_no',`uan_no`='$uan_no',`esi_no`='$esi_no',`pf_no`='$pf_no',`project_name`='$project_name',`UpdatedOn`=now() WHERE `Id`='$EmpID'";
   // die();
    $run = mysqli_query($conn, $update);
    $emp_ID=$_REQUEST["EmpID"];
    header("location:PFC.php?PageName=EmpUpdate&Mgs=1&EmpID=$emp_ID");
}
//update code end here.
?>

<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Employee Updated Successfully.</strong>
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
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
              <nav class="navbar navbar-light bg-light">
              <form action="#" method="GET">
                <a class="btn btn-warning text-dark"  href="PFC.php?PageName=view_employee_details" style="font-size: large;height: 42px;padding: 7px;width: 102px;float: left;margin-left: 20px;" role="button">Back</a>
              </form><br>
                <center><h2 style="color:#012970;margin-right:602px;"><b>UPDATE EMPLOYEE</b></h2></center>
                 </nav>
                <div class="card-body">
                  <form method="POST">    
                  <input type="hidden" name="roleid" id="roleid" value="<?php echo $_SESSION["role_Id"];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3"> 
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee Name  <span style="color:red">*</span></label>
                          <input type="text" class="name form-control" name="empname" value="<?php echo $row["emp_name"]; ?>">
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee ID <span style="color:red">*</span></label>
                          <input type="text" class="empid form-control" name="empid" value="<?php echo $row["emp_code"]; ?>">
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                          <div class="col-4">
                            <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                            <input type="text" class="email form-control" name="email" value="<?php echo $row["email"]; ?>">
                        </div>
                        <div class="col-4">
                            <label for="text" class="form-label">Phone No <span style="color:red">*</span></label>

                            <input type="text"  class="phone form-control"  maxlength="10" name="phone" value="<?php echo $row["phone"]; ?>">
                        </div>
                        <div class="col-4">
                            <label for="text" class="form-label">Alternate Phone No <span style="color:red">*</span></label>
                            <input type="text"  class="alernate_number form-control"  maxlength="10" name="alernate_number" value="<?php echo $row["alernate_number"]; ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="desigantion" class="form-label">Designation <span style="color:red">*</span></label>
                              <select name="designation" class="fstdropdown-select" id="designation" data-live-search="true"  data-size="8" tabindex="null">
                                <option value="NA">--SELECT DESIGNATION--</option>
                                <?php
                                    $sql="SELECT * FROM `designation` ORDER BY `desig_id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while( $rowDes = mysqli_fetch_array($result))
                                    {
                                  ?>
                               <option value="<?php echo $rowDes["desig_id"];?>" <?php if($rowDes["desig_id"]==$row["desig_id"]){ echo 'selected'; }?>><?php echo $rowDes["Designation"];?></option>              
                              <?php }  ?>
                               </select>

                        </div>
                        <div class="col-4">
                            <label for="department" class="form-label">Department <span style="color:red">*</span></label>
                              <select name="department" class="fstdropdown-select" id="department" data-live-search="true"  data-size="8" tabindex="null">
                                <option value="NA">--SELECT DEPARTMENT--</option>
                                 <?php 
                                    $sql="SELECT * FROM `department` ORDER BY `dept_id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while( $rowDep = mysqli_fetch_array($result))
                                    {
                                  ?>
                                  <option value="<?php echo $rowDep["dept_id"];?>" <?php if($rowDep["dept_id"]==$row["dept_id"]){ echo 'selected'; }?>><?php echo $rowDep["department"];?></option>              
                               <?php }  ?>
                               </select>

                           </div>
                           <div class="col-4">
                            <label for="text" class="form-label">Father Name <span style="color:red">*</span></label>
                            <input type="text" class="father_name form-control" name="father_name" value="<?php  echo $row["father_name"]; ?>">
                        </div>

                        </div><br>
                        <div class="row g-3">
                        <div class="col-6">
                          <label for="text" class="form-label">Father Phone No <span style="color:red">*</span></label>
                          <input type="text" class="father_mobile form-control" name="father_mobile" maxlength="10" placeholder="Enter Father Phone No " value="<?php echo $row["father_mobile"];?>">
                            </div>

                    <div class="col-6">
                         <label for="text" class="form-label">Gender <span style="color:red">*</span></label>
                             <select name="gender" class="gender  form-control select_type" id="gender">
                             <?php if(($_REQUEST['EmpID']!='')){?>
                                <option selected>--SELECT GENDER--</option>
                                <option value="<?php if($row['gender']=="FEMALE"){ echo $row['gender']; } else {echo "FEMALE"; }?>"selected><?php if($row['gender']=="FEMALE"){ echo $row['gender']; } else {echo "FEMALE"; }?></option>
                                <option value="<?php if($row['gender']=="MALE"){ echo $row['gender']; } else {echo "MALE"; }?>"selected><?php if($row['gender']=="MALE"){ echo $row['gender']; } else {echo "MALE"; }?></option>
                    </select>
                    <?php } else {?>
                      <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                      <option selected>--SELECT GENDER--</option>
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
                            <input type="text" class="current_address form-control" name="current_address"  placeholder="Enter Address" value="<?php echo $row["current_address"];?>">
                            </div>
                        </div> 
                        <br>
                        <div class="row g-3">
                         <div class="col-6 mt-3"> 
                          <label for="country" class="form-label">Country <span style="color:red">*</span></label><br>
                            <select id="country" name="country"  id="country" class="country form-control"> 
                            <option  value="NA">--SELECT COUNTRY--</option>
                            <?php       
                                  $sqlc = "SELECT * FROM countries WHERE status = 1 and country_id =101  ORDER BY country_id ASC";
                                  $resultcnt = mysqli_query($conn, $sqlc);                 
                                  while( $rowcountry = mysqli_fetch_array($resultcnt))
                                  {
                                      if(!empty($_REQUEST['EmpID']))
                                      {
                                ?>
                                <option value="<?php echo $row["country_id"];?>" selected><?php echo $row["country_name"];?></option>
                                <?php } else {?>
                                <option value="<?php echo $rowcountry["country_id"];?>"><?php echo $rowcountry["country_name"];?></option>
                             <?php } } ?>
                               </select>
                            </div>
                            <div class="col-6">
                              <label for="inputState" class="form-label">State <span style="color:red">*</span></label>
                                <select  name="region" id="state" class="region form-control">                         
                                <option  value="NA">--SELECT STATE--</option>
                                <?php 
                                    $sql="SELECT * FROM `states` ORDER BY `state_id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while( $rowstate = mysqli_fetch_array($result))
                                    {
                                  ?>
                                  <option value="<?php echo $rowstate["state_id"];?>" <?php if($rowstate["state_id"]==$row["state_id"]){ echo 'selected'; }?>><?php echo $rowstate["state_name"];?></option>              
                               <?php }  ?>
                                </select>
                             </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-6">
                             <label for="inputCity" class="form-label">City <span style="color:red">*</span></label>
                              <select  name="city" id="city" class="city form-control">
                                  <option value="NA">--SELECT CITY--</option>
                                  <?php 
                                    $sql="SELECT * FROM `cities` ORDER BY `city_id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while( $rowcity = mysqli_fetch_array($result))
                                     {
                                  ?>
                                  <option value="<?php echo $rowcity["city_id"];?>" <?php if($rowcity["city_id"]==$row["city_id"]){ echo 'selected'; }?>><?php echo $rowcity["city_name"];?></option>              
                               <?php }  ?>
                               </select>
                            </div>
                            <div class="col-6">
                                <label for="pincode" class="form-label">Pincode <span style="color:red">*</span></label>
                                <input type="pin_code" maxlength="6" class="pin_code form-control" name="pin_code" value="<?php echo $row["pin_code"];?>">
                            </div>
                        </div>
                        <br>                                             
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Permanent Address <span style="color:red">*</span></label>
                                <input type="text" class="permanent_address form-control"  name="permanent_address" placeholder="Enter Address" value="<?php echo $row["permanent_address"];?>">
                            </div>
                        </div> 
                    <br>   
                      <div class="row g-3">
                         <div class="col">
                            <label for="text" class="form-label">Joining Date <span style="color:red">*</span></label>
                            <input type="date"  class="joining_date form-control"  name="joining_date" value="<?php echo $row["joining_date"];?>">
                        </div>
                     <div class="col ">  
                       <label for="">Status <span style="color:red">*</span></label>
                       <?php if(($_REQUEST['EmpID']!='')){?>
                        <select name="status" class="status  form-control" id="status">
                                <option selected>--SELECT STATUS--</option>
                                <option value="<?php if($row['emp_status']=="2"){ echo $row['emp_status']; } else {echo "2"; }?>"selected><?php if($row['emp_status']=="2"){ echo $row['emp_status']="DEACTIVE"; } else {echo "DEACTIVE"; }?></option>
                                <option value="<?php if($row['emp_status']=="1"){ echo $row['emp_status']; } else {echo "1"; }?>"selected><?php if($row['emp_status']=="1"){ echo $row['emp_status']="ACTIVE"; } else {echo "ACTIVE"; }?></option>
                        </select>
                        <?php } ?>
                     </div>
                   </div>
                  <br>    
                  <!--Salay Slip-->
                    <div class="row g-3">
                         <div class="col">
                            <label for="text" class="form-label">Aadhar No <span style="color:red">*</span></label>
                            <input type="text"  class="aadhar_no form-control"  name="aadhar_no" id="aadhar_no" value="<?php echo $row["aadhar_no"];?>">
                            </div>
                     <div class="col">  
                       <label for="">PAN No <span style="color:red">*</span></label>
                          <input type="text" name="pan_no" class="pan_no  form-control" id="pan_no" value="<?php echo $row["pan_no"];?>">
                     </div>
                      </div> <br>  
                      <div class="row g-3">
                     <div class="col-4">  
                       <label for="">UAN No <span style="color:red">*</span></label>
                       <input type="text" name="uan_no" class="uan_no  form-control" id="uan_no" value="<?php echo $row["uan_no"];?>">
                     </div>

                     <div class="col-4">  
                       <label for="">ESI No <span style="color:red">*</span></label>
                       <input type="text" name="esi_no" class="uan_no  form-control" id="esi_no" value="<?php echo $row["esi_no"];?>">
                     </div>
                     <div class="col-4">  
                       <label for="">PF No <span style="color:red">*</span></label>
                       <input type="text" name="pf_no" class="pf_no  form-control" id="pf_no" value="<?php echo $row["pf_no"];?>">
                     </div>
                    </div> <br>  

                     
                     <!-- <div class="col-6">  
                       <label for="">Project Name <span style="color:red">*</span></label>
                       <input type="text" name="project_name" class="project_name  form-control" id="project_name" value="<?php //echo $row["project_name"];?>">
                     </div> -->
<!--Salay Slip-->
<br><br>                           
<!--Bank Details Start-->
<fieldset class="scheduler-border">
    <legend class="scheduler-border mt-2"><b style="color:black">BANKING DETAILS</b></legend>
    <div class="row">
        <div class="col mt-3">
            <div class="row g-3">
                <div class=" col-6 ">
                    <label for="text" class="form-label">Account Holder Name <span style="color:red">*</span></label>
                    <input type="text" class="beneficiary_name form-control" name="beneficiary_name"  value="<?php echo $row["beneficiary_name"];?>">
                </div>

                <div class=" col-6 ">
                    <label for="text" class="form-label">Account Number <span style="color:red">*</span></label>
                    <input type="text" class="account_number form-control" name="account_number"  value="<?php echo $row["account_number"];?>">
                </div>
            </div><br>
            <div class="row g-3">
                <div class=" col-4 ">
                    <label for="text" class="form-label">Bank Name <span style="color:red">*</span></label>
                    <input type="text" class="bank_name form-control" name="bank_name" value="<?php echo $row["bank_name"];?>">
                </div>
                <div class=" col-4 ">
                    <label for="text" class="form-label">Branch Name <span style="color:red">*</span></label>
                    <input type="text" class="branch_name form-control" name="branch_name"  value="<?php echo $row["branch_name"];?>">
                </div>
                <div class=" col-4 ">
                    <label for="text" class="form-label">IFSC Code <span style="color:red">*</span></label>
                    <input type="text" class="ifsc_code form-control" name="ifsc_code" value="<?php echo $row["ifsc_code"];?>">
                </div>
            </div><br><br>
      </fieldset>
<!--Bank Details End-->
         <!--User Login Details End-->
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Forget Password</legend>
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
                        <div class="userlogin">
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-3">

                                    <input type="password" name="password" id="password" class="form-control">
                                       </div>
                                      </div>
                                     </div>
                                   </div>
                                  </div>
                                </div>
                              </div>
                              <input type="submit" name="update" class="btn btn-primary add_empolyee" value="Update Employee" style="margin-left:1299px;padding:10px;text-align: center;width:114px">  
                             </div>
                            </div>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div>
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
  <script type="text/Javascript">
$(document).ready(function(){
    $('#country').on('change', function(){
      //alert('Hello world');
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'./Script/update_emp_data.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">SELECT STATE FIRST</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">SELECT COUNTRY FIRST</option>');
            $('#city').html('<option value="">SELECT STATE FIRST</option>'); 
        }
    });
    
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'./Script/update_emp_data.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">SELECT STATE FIRST</option>'); 
        }
    });
});
</script>