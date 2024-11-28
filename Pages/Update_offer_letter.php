<?php
error_reporting(0);
include 'connection.php';

$ID=$_REQUEST["ID"];

//$sql_Details="SELECT `Id`, `employee_name` FROM `offer_letters_details` WHERE `Id` = '$ID'";
$sql_Details="SELECT `offerl`.*,`desig`.`Designation`,`cut`.`country_name`,`stat`.`state_name`,`citi`.`city_name` FROM `offer_letters_details` `offerl` left join `designation` `desig` ON `offerl`.`desig_id`=`desig`.`desig_id` left join `countries` `cut` ON `offerl`.`country`=`cut`.`country_id` left join `states` `stat` ON `offerl`.`emp_state_name`=`stat`.`state_id`  left join `cities` `citi` ON `offerl`.`city`=`citi`.`city_id` WHERE `offerl`.`Id`='$ID'";
$result_details = mysqli_query($conn,$sql_Details);
$row_details = $result_details->fetch_assoc();
$Employee_name=$row_details["employee_name"];

if(isset($_POST["updateempdetails"]))
{


  $employee_name=CF($_POST["employee_name"],$conn);
  $designation=CF($_POST["designation"],$conn);
  $country=CF($_POST["country"],$conn);
  $state=CF($_POST["emp_state_name"],$conn);
  $city=trim(CF($_POST["city"],$conn));
  $pincode=trim(CF($_POST["pincode"],$conn));;
  $university_name=CF($_POST["university_name"],$conn);
  $upload_state_name=CF($_POST["upload_state_name"],$conn);
  $work_experience=CF($_POST["work_experience"],$conn);
  $joining_date=CF($_POST["joining_date"],$conn);
  $previous_last_company_name=CF($_POST["previous_last_company_name"],$conn);
  $monthly_ctc=CF($_POST["monthly_ctc"],$conn);

  //File Upload For uploadphotos.
  $new_image_photo=$_FILES['uploadphotos']['name'];
  //$old_image_adhar=$_POST['oldadharcard'];
  
  if(!empty($new_image_photo))
  {
    $target_photos = "Pages/uploadphphots_file/";  
    $target_photos = $target_photos.basename($_FILES['uploadphotos']['name']);   
      
    if(move_uploaded_file($_FILES['uploadphotos']['tmp_name'],$target_photos)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    } 
  }
  else
  {
    $target_photos=$_POST['olduploadphotos'];
  }


  //File Upload For adharcard_file.
$new_image_adhar=$_FILES['adharcard']['name'];
//$old_image_adhar=$_POST['oldadharcard'];

if(!empty($new_image_adhar))
{
  $target_path = "Pages/adharcard_file/";  
  $target_path = $target_path.basename($_FILES['adharcard']['name']);   
    
  if(move_uploaded_file($_FILES['adharcard']['tmp_name'],$target_path)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path=$_POST['oldadharcard'];
}
 
//File Upload For pancardfile.
$new_image_pan=$_FILES['pancard']['name'];
//$old_image_adhar=$_POST['pancard'];

if(!empty($new_image_pan))
{
  $target_path_pancard = "Pages/pancard_file/";  
  $target_path_pancard = $target_path_pancard.basename($_FILES['pancard']['name']);   
    
  if(move_uploaded_file($_FILES['pancard']['tmp_name'], $target_path_pancard)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path_pancard=$_POST['oldpancard'];
}
 
//File Upload For 10thmarksheet_file.

$new_image_10th_marksheet=$_FILES['10th_marksheet']['name'];
//$old10th_marksheet=$_POST['10th_marksheet'];

if(!empty($new_image_10th_marksheet))
{
  $target_path_10th_marksheet = "Pages/10thmarksheet_file/";  
  $target_path_10th_marksheet = $target_path_10th_marksheet.basename($_FILES['10th_marksheet']['name']);   
    
  if(move_uploaded_file($_FILES['10th_marksheet']['tmp_name'], $target_path_10th_marksheet)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path_10th_marksheet=$_POST['old10th_marksheet'];
}
 
//File Upload For 10thmarksheet_file


//File Upload For 12th_marksheet.

$new_image_12th_marksheet=$_FILES['12th_marksheet']['name'];
//$old12th_markshee=$_POST['12th_markshee'];

if(!empty($new_image_12th_marksheet))
{
  $target_path_12th_marksheet = "Pages/12thmarksheet_file/";  
  $target_path_12th_marksheet = $target_path_12th_marksheet.basename($_FILES['12th_marksheet']['name']);   
    
  if(move_uploaded_file($_FILES['12th_marksheet']['tmp_name'], $target_path_12th_marksheet)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path_12th_marksheet=$_POST['old12th_marksheet'];
}
 
//File Upload For 12th_marksheet

//File Upload For final_yrs_mark_sheet(Bca/Mca).

$new_image_target_path_final_yrs_mark_sheetBca_Mca=$_FILES['final_yrs_mark_sheet(Bca/Mca)']['name'];
//$old12th_markshee=$_POST['12th_markshee'];

if(!empty($new_image_target_path_final_yrs_mark_sheetBca_Mca))
{
  $target_path_final_yrs_mark_sheetBca_Mca = "Pages/FY_marksheet_bca_mca/";  
  $target_path_final_yrs_mark_sheetBca_Mca = $target_path_final_yrs_mark_sheetBca_Mca.basename($_FILES['final_yrs_mark_sheet(Bca/Mca)']['name']);   
    
  if(move_uploaded_file($_FILES['final_yrs_mark_sheet(Bca/Mca)']['tmp_name'], $target_path_final_yrs_mark_sheetBca_Mca)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path_final_yrs_mark_sheetBca_Mca=$_POST['oldfinal_yrs_mark_sheet(Bca/Mca)'];
}
 
//File Upload For final_yrs_mark_sheet(Bca/Mca)


//File Upload For final_yr_marksheet_btechmtech.

$new_image_target_path_final_yr_marksheet_btech_mtech=$_FILES['final_yr_marksheet_btech/mtech']['name'];
//$old12th_markshee=$_POST['12th_markshee'];

if(!empty($new_image_target_path_final_yr_marksheet_btech_mtech))
{
  $target_path_final_yr_marksheet_btechmtech = "Pages/FY_marksheet_btech_mtech/";  
  $target_path_final_yr_marksheet_btechmtech = $target_path_final_yr_marksheet_btechmtech.basename($_FILES['final_yr_marksheet_btech/mtech']['name']);   
    
  if(move_uploaded_file($_FILES['final_yr_marksheet_btech/mtech']['tmp_name'], $target_path_final_yr_marksheet_btechmtech)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path_final_yr_marksheet_btechmtech=$_POST['oldfinal_yr_marksheet_btech'];
}
 
//File Upload For final_yr_marksheet_btechmtech

//File Upload For experience_letter.

$new_image_experience_letter=$_FILES['experience_letter']['name'];
//$old12th_markshee=$_POST['12th_markshee'];

if(!empty($new_image_experience_letter))
{
  $target_path_experience_letter = "Pages/experience_letter/";  
  $target_path_experience_letter = $target_path_experience_letter.basename($_FILES['experience_letter']['name']);   
    
  if(move_uploaded_file($_FILES['experience_letter']['tmp_name'], $target_path_experience_letter)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path_experience_letter=$_POST['oldexperience_letter'];
}
 
//File Upload For experience_letter


//File Upload Forrelieving_letter.

$new_image_relieving_letter=$_FILES['relieving_letter']['name'];
//$old12th_markshee=$_POST['12th_markshee'];

if(!empty($new_image_relieving_letter))
{
  $target_path_relieving_letter = "Pages/relieving_letter/";  
  $target_path_relieving_letter = $target_path_relieving_letter.basename($_FILES['relieving_letter']['name']);   
    
  if(move_uploaded_file($_FILES['relieving_letter']['tmp_name'], $target_path_relieving_letter)) {  
      echo "File uploaded successfully!";  
  } else{  
      echo "Sorry, file not uploaded, please try again!";  
  } 
}
else
{
  $target_path_relieving_letter=$_POST['oldrelieving_letter'];
}
 
//File Upload For relieving_letter.

$sql_update="UPDATE `offer_letters_details` SET `employee_name`='$employee_name',`desig_id`='$designation',`country`=' $country',`emp_state_name`='$state',`city`='$city',`pincode`='$pincode',
`uploadphotos`='$target_photos',`adharcard`='$target_path',`pancard`='$target_path_pancard',`10th_marksheet`='$target_path_10th_marksheet',`12th_marksheet`='$target_path_12th_marksheet',`final_yrs_mark_sheet(Bca/Mca)`='$target_path_final_yrs_mark_sheetBca_Mca',
`final_yr_marksheet_btech/mtech`='$target_path_final_yr_marksheet_btechmtech',`university_name`='$university_name',`upload_state_name`='$upload_state_name',`experience_letter`='$target_path_experience_letter',`work_experience`='$work_experience',
`relieving_letter`='$target_path_relieving_letter',`joining_date`='$joining_date',`previous_last_company_name`='$previous_last_company_name',`monthly_ctc`='$monthly_ctc' WHERE `Id`='$ID'";

$run_Sub = mysqli_query($conn,$sql_update);
if($run_Sub > '0')
{
  $message="Save successfully";
  header("location:PFC.php?PageName=Update_offer_letter&Mgs=1");
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
      <strong><i class="bi bi-check"></i> Success !</span>Offer Updated Successfully.</strong>
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
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
              <nav class="navbar navbar-light bg-light">
              <form action="#" method="GET">
                <a class="btn btn-warning text-dark"  href="PFC.php?PageName=view_offer_letter" style="font-size: large;height: 42px;padding: 7px;width: 102px;float: left;margin-left: 20px;" role="button">Back</a>
              </form><br>
                <div class="pagetitle">
                  <h2 style="color:#012970;margin-right:477px;margin-top:13px;"><b>UPDATE EMPLOYEE OFFER LETTER</b></h2>
                 </div>
                 </nav>
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">    
                  <input type="hidden" name="roleid" id="roleid" value="<?php echo $_SESSION["role_Id"];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3"> 
                            <div class="row">
                            <div class="col-6">
                              <label for="employee_name" class="col-form-label">Employee Name <span style="color: red">*</span></label>
                              <input type="text" class="employee_name form-control" name="employee_name" id="employee_name" value="<?php echo $row_details["employee_name"];?>" required>
                              </div>
                              <div class="col-6">
                              <label for="designation" class="col-form-label">Designation<span style="color: red">*</span></label>
                              <select class="fstdropdown-select" name="designation"  id="designation">
                                <option value="NA">--SELECT DESIGNATION--</option>
                                <?php
                                  $sql_desig="SELECT `desig_id`, `Designation` FROM `designation` WHERE `desig_id` <> '1'";
                                  $result = mysqli_query($conn,$sql_desig);
                                  while( $row = mysqli_fetch_array($result))
                                  {
                                ?>
                                <option value="<?php echo $row["desig_id"];?>" <?php if($row["desig_id"]==$row_details["desig_id"]){ echo 'selected'; }?>><?php echo $row["Designation"];?></option>
                            <?php } ?>
                                ?>
                              </select>
                              </div>
                            </div><br><br>
                         
                            <div class="row">
                                            <div class="col-6">
                                              <label for="country" class="form-label">Country  <span style="color: red">*</span></label><br>
                                              <select id="country" name="country"  id="country" class="country form-control" > 
                                              <option value="NA">--SELECT COUNTRY--</option>
                                              <?php       
                                                      $sql = "SELECT * FROM countries WHERE status = 1 and country_id=101  ORDER BY country_name ASC";
                                                      $result = $conn->query($sql);

                                                      if ($result->num_rows > 0) 
                                                      {
                                                        while($rows = $result->fetch_assoc()) 
                                                          {
                                                        ?>
                                                      <option value="<?php echo $rows['country_id'];?>"<?php if($row["country_id"]==$row_details["country_id"]){ echo 'selected'; }?>><?php echo $rows['country_name'];?></option>
                                                      <?php 
                                                          }
                                                        }
                                                     ?>
                                                </select>
                                              </div>
                                          <div class="col-6">
                                            <label for="emp_state_name" class="col-sm-2 col-form-label">State <span style="color: red">*</span></label>
                                            <select  name="emp_state_name" id="state_name" class="emp_state_name form-control">                         
                                            <option  value="NA">--SELECT STATE--</option>
                                            <?php 
                                                $sql="SELECT * FROM `states` ORDER BY `state_id` DESC";
                                                $result = mysqli_query($conn, $sql);
                                                while( $row_data = mysqli_fetch_array($result))
                                                {
                                              ?>
                                              <option value="<?php echo $row_data["state_id"];?>" <?php if($row_data["state_id"]==$row_details["emp_state_name"]){ echo 'selected'; }?>><?php echo $row_data["state_name"];?></option>              
                                               <?php }  ?>
                                               </select>
                                          </select>
                                            </div>
                                            </div><br>
                                        <div class="row">
                                           <div class="col-6">
                                            <label for="city" class="col-form-label">City <span style="color: red">*</span></label>
                                            <select  name="city" id="city" class="city form-control">
                                                <option value="NA">--SELECT CITY--</option>
                                                <?php 
                                                  $sql="SELECT * FROM `cities` ORDER BY `city_id` DESC";
                                                  $result = mysqli_query($conn, $sql);
                                                  while( $rowcity = mysqli_fetch_array($result))
                                                  {
                                                ?>
                                                <option value="<?php echo $rowcity["city_id"];?>" <?php if($rowcity["city_id"]==$row_details["city"]){ echo 'selected'; }?>><?php echo $rowcity["city_name"];?></option>              
                                            <?php }  ?>
                                            </select>
                                            </div>
                                              <div class="col-6">
                                                  <label for="pincode" class="col-sm-2 col-form-label">Pin Code <span style="color: red">*</span></label>
                                                  <input type="text" class="pincode form-control" name="pincode" id="pincode"  value="<?php echo $row_details["pincode"];?>" required>
                                              </div>
                                            </div><br>

                                          <fieldset class="scheduler-border">
                                          <legend class="scheduler-border mt-2" style="color:#012970;">UPLOAD DOCUMENTS</legend>
                                          <div class="col-6">
                                            <label class="form-label" for="uploadphotos">Upload Poptos <span style="color: red">*</span><a href="<?php echo $row_details["uploadphotos"];?>" target="_blank"><?php echo $row_details["employee_name"].' Emp Photos';?></a></label>
                                                <input type="file" class="form-control uploadphotos" id="uploadphotos"  name="uploadphotos" />
                                                <input type="hidden" class="form-control olduploadphotos" id="olduploadphotos"  name="olduploadphotos" value="<?php echo $row_details["adharcard"];?>"/>
                                            </div>
                                            </div><br>
                                          <div class="row">
                                            <div class="col-6">
                                              <!-- <label class="form-label" for="adharcard">Aadhar Card <span style="color: red">*</span></label> -->
                                              <label class="form-label" for="adharcard">Aadhar Card <span style="color: red">*</span>  <a href="<?php echo $row_details["adharcard"];?>" target="_blank"><?php echo $row_details["employee_name"].' Adhaar Card';?></a></label>
                                                <input type="file" class="form-control adharcard" id="adharcard"  name="adharcard" />
                                                <input type="hidden" class="form-control oldadharcard" id="oldadharcard"  name="oldadharcard" value="<?php echo $row_details["adharcard"];?>"/>
                                            </div>
                                            <div class="col-6">
                                            <label class="form-label" for="pancard">Pan Card <span style="color: red">*</span>  <a href="<?php echo $row_details["pancard"];?>" target="_blank"><?php echo $row_details["employee_name"].' Pan Card';?></a></label>
                                                <input type="file" class="form-control pancard" id="pancard"  name="pancard" />
                                                <input type="hidden" class="form-control oldpancard" id="oldpancard"  name="oldpancard" value="<?php echo $row_details["pancard"];?>"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                            <label class="form-label" for="10th_marksheet">10th Mark Sheet <span style="color: red">*</span> <a href="<?php echo $row_details["10th_marksheet"];?>" target="_blank"><?php echo $row_details["employee_name"].'10 th_marksheet';?></a></label>
                                                <input type="file" class="form-control 10th_marksheet" id="10th_marksheet" name="10th_marksheet"  />
                                                <input type="hidden" class="form-control old10th_marksheet" id="old10th_marksheet"  name="old10th_marksheet" value="<?php echo $row_details["10th_marksheet"];?>"/>
                                            </div>
                                            <div class="col-6">
                                            <label class="form-label" for="12th_marksheet">10+2 Mark Sheet <span style="color: red">*</span> <a href="<?php echo $row_details["12th_marksheet"];?>" target="_blank"><?php echo $row_details["employee_name"].'12th_marksheet';?></a></label>
                                                <input type="file" class="form-control 12th_marksheet" id="12th_marksheet" name="12th_marksheet"  />
                                                <input type="hidden" class="form-control old12th_marksheet" id="old12th_marksheet"  name="old12th_marksheet" value="<?php echo $row_details["12th_marksheet"];?>"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                            <label class="form-label" for="final_yrs_mark_sheet(Bca/Mca)">Final Year Mark Sheet (Bca or Mca any one) <span style="color: red">*</span> <a href="<?php echo $row_details["final_yrs_mark_sheet(Bca/Mca)"];?>" target="_blank"><?php echo $row_details["employee_name"].' oldfinal_yrs_mark_sheet(Bca/Mca)';?></a></label>
                                                <input type="file" class="form-control final_yrs_mark_sheet(Bca/Mca)" id="final_yrs_mark_sheet(Bca/Mca)" name="final_yrs_mark_sheet(Bca/Mca)"/>
                                                <input type="hidden" class="form-control oldfinal_yrs_mark_sheet(Bca/Mca)" id="oldfinal_yrs_mark_sheet(Bca/Mca)"  name="oldfinal_yrs_mark_sheet(Bca/Mca)" value="<?php echo $row_details["final_yrs_mark_sheet(Bca/Mca)"];?>"/>
                                            </div>
                                            <div class="col-6">
                                            <label class="form-label" for="final_yr_marksheet_btech/mtech">Final Year Mark Sheet (B.tech or M.tech any one) <span style="color: red">*</span> <a href="<?php echo $row_details["final_yr_marksheet_btech/mtech"];?>" target="_blank"><?php echo $row_details["employee_name"].' oldfinal_yrs_mark_sheet(Bca/Mca)';?></a></label>
                                                <input type="file" class="form-control final_yr_marksheet_btech/mtech" id="final_yr_marksheet_btech/mtech" name="final_yr_marksheet_btech/mtech"/>
                                                <input type="hidden" class="form-control oldfinal_yr_marksheet_btech" id="oldfinal_yr_marksheet_btech"  name="oldfinal_yr_marksheet_btech" value="<?php echo $row_details["final_yr_marksheet_btech/mtech"];?>"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="university_name">University Name <span style="color: red">*</span></label>
                                                <input type="text" class="form-control university_name" name="university_name" id="university_name"  value="<?php echo $row_details["university_name"];?>"  />
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="upload_state_name">State <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" id="upload_state_name" name="upload_state_name"  value="<?php echo $row_details["upload_state_name"];?>"  />
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                            <label class="form-label" for="experience_letter">Last Company Experience Letter (If any) <span style="color: red">*</span> <a href="<?php echo $row_details["experience_letter"];?>" target="_blank"><?php echo $row_details["employee_name"].' Experience Letter';?></a></label>
                                                <input type="file" class="form-control experience_letter" id="experience_letter" name="experience_letter"/>
                                                <input type="hidden" class="form-control oldexperience_letter" id="oldexperience_letter"  name="oldexperience_letter" value="<?php echo $row_details["experience_letter"];?>"/>
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="work_experience">Work Experience (In Months and Years) <span style="color: red">*</span></label>
                                                <input type="text" class="form-control work_experience" id="work_experience"  name="work_experience" value="<?php echo $row_details["work_experience"];?>"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                            <label class="form-label" for="relieving_letter">Previous / Last Company Relieving Letter (If any) <span style="color: red">*</span ><a href="<?php echo $row_details["relieving_letter"];?>" target="_blank"><?php echo $row_details["employee_name"].' Relieving Letter';?></a></label>
                                                <input type="file" class="form-control relieving_letter" id="relieving_letter"  name="relieving_letter" />
                                                <input type="hidden" class="form-control oldrelieving_letter" id="oldrelieving_letter"  name="oldrelieving_letter" value="<?php echo $row_details["relieving_letter"];?>"/>
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="joining_date">Joining Date <span style="color: red">*</span></label>
                                                <input type="date" class="form-control joining_date" id="joining_date"  name="joining_date" value="<?php echo $row_details["joining_date"];?>" />
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="previous_last_company_name">Previous / Last Company Name <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" id="previous_last_company_name"  name="previous_last_company_name"  value="<?php echo $row_details["previous_last_company_name"];?>" required/>
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="previous_last_company_name">Monthly CTC <span style="color: red">*</span></label>
                                              <input type="text" class="form-control monthly_ctc" id="monthly_ctc"  name="monthly_ctc"  value="<?php echo $row_details["monthly_ctc"];?>"/>
                                            </div>
                                            </div><br>
                                           </fieldset>
                                         </div>
                                        </div><br>
                                        <input type="submit"   name="updateempdetails" class="btn btn-primary add_empolyee" value="Submit">
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
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'./Script/add_emp_data.php',
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
                url:'./Script/add_emp_data.php',
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