      <div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
               <form action='' method="POST"  id="editForm">     
                <!-- <input type="hidden" id="id" name="id"/> -->
                <input type="hidden" id="dept_id" name="dept_id"/>
                     <div class="modal-header">						
                        <h4 class="modal-title"  id="EditModal">Edit Employee Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">			
                     <div class="form-group">    
                     <div class="col ms-1 me-2 mt-3">              
                        <div class="row g-3">
                        <div class="col-4">
                                <label for="emp_name" class="form-label">Employee Name <span style="color: red">*</span></label>
                                <input type="text" class="name form-control" name="name" id="name1">
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">Phone Number <span style="color: red">*</span></label>
                                <input type="text"  class="phone form-control"   id="phone1" maxlength="10" name="phone">
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">Alternate Phone No <span style="color: red">*</span></label>
                                <input type="text"  class="alernate_number form-control"  id="alernate_number1"  maxlength="10" name="alernate_number">
                            </div>
                        </div>
                      <br>
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                <input type="text" class="father_name form-control"  id="father_name1" name="father_name">
                            </div>
                            <div class="col-6">
                                <label for="text" class="form-label">Father Phone No <span style="color: red">*</span></label>
                                    <input type="text" class="father_mobile form-control" name="father_mobile" id="father_mobile1" maxlength="10" placeholder="Enter Father Phone No">
                            </div>
                        </div>
                      <br>
                        <div class="row">
                            <div class="col">
                                <label for="text" class="form-label">Current Address <span style="color: red">*</span></label>
                                <input type="text" class="current_address form-control" name="current_address" id="current_address1">
                            </div>
                        </div> 
                        <br>
                        <div class="row g-3">
                            <div class="col-6 mt-3"> 
                                <label for="country" class="form-label">Country <span style="color: red">*</span></label><br>
                                <select id="country" name="country1"  class="country form-control" >
                                <option value="NA">--Select Country--</option>
                                <?php      
                                  include 'connection.php';
                                  $sql = "select * from `countries` order by country_id desc";
                                  $result = $conn->query($sql);

                                  if ($result->num_rows > 0) 
                                  {
                                    $sno=1;
                                  while($row = $result->fetch_assoc()) 
                                    {
                                      $optionv=$_POST['countryval'];
                                      $countryname=$row['country_name'];
                                      foreach($row as $pr)
                                      {
                                        $region = $pr->region;
                                      if($row['country_id']==$optionv)
                                      {
                                      ?>
                                        <option value="<?php if($optionv==$row['country_id'])?>" selected="selected"><?php echo $row['country_name'];?></option>
                                      <?php
        
                                      } 
                                      else 
                                      {
                                      ?>
                                    <option value="<?php echo $row['country_id'];?>"><?php echo $row['country_name'];?></option>
                                  <?php 
                                      }}
                                    }
                                  }
                                 ?> 
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="inputState" class="form-label">State <span style="color: red">*</span></label>
                                <select  name="region1" id="region" class="region form-control">
                                  <option value="NA">--Select Region--</option>
                                
                              </select>
                            </div>
                        </div>
                    <br>
                    
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="inputCity" class="form-label">City <span style="color: red">*</span></label>
                                <select  name="city1" id="city" class="city form-control">
                                  <option value="NA">--Select City--</option>
                              </select>
                            </div>
                            <div class="col-6">
                                <label for="pincode" class="form-label">Pincode <span style="color: red">*</span></label>
                                <input type="Pincode" class="form-control" id="Pincode" name="editPincode" maxlength="6" placeholder="Enter Pincode">
                            </div>
                        </div>
                     <br>                                                
                        <div class="row">
                            <div class="col-6">
                                <label for="text"   class="form-label">Permanent Address <span style="color: red">*</span></label>
                                <input type="text"  class="permanent_address form-control"  name="permanent_address"  id="permanent_address1">
                            </div>
                            <!-- <div class="col-6">
                                <label for="pincode" class="form-label">Pincode <span style="color: red">*</span></label>
                                <input type="pin_code"   maxlength="6" class="pin_code form-control" id="pin_code1"  name="pin_code"> 
                            </div> -->
                        </div>   
                    <br>    
                    <input type="hidden" name="desigval"id="desigval">
                    <input type="hidden" name="desigid"id="desgid" value="<?php echo $_SESSION["desig_id"];?>">
                        <div class="row g-3">
                            <div class="col-4">
                                <label for="desigantion" class="form-label">Designation <span style="color: red">*</span></label>
                                <select name="desigantion" class="desigantion   form-control"  id="desigantion" data-live-search="true"  data-size="8" tabindex="null">
                                <option value="NA">SELECT</option>
                                <?php       
                                  include 'connection.php'; 
                                  $sql = "SELECT * FROM `designation` order by `desig_id` desc";
                                  $result = $conn->query($sql);

                                  if ($result->num_rows > 0) 
                                  {
                                    $sno=1;
                                  while($row = $result->fetch_assoc()) 
                                    {
                                      $optionval=$row['Designation'];
                                      if(!empty($_POST["desigval"]) && $_POST["desigval"]==$optionval)
                                      {
                                      ?>
                                      <option value="<?php echo $optionval;?>" selected><?php echo $optionval;?></option>
                                      <?php
                                      } else {
                                      ?>
                                    <option value="<?php echo $row['Designation'];?>"><?php echo $row['Designation'];?></option>
                                  <?php 
                                      }
                                    }
                                  }
                                 ?>
                                </select>
                            </div>
                            <input type="hidden" name="departval" id="departval">
                            <input type="hidden" name="genderval" id="genderval">
                            <input type="hidden" name="statusval" id="statusval">
                            <input type="hidden" name="countryval" id="countryval">

                            <div class="col-4">
                                <label for="select" class="form-label">Department <span style="color: red">*</span> </label>
                                <select name="department" class="department form-control"  id="department" data-live-search="true"  data-size="8" tabindex="null">
                                <option value="NA">SELECT</option>
                                <?php       
                                  include 'connection.php'; 
                                  $sql = "SELECT * FROM `department` order by `dept_id` desc";
                                  //$sql = "SELECT `us`.*,`desig`.* FROM `user` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id` = `desig`.`desig_id` where `us`.`emp_id`='".$_POST["dept_id"]."'";
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) 
                                  {
                                    $sno=1;
                                  while($row = $result->fetch_assoc()) 
                                    {
                                      $optionvalue=$row['department'];
                                      //$optionid=$row['desig_id'];
                                      if(!empty($_POST["departval"]) && $_POST["departval"]==strtoupper($optionvalue) || $_POST["departval"]==strtolower($optionvalue))
                                      {
                                      ?>
                                      <option value="<?php echo $optionvalue;?>" selected><?php echo $optionvalue;?></option>
                                      <?php
                                      } else {
                                      ?>
                                    <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?></option>
                                  <?php 
                                      }
                                    }
                                  }
                                 ?>
                                </select>
                            </div>      
                            <div class="col-4">
                                <label for="text" class="form-label">Gender <span style="color: red">*</span> </label>
                                <select name="gender" class="gender  form-control select_type" id="gender1" >
                                  <option value="NA">select</option>
                                  <?php 
                                  $option_gender=$_POST["genderval"];
                                  $genderr=$_POST["gender"];
                                  if(!empty($option_gender) && $option_gender==$genderr) { ?>
                                      <option value="<?php echo $option_gender;?>" selected><?php echo $option_gender;?></option>
                                  <?php } else { ?>
                                    <option value="MALE">Male</option>
                                  <option value="FEMALE">Female</option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                    <br>
                        <div class="row g-3">
                            <div class="col">
                                <label for="text" class="form-label">Joining Date</label>
                                <input type="date"  class="joining_date form-control"  id="joining_date1" name="joining_date">
                            </div>
                        <div class="col">  
                            <label for="">Status *</label>
                                <select name="status" class="status  form-control " id="status1">
                                <?php 
                                  $option_status=$_POST["statusval"];
                                  $option_stat=$_POST["status"];
                                  if(!empty($option_status) && $option_status==$option_stat) { ?>
                                      <option value="<?php echo $option_status;?>" selected><?php echo $option_status;?></option>
                                  <?php } else { ?>
                                    <option value="1">ACTIVE</option>
                                    <option value="2">DEACTIVE</option>
                                         <?php } ?>
                               </select>
                         </div>
                     </div>
                    <br>
                                       
<!--Bank Details Start-->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border mt-2">Banking Details</legend>
                    <div class="row">
                        <div class="col mt-3">
                            <div class="row g-3">
                                <div class=" col-6 ">
                                    <label for="text" class="form-label">Account Holder Name <span style="color: red">*</span></label>
                                    <input type="text" class="beneficiary_name form-control" name="beneficiary_name" id="beneficiary_name1">
                                </div>
                                <div class=" col-6 ">
                                    <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                    <input type="text" class="account_number form-control" name="account_number" id="account_number1">
                                </div>
                            </div><br>
                            <div class="row g-3">
                                <div class=" col-4 ">
                                    <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                    <input type="bank_name" class="bank_name form-control" name="bank_name"  id="bank_name1">
                                </div>
                                <div class=" col-4 ">
                                    <label for="text" class="form-label">Branch Name <span style="color: red">*</span></label>
                                    <input type="text" class="branch_name form-control" name="branch_name" id="branch_name1">
                                </div>
                                <div class=" col-4 ">
                                    <label for="text" class="form-label">IFSC Code <span style="color: red">*</span></label>
                                    <input type="ifsc_code" class="ifsc_code form-control" name="ifsc_code"  id="ifsc_code1">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div><br>

            <fieldset class="row mb-3">
                    <label for="text" class="form-label">Forgot Password</label><br>
                      <div class="col-sm-10">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gridRadios11" id="gridRadios1" value="Yes">
                            <label class="form-check-label" for="gridRadios1"> Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gridRadios11" id="gridRadios2" value="No" checked>
                              <label class="form-check-label" for="gridRadios2"> No</label>
                            </div>
                        </div>
                            </fieldset>

                            <div class="userlogin">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">UserName</label>
                                <div class="col-sm-3">
                   
                                <input type="text" name="username1" id="username11"  class="form-control">

                                </div>
                            </div>
<!--password start here-->
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-3">
                                <input type="password" name="password1" id="password1" class="form-control">
                                    </div>
                                    </div>
                                    </div>
                                    <!--password close here-->
                                    <!--Role-->
                                   
 <!--dfd-->
                    </div>       
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <input type="submit" value="Update"  class="btn btn-primary alert-link" name="update">
                            </div>
                         </form>
                        </div>
                     </div>
                  </div>
                  </div>