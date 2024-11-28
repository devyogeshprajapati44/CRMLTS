<?php
//error_reporting(0);
include 'connection.php';
$ID=$_REQUEST["ID"];

//$sql_Details="SELECT `Id`, `employee_name` FROM `offer_letters_details` WHERE `Id` = '$ID'";
$sql_Details="SELECT `offerl`.*,`desig`.`Designation`,`cut`.`country_name`,`stat`.`state_name`,`citi`.`city_name` FROM `offer_letters_details` `offerl` left join `designation` `desig` ON `offerl`.`desig_id`=`desig`.`desig_id` left join `countries` `cut` ON `offerl`.`country`=`cut`.`country_id` left join `states` `stat` ON `offerl`.`emp_state_name`=`stat`.`state_id`  left join `cities` `citi` ON `offerl`.`city`=`citi`.`city_id` WHERE `offerl`.`Id`='$ID'";
$result_details = mysqli_query($conn,$sql_Details);
$row_details = $result_details->fetch_assoc();
$Employee_name=$row_details["employee_name"];
?>
<style>
.nowrap {
 white-space: nowrap;
}
.rotate-container {
            display: inline-block;
            position: relative;
        }

        .rotate-image {
            width: 100px;
            height: 100px;
            transition: transform 0.3s ease;
        }

        .rotate-button {
            position: absolute;
            top: 0;
            right: 0;
            background: #fff;
            padding: 5px;
            cursor: pointer;
        }
</style>
  <main id="main" class="main">
         <!-- Start dashboard inner -->

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
                <h2 style="color:#012970;margin-right:454px;"><b>VIEW EMPLOYEE OFFER LETTER DETAILS</b></h2>
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
                                          <legend class="scheduler-border mt-2" style="color:#012970;">VIEW DOCUMENTS</legend>

                                         
                                          <div class="row">
                                              <div class="col-6">
                                                  <label class="form-label" for="uploadphotos">Emp Photos <span style="color: red">*</span>
                                                      <a  href="<?php echo $row_details["uploadphotos"]; ?>" target="_blank">
                                                          <?php echo $row_details["employee_name"] . ' Emp Photos'; ?>
                                                      </a>
                                                  </label>
                                                  <a href="<?php echo $row_details["uploadphotos"]; ?>" target="_blank" id="openImageModal">
                                                      <img src="<?php if($row_details["uploadphotos"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["uploadphotos"]; } ?>"  height="100px" width="100px" style="margin-left:-135px;margin-top:135px;border:1px solid blue;"/>
                                                  </a>
                                              </div>
                                          </div><br><br>

                                              <div class="row">
                                                  <div class="col-6" style="margin-top:-129px;">
                                                      <label class="form-label" for="adharcard">Aadhar Card <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["adharcard"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . 'Adhaar Card'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["adharcard"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["adharcard"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["adharcard"]; } ?>" height="100px" width="100px" style="margin-left:-131px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
                                                  </div>
                                                  <div class="col-6" style="margin-top:-129px;">
                                                      <label class="form-label" for="pancard">Pan Card <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["pancard"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . 'Pan Card'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["pancard"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["pancard"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["pancard"]; } ?>" height="100px" width="100px" style="margin-left:-105px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
                                                  </div>
                                              </div><br><br>
                                              <div class="row">
                                                  <div class="col-6" style="margin-top:-129px;">
                                                      <label class="form-label" for="10th_marksheet">10th Mark Sheet  <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["10th_marksheet"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . '10th Marksheet'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["10th_marksheet"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["10th_marksheet"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["10th_marksheet"]; } ?>" height="100px" width="100px" style="margin-left:-161px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
                                                  </div>
                                                  <div class="col-6" style="margin-top:-129px;">
                                                      <label class="form-label" for="12th_marksheet">12th Mark Sheet <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["12th_marksheet"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . '12th Marksheet'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["12th_marksheet"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["12th_marksheet"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["12th_marksheet"]; } ?>" height="100px" width="100px" style="margin-left:-161px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
                                                  </div>
                                              </div><br><br>

                                              <div class="row">
                                                  <div class="col-6" style="margin-top:-129px;">
                                                      <label class="form-label" for="final_yrs_mark_sheet(Bca/Mca)">Final Year Mark Sheet (Bca or Mca any one) <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["final_yrs_mark_sheet(Bca/Mca)"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . 'Bca/Mca Marksheet'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["final_yrs_mark_sheet(Bca/Mca)"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["final_yrs_mark_sheet(Bca/Mca)"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["final_yrs_mark_sheet(Bca/Mca)"]; } ?>" height="100px" width="100px" style="margin-left:-341px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
                                                  </div>
                                                  <div class="col-6" style="margin-top:-129px;">
                                                      <label class="form-label" for="final_yr_marksheet_btech/mtech">Final Year Mark Sheet (B.tech or M.tech any one)  <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["final_yr_marksheet_btech/mtech"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . 'B.Tech/M.Tech Marksheet'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["final_yr_marksheet_btech/mtech"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["final_yr_marksheet_btech/mtech"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["final_yr_marksheet_btech/mtech"]; } ?>" height="100px" width="100px" style="margin-left:-387px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
                                                  </div>
                                              </div><br><br>
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
                                            <div class="col-6" style="margin-top:-108px;">
                                                      <label class="form-label" for="experience_letter">Last Company Experience Letter (If any)  <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["experience_letter"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . 'Experience Letter'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["experience_letter"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["experience_letter"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["experience_letter"]; } ?>" height="100px" width="100px" style="margin-left:-328px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
                                                  </div>
                                            <div class="col-6">
                                              <label class="form-label" for="work_experience">Work Experience (In Months and Years) <span style="color: red">*</span></label>
                                                <input type="text" class="form-control work_experience" id="work_experience"  name="work_experience" value="<?php echo $row_details["work_experience"];?>"/>
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col-6" style="margin-top:-108px;">
                                                      <label class="form-label" for="relieving_letter">Previous / Last Company Relieving Letter (If any) <span style="color: red">*</span>
                                                          <a href="<?php echo $row_details["relieving_letter"]; ?>" target="_blank">
                                                              <?php echo $row_details["employee_name"] . 'Relieving Retter'; ?>
                                                          </a>
                                                      </label>
                                                      <a href="<?php echo $row_details["relieving_letter"]; ?>" target="_blank">
                                                          <img src="<?php if($row_details["relieving_letter"] == '') { echo 'assets/img/no-image-available-icon.jpg'; } else { echo $row_details["relieving_letter"]; } ?>" height="100px" width="100px" style="margin-left:-368px;margin-top:135px;border:1px solid blue;"/>
                                                      </a>
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
                                              <input type="text" class="form-control monthly_ctc" id="monthly_ctc"  name="monthly_ctc"  value="<?php echo $row_details["monthly_ctc"];?>" />
                                            </div>
                                            </div><br>
                                           </fieldset>
                                         </div>
                                        </div><br>
                                        <!-- <input type="submit"   name="updateempdetails" class="btn btn-primary add_empolyee" value="Submit"> -->
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

  <script>
        function rotateImage(imageId, degree) {
            const image = document.getElementById(imageId);
            image.style.transform = `rotate(${degree}deg)`;
        }
    </script>

