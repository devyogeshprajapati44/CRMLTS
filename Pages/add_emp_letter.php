<?php
  include 'connection.php';

if (isset($_POST['saveempdetails'])) 
{
  $employee_name=CF($_POST["employee_name"],$conn);
  $designation=CF($_POST["designation"],$conn);
  $address=CF($_POST["address"],$conn);
  $country=CF($_POST["country"],$conn);
  $state=CF($_POST["emp_state_name"],$conn);
  $city=trim(CF($_POST["city"],$conn));
  $pincode=trim(CF($_POST["pincode"],$conn));
  $uploadphotos=CF($_POST["uploadphotos"],$conn);
  $aadharcard=CF($_POST["adharcard"],$conn);
  $pancard=CF($_POST["pancard"],$conn);
  $tenth_marksheet=CF($_POST["10th_marksheet"],$conn);
  $tweleth_marksheet=CF($_POST["12th_marksheet"],$conn);
  $final_yrs_mark_sheet=CF($_POST["final_yrs_mark_sheet(Bca/Mca)"],$conn);
  $final_yr_marksheet_btech=CF($_POST["final_yr_marksheet_btech/mtech"],$conn);
  $university_name=CF($_POST["university_name"],$conn);
  $upload_state_name=CF($_POST["upload_state_name"],$conn);
  $experience_letter=CF($_POST["experience_letter"],$conn);
  $work_experience=CF($_POST["work_experience"],$conn);
  $relieving_letter=CF($_POST["relieving_letter"],$conn);
  $joining_date=CF($_POST["joining_date"],$conn);
  $previous_last_company_name=CF($_POST["previous_last_company_name"],$conn);

  //File Upload For uploadphotos.
$target_path_photo = "./offer_mgnt_documents/uploadphotos_file/";  
$target_path_photo = $target_path_photo.basename($_FILES['uploadphotos']['name']);   
//$_REQUEST["target_path_photo"]=$target_path_photo;

if(move_uploaded_file($_FILES['uploadphotos']['tmp_name'], $target_path_photo)) {  
  echo "File uploaded successfully!";  
} else{  
  echo "Sorry, file not uploaded, please try again!";  
}  

//File Upload For adharcard_file.
  $target_path = "./offer_mgnt_documents/adharcard_file/";  
  $target_path = $target_path.basename($_FILES['adharcard']['name']);   
  //$_REQUEST["target_adharcard"]=$target_path;  

if(move_uploaded_file($_FILES['adharcard']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
//File Upload For adharcard_file.

//File Upload For pancard_file.
$target_path_pancard = "./offer_mgnt_documents/pancard_file/";  
$target_path_pancard = $target_path_pancard.basename($_FILES['pancard']['name']);
//$_REQUEST["target_path_pancard"]=$target_path_pancard;    
  
if(move_uploaded_file($_FILES['pancard']['tmp_name'], $target_path_pancard)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
//File Upload For pancard_file.

//File Upload For 10thmarksheet_file.
$target_path_10th_marksheet = "./offer_mgnt_documents/10thmarksheet_file/";  
$target_path_10th_marksheet = $target_path_10th_marksheet.basename($_FILES['10th_marksheet']['name']);
//$_REQUEST["target_path_10th_marksheet"]=$target_path_10th_marksheet;    
  
if(move_uploaded_file($_FILES['10th_marksheet']['tmp_name'], $target_path_10th_marksheet)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
//File Upload For 10thmarksheet_file.

//File Upload For 12thmarksheet_file.
$target_path_12th_marksheet = "./offer_mgnt_documents/12thmarksheet_file/";  
$target_path_12th_marksheet = $target_path_12th_marksheet.basename($_FILES['12th_marksheet']['name']);  
//$_REQUEST["target_path_12th_marksheet"]=$target_path_12th_marksheet; 
  
if(move_uploaded_file($_FILES['12th_marksheet']['tmp_name'], $target_path_12th_marksheet)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
//File Upload For 12thmarksheet_file.

//File Upload For final_yrs_mark_sheet(Bca/Mca).
$target_path_final_yrs_mark_sheetBca_Mca = "./offer_mgnt_documents/FY_marksheet_bca_mca/";  
$target_path_final_yrs_mark_sheetBca_Mca = $target_path_final_yrs_mark_sheetBca_Mca.basename($_FILES['final_yrs_mark_sheet(Bca/Mca)']['name']);   
//$_REQUEST["target_path_final_yrs_mark_sheetBca_Mca"]=$target_path_final_yrs_mark_sheetBca_Mca;

if(move_uploaded_file($_FILES['final_yrs_mark_sheet(Bca/Mca)']['tmp_name'], $target_path_final_yrs_mark_sheetBca_Mca)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
//File Upload For final_yrs_mark_sheet(Bca/Mca).

//File Upload For final_yr_marksheet_btech/mtech.
$target_path_final_yr_marksheet_btechmtech = "./offer_mgnt_documents/FY_marksheet_btech_mtech/";  
$target_path_final_yr_marksheet_btechmtech  = $target_path_final_yr_marksheet_btechmtech.basename($_FILES['final_yr_marksheet_btech/mtech']['name']);   

//$_REQUEST["target_path_final_yr_marksheet_btechmtech"]=$target_path_final_yr_marksheet_btechmtech;


if(move_uploaded_file($_FILES['final_yr_marksheet_btech/mtech']['tmp_name'], $target_path_final_yr_marksheet_btechmtech)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
//File Upload For final_yr_marksheet_btech/mtech.

//File Upload For experience_letter.
$target_path_experience_letter = "./offer_mgnt_documents/experience_letter/";  
$target_path_experience_letter  = $target_path_experience_letter.basename($_FILES['experience_letter']['name']);   

//$_REQUEST["target_path_experience_letter"]=$target_path_experience_letter;

if(move_uploaded_file($_FILES['experience_letter']['tmp_name'], $target_path_experience_letter)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
//File Upload For experience_letter.

//File Upload For relieving_letter.
$target_path_relieving_letter  = "./offer_mgnt_documents/relieving_letter/";  
$target_path_relieving_letter  = $target_path_relieving_letter.basename($_FILES['relieving_letter']['name']);   

//$_REQUEST["target_path_relieving_letter"]=$target_path_relieving_letter;

if(move_uploaded_file($_FILES['relieving_letter']['tmp_name'], $target_path_relieving_letter)) 
{  
    echo "File uploaded successfully!";  
    //header("location:PFC.php?PageName=add_offer_salary_data&employee_name=".$employee_name."&designation=".$designation."&address=".$address."&country=".$country."&state=".$state."&city=".$city."&pincode=".$pincode."&uploadphotos=".$target_path_photo."&adharcard=".$target_path."&target_path_pancard=".$target_path_pancard."&pancard=".$target_path_pancard."&10th_marksheet=".$target_path_10th_marksheet."&12th_marksheet=".$target_path_12th_marksheet."&final_yrs_mark_sheet(Bca/Mca)=".$target_path_final_yrs_mark_sheetBca_Mca."&final_yr_marksheet_btech/mtech=".$target_path_final_yr_marksheet_btechmtech."&university_name=".$target_path_final_yr_marksheet_btechmtech."&upload_state_name=".$upload_state_name."&experience_letter=".$target_path_experience_letter."&work_experience=".$work_experience."&relieving_letter=".$relieving_letter."&joining_date=".$joining_date."&previous_last_company_name=".$previous_last_company_name);
} 
else
{  
    echo "Sorry, file not uploaded, please try again!";  
}  
header("location:PFC.php?PageName=add_offer_salary_data&employee_name=".$employee_name."&designation=".$designation."&address=".$address."&country=".$country."&state=".$state."&city=".$city."&pincode=".$pincode."&uploadphotos=".$target_path_photo."&adharcard=".$target_path."&target_path_pancard=".$target_path_pancard."&pancard=".$target_path_pancard."&10th_marksheet=".$target_path_10th_marksheet."&12th_marksheet=".$target_path_12th_marksheet."&final_yrs_mark_sheet(Bca/Mca)=".$target_path_final_yrs_mark_sheetBca_Mca."&final_yr_marksheet_btech/mtech=".$target_path_final_yr_marksheet_btechmtech."&university_name=".$university_name."&upload_state_name=".$upload_state_name."&experience_letter=".$target_path_experience_letter."&work_experience=".$work_experience."&relieving_letter=".$target_path_relieving_letter."&joining_date=".$joining_date."&previous_last_company_name=".$previous_last_company_name);
}
//File Upload For relieving_letter.

echo $sql_offer_one ="INSERT INTO `offer_letters_details`(`employee_name`)VALUES('".$employee_name."')";
$runsub = mysqli_query($conn,$sql_offer_one);

?>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Add Offer Successfully.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==2){
        ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Error !</span> Offer Not added Successfully.</strong>
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
                <div class="card-body">
                 <nav class="navbar navbar-light bg-light"> 
                 <h2 style="color:#012970;margin-left:454px;"><b>ADD EMPLOYEE OFFER LETTER</b></h2>
                   <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left: -29px;margin-top:0px;">+ ADD OFFER LETTER</button> -->
                    </nav><br><br>
                     <div class="modal-body">
                          <Form  action="#"  method="POST" enctype="multipart/form-data">
                              <div class="modal-header">
                                    <!-- <legend class="card-title"  id="myModalLabel" style="color:#012970;">ADD EMPLOYEE OFFER LETTER </legend> -->
                                  <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                              </div>
                                  <div class="modal-body">
                                      <div class="form-group">
                                        <div class="row">
                                        <div class="col-6">
                                            <label for="employee_name" class="col-form-label">Employee Name <span style="color: red">*</span></label>
                                            <input type="text" class="employee_name form-control" name="employee_name" id="employee_name"  required>
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
                                             <option value="<?php echo $row["desig_id"];?>"><?php echo $row["Designation"];?></option>
                                          <?php } ?>
                                              ?>
                                            </select>
                                            </div>
                                          </div><br><br>
                                          <div class="row">
                                            <div class="col-12">
                                            <label for="address" class="col-sm-2 col-form-label">Address<span style="color: red">*</span></label>
                                                  <input type="text" class="address form-control" name="address" id="address" required>
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
                                            <label for="emp_state_name" class="col-sm-2 col-form-label">State <span style="color: red">*</span></label>
                                            <select  name="emp_state_name" id="state" class="emp_state_name form-control">
                                            <option  value="NA">--SELECT STATE--</option>
                                          </select>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                           <div class="col-6">
                                            <label for="city" class="col-form-label">City <span style="color: red">*</span></label>
                                               <select  name="city" id="city" class="city form-control">
                                                <option value="NA">--SELECT CITY--</option>
                                               </select>
                                            </div>
                                              <div class="col-6">
                                                  <label for="pincode" class="col-sm-2 col-form-label">Pin Code <span style="color: red">*</span></label>
                                                  <input type="text" class="pincode form-control" name="pincode" id="pincode" required>
                                              </div>
                                            </div><br>

                                          <fieldset class="scheduler-border">
                                          <legend class="scheduler-border mt-2" style="color:#012970;">UPLOAD DOCUMENTS</legend>
                                          <div class="row">
                                            <div class="col-6">
                                            <label class="form-label" for="uploadphotos">Upload Photos <span style="color: red">*</span></label>
                                                <input type="file" class="form-control uploadphotos" id="uploadphotos"  name="uploadphotos" />
                                            </div>
                                            </div><br>
                                          <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="adharcard">Aadhar Card <span style="color: red">*</span></label>
                                                <input type="file" class="form-control adharcard" id="adharcard"  name="adharcard" />
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="pancard">Pan Card <span style="color: red">*</span></label>
                                                <input type="file" class="form-control pancard" id="pancard"  name="pancard" />
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="10th_marksheet">10th Mark Sheet <span style="color: red">*</span></label>
                                                <input type="file" class="form-control 10th_marksheet" id="10th_marksheet" name="10th_marksheet"  />
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="12th_marksheet">10+2 Mark Sheet <span style="color: red">*</span></label>
                                                <input type="file" class="form-control 12th_marksheet" id="12th_marksheet" name="12th_marksheet"  />
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="final_yrs_mark_sheet(Bca/Mca)">Final Year Mark Sheet (Bca or Mca any one) <span style="color: red">*</span></label>
                                                <input type="file" class="form-control final_yrs_mark_sheet(Bca/Mca)" id="final_yrs_mark_sheet(Bca/Mca)" name="final_yrs_mark_sheet(Bca/Mca)"/>
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="final_yr_marksheet_btech/mtech">Final Year Mark Sheet (B.tech or M.tech any one) <span style="color: red">*</span></label>
                                                <input type="file" class="form-control final_yr_marksheet_btech/mtech" id="final_yr_marksheet_btech/mtech" name="final_yr_marksheet_btech/mtech"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="university_name">University Name <span style="color: red">*</span></label>
                                                <input type="text" class="form-control university_name" name="university_name" id="university_name"  required/>
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="upload_state_name">State <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" id="upload_state_name" name="upload_state_name" required />
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="experience_letter">Last Company Experience Letter (If any) <span style="color: red">*</span></label>
                                                <input type="file" class="form-control experience_letter" id="experience_letter" name="experience_letter"/>
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="work_experience">Work Experience (In Months and Years) <span style="color: red">*</span></label>
                                                <input type="text" class="form-control work_experience" id="work_experience"  name="work_experience" value="0"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="relieving_letter">Previous / Last Company Relieving Letter (If any) <span style="color: red">*</span></label>
                                                <input type="file" class="form-control relieving_letter" id="relieving_letter"  name="relieving_letter" />
                                            </div>
                                            <div class="col-6">
                                              <label class="form-label" for="joining_date">Joining Date <span style="color: red">*</span></label>
                                                <input type="date" class="form-control joining_date" id="joining_date"  name="joining_date"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6">
                                              <label class="form-label" for="previous_last_company_name">Previous / Last Company Name <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" id="previous_last_company_name"  name="previous_last_company_name" required/>
                                            </div>
                                            </div><br>
                                          </fieldset>
                                        </div>
                                      </div><br>
                                      <div class="modal-footer">
                                      <!-- <button  class="btn btn-warning" id="nextButton"> <a href="PFC.php?PageName=add_offer_salary_data">Next Page</button></a>&nbsp; -->
                                      <input type="submit" name="saveempdetails" class="btn btn-primary add_empolyee" value="NEXT">
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
</main>

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