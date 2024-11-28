<?php
  //error_reporting(E_ALL);
  error_reporting(0);
  include 'connection.php';
  $ho_id=$_REQUEST["ho_id"];
  $gp_id=$_REQUEST["gp_id"];
  $site_type=$_REQUEST["site_type"];
   $HOID=EDV($ho_id,2);
   $GPID=EDV($gp_id,2);
   //$SITE_TYPE=EDV($site_type,2);
 //echo $sql="SELECT `hs`.*,`E_GP`.`gp_id`,`E_GP`.`type_of_site`,`E_GP`.`Id` FROM `earthing_gp` `E_GP` left join `ho_site` `hs` ON `E_GP`.`ho_site_id`=`hs`.`ho_site_id` WHERE `hs`.`ho_site_id`='$ho_id'";
 //echo $SQL="SELECT * FROM `earthing_gp` `E_GP` left join `ho_site` `hs` ON `E_GP`.`ho_site_id`=`hs`.`ho_site_id` left join `type_of_site` `TOS` ON `TOS`.`Id`=`hs`.`Type` left join `gp_site` `gpst` ON `E_GP`.`gp_id` = `gpst`.`gp_id` WHERE `hs`.`ho_site_id`='$ho_id' OR `gpst`.`gp_id`='$gp_id'";
  if(!empty($ho_id))
  {
    $fetch = mysqli_query($conn, "SELECT * FROM `earthing_gp` `E_GP` left join `ho_site` `hs` ON `E_GP`.`ho_site_id`=`hs`.`ho_site_id` left join `type_of_site` `TOS` ON `TOS`.`Id`=`hs`.`Type` WHERE `hs`.`ho_site_id`='$HOID'");  
  }
  if(!empty($gp_id))
  {
    //echo $sql="SELECT * FROM `earthing_gp` `E_GP` left join `gp_site` `gpst` ON `E_GP`.`gp_id` = `gpst`.`gp_id` left join `type_of_site` `TOS` ON `TOS`.`Id`=`gpst`.`Type` WHERE `gpst`.`gp_id`='$gp_id'";
    $fetch = mysqli_query($conn, "SELECT * FROM `earthing_gp` `E_GP` left join `gp_site` `gpst` ON `E_GP`.`gp_id` = `gpst`.`gp_id` left join `type_of_site` `TOS` ON `TOS`.`Id`=`gpst`.`Type` WHERE `gpst`.`gp_id`='$GPID'");
  }
  // $fetch = mysqli_query($conn, "SELECT * FROM `earthing_gp` `E_GP` left join `ho_site` `hs` ON `E_GP`.`ho_site_id`=`hs`.`ho_site_id` left join `type_of_site` `TOS` ON `TOS`.`Id`=`hs`.`Type` left join `gp_site` `gpst` ON `E_GP`.`gp_id` = `gpst`.`gp_id` WHERE `hs`.`ho_site_id`='$ho_id' OR `gpst`.`gp_id`='$gp_id'");
  $row_ho   = mysqli_fetch_array($fetch);
  //$row_ho   = mysqli_fetch_array($fetch);
?>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" id="success" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Data Saved.</strong>
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
    <div class="alert alert-success alert-dismissible fade show" id="notsuccess" role="alert">
      <strong><i class="bi bi-check"></i> Error !</span>Data Not Saved.</strong>
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
                    <a class="btn btn-warning text-black" href="PFC.php?PageName=view_earthing_gp" style="margin:7px;font-size:large;height:37px;padding:6px;width:100px;margin-left: 20px;" role="button">Back</a>
                    <div class="pagetitle">
                    <h2 class="card-title" style="color:#012970;margin-right:698px;"><b>VIEW EARTHING SITE DETAILS</b></h2>
                    </div> 
                 </nav><br><br>
                 
                  <Form method="POST">    
                      <input type="hidden" name="roleid"   id="roleid"   value="<?php echo $_SESSION["role_Id"];?>"/>
                      <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                      <div class="col-12">
                                <label for="text" class="form-label">Type of Site</label>
                                <select  class="typeofsite form-control"  name="typeofsite" id="typeofsite" onchange="type_of_site_val()" disabled>
                                  <option value="NA">----SELECT SITE----</option>
                                  <?php
                                  $sql_gp="SELECT `Id`, `type_of_site` FROM `type_of_site`";
                                  $result = mysqli_query($conn,$sql_gp);
                                  while( $row = mysqli_fetch_array($result))
                                  {
                                ?>
                                <option value="<?php echo $row["Id"];?>" <?php if($row_ho["Type"]==$row["Id"]){ echo 'selected'; }?>><?php echo $row["type_of_site"];?></option>
                             <?php } ?>
                                </select>
                            </div>
                      </div>                     
                        <!-- <div class="row">
                            <div class="col"> 
                            <br><br> 
                          <label for="doneby" class="form-label">Done by<span class="error">* <?php //echo $countryErr;?></span></label><br>
                            <select id="doneby" name="doneby"  id="doneby" class="doneby form-control" > 
                            <option value="NA">--SELECT--</option>
                            <option value="doneby">Done By</option>
                            </select>
                            </div>
                        </div>  -->
                    <br>   
                         <div class="modal-footer">
                          <div class="row mb-3">
                          <div class="col-sm-3">
                         
                          </div>
                          </div>
                          <br><br> 
                          <br><br> 
                          <!-- <input type="submit" name="save" id="save" class="btn btn-primary earthing_gp" value="Submit">  -->
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
  <!----HO-SITE----->
<div id="ho" style="width:1513px;margin-left:346px;display:none;">
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
           <div class="pagetitle"></div>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
                <div class="card-body">
                 <h5 class="card-title"><u>VIEW HO-SITE DETAILS:-</u></h5>
                  <Form method="POST">    
                      <input type="hidden" name="roleid"   id="roleid"   value="<?php echo $_SESSION["role_Id"];?>"/>
                      <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>

                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">HO ID:</label>
                          <input type="text" class="HOid form-control" name="HOid" id="HOid" VALUE="<?php echo $row_ho["HO_id"];?>" readonly>
                          <input type="hidden" name="type_of_siteHO"  id="type_of_siteHO">
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">District Name</label>
                          <input type="text" class="DistrictName form-control" name="DistrictName" id="DistrictName" VALUE="<?php echo $row_ho["district_name"];?>" readonly>
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                            <div class="col-4">
                                <label for="email" class="form-label">Block Name</label>
                                <input type="text" class="BlockName form-control" name="BlockName" id="BlockName" VALUE="<?php echo $row_ho["block_name"];?>" readonly>
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">Department Name</span></label>
                                <input type="text" class="DepartmentName form-control" name="DepartmentName" id="DepartmentName" VALUE="<?php echo $row_ho["department_name"];?>" readonly>
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">HO Office Name/ Address</label>
                                <input type="text"  class="HOOfficeNameAddress form-control"  name="HOOfficeNameAddress" id="HOOfficeNameAddress" VALUE="<?php echo $row_ho["HO_Officename_address"];?>" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="desigantion" class="form-label">DHQ/BHQ</span> </label>
                            <input type="text"  class="DHQBHQ form-control"  name="DHQBHQ" id="DHQBHQ" VALUE="<?php echo $row_ho["DHQ/BHQ"];?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="department" class="form-label">Connectivity Type</span> </label>
                              <input type="text" class="ConnectivityType form-control" name="ConnectivityType" id="ConnectivityType" VALUE="<?php echo $row_ho["connectivity_type"];?>" readonly>
                           </div>
                           <div class="col-4">
                            <label for="text" class="form-label">Bandwidth</label>
                            <input type="text" class="Bandwidth form-control" name="Bandwidth" id="Bandwidth" VALUE="<?php echo $row_ho["Bandwidth"];?>" readonly>
                        </div>
                        </div><br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="Status" class="form-label">Status</span> </label>
                            <select  class="Status form-control"  name="Status" id="Status" VALUE="<?php echo $row_ho["Bandwidth"];?>" disabled>
                                <option value="NA">--SELECT STATUS--</option>
                                <?php if(($_REQUEST['ho_id']!='')){?>
                                <option value="<?php if($row_ho['status']=="DEACTIVE"){ echo $row_ho['status']; } else {echo "DE-ACTIVE"; }?>"selected><?php if($row_ho['status']=="DEACTIVE"){ echo $row_ho['status']; } else {echo "DE-ACTIVE"; }?></option>
                                <option value="<?php if($row_ho['status']=="ACTIVE"){ echo $row_ho['status']; } else {echo "ACTIVE"; }?>"selected><?php if($row_ho['status']=="ACTIVE"){ echo $row_ho['status']; } else {echo "ACTIVE"; }?></option>
                                <?php } else {?>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="DEACTIVE">DE-ACTIVE</option>
                                <?php }?>
                          </select>
                          </select>
                        </div>
                        </div>
                         <div class="modal-footer">
                          <div class="row mb-3">
                          <div class="col-sm-3">
                         
                          </div>
                          </div>
                          <br><br> 
                          <br><br> 
                          <!-- <input type="submit" name="HOsave" id="HOsave" class="btn btn-primary HOsave" value="Submit">  -->
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
</div>
<!----HO-SITE----->

<!----GP-SITE----->
<div id="gp" style="width:1513px;margin-left:346px;">
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
           <div class="pagetitle"></div>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
                <div class="card-body">
                 <h5 class="card-title"><u>VIEW GP-SITE DETAILS:-</u></h5>
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
                          <label for="UniqueCode" class="form-label">Unique Code:</label>
                          <input type="text" class="UniqueCode form-control" name="UniqueCode" id="UniqueCode" value="<?php echo $row_ho["UniqueCode"];?>" readonly>
                          <input type="hidden" name="type_of_siteGP" id="type_of_siteGP">

                        </div>

                        <div class="col-6">
                          <label for="GoLive" class="form-label">Go-Live</label>
                          <input type="text" class="GoLive form-control" name="GoLive" id="GoLive" VALUE="<?php echo $row_ho["Go-Live"];?>" readonly>
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                            <div class="col-4">
                                <label for="GPCode" class="form-label">GP Code</label>
                                <input type="text" class="GPCode form-control" name="GPCode" id="GPCode" VALUE="<?php echo $row_ho["GPCode"];?>" readonly>
                            </div>
                            <div class="col-4">
                                <label for="GPLGDCode" class="form-label">GP LGD Code</span></label>
                                <input type="text" class="GPLGDCode form-control" name="GPLGDCode" id="GPLGDCode" VALUE="<?php echo $row_ho["GPLGDCode"];?>" readonly>
                            </div>
                            <div class="col-4">
                                <label for="GPID" class="form-label">GP ID</label>
                                <input type="text"  class="GPID form-control"  name="GPID" id="GPID" VALUE="<?php echo $row_ho["GPID"];?>" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="TypeOfSite" class="form-label">Type Of Site</span></label>
                            <input type="text"  class="TypeOfSite form-control"  name="TypeOfSite" id="TypeOfSite" VALUE="<?php echo $row_ho["TypeOfSite"];?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="Zone" class="form-label">Zone</span> </label>
                              <input type="text" class="Zone form-control" name="Zone" id="Zone" VALUE="<?php echo $row_ho["Zone"];?>" readonly>
                           </div>
                           <div class="col-4">
                            <label for="District" class="form-label">District</label>
                            <input type="text" class="District form-control" name="District" id="District" VALUE="<?php echo $row_ho["District"];?>" readonly>
                        </div>
                        </div><br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="PS" class="form-label">PS</span> </label>
                            <input type="text"  class="PS form-control"  name="PS" id="PS" VALUE="<?php echo $row_ho["PS"];?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="NewPSName" class="form-label">New PS Name</span> </label>
                              <input type="text" class="NewPSName form-control" name="NewPSName" id="NewPSName" VALUE="<?php echo $row_ho["NewPSName"];?>" readonly>
                           </div>
                           <div class="col-4">
                            <label for="GP" class="form-label">GP</label>
                            <input type="text" class="GP form-control" name="GP" id="GP" VALUE="<?php echo $row_ho["GP"];?>" readonly>
                        </div>
</div><br/><br/>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="TypeOfConnectivity" class="form-label">Type Of Connectivity</span> </label>
                            <input type="text"  class="TypeOfConnectivity form-control"  name="TypeOfConnectivity" id="TypeOfConnectivity" VALUE="<?php echo $row_ho["TypeOfConnectivity"];?>" readonly>
                        </div>
                          <div class="col-4">
                            <label for="Status" class="form-label">Status</span> </label>
                            <select  class="Status form-control"  name="Status" id="Status" required="true" disabled>
                                <option value="NA">--SELECT STATUS--</option>
                                <?php if(($_REQUEST['gp_id']!='')){?>
                                <option value="<?php if($row_ho['status']=="DEACTIVE"){ echo $row_ho['status']; } else {echo "DE-ACTIVE"; }?>"selected><?php if($row_ho['status']=="DEACTIVE"){ echo $row_ho['status']; } else {echo "DE-ACTIVE"; }?></option>
                                <option value="<?php if($row_ho['status']=="ACTIVE"){ echo $row_ho['status']; } else {echo "ACTIVE"; }?>"selected><?php if($row_ho['status']=="ACTIVE"){ echo $row_ho['status']; } else {echo "ACTIVE"; }?></option>
                                <?php } else {?>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="DEACTIVE">DE-ACTIVE</option>
                                <?php }?>
                          </select>
                        </div>
                        </div>
                         <div class="modal-footer">
                          <div class="row mb-3">
                          <div class="col-sm-3">
                         
                          </div>
                          </div>
                          <br><br> 
                          <br><br> 
                          <!-- <input type="submit" name="saveGP" id="saveGP" class="btn btn-primary saveGP" value="Submit">  -->
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
</div>
<!----GP-SITE----->
</div>
</section>

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


<script type="text/javascript">
  function type_of_site_val()
  {
    var types_site=document.getElementById("typeofsite").value;
    if(types_site=='GP')
    {
      console.log(document.getElementById("type_of_siteGP").value=types_site);
    }
    // if(types_site=='HO')
    else
    {
      console.log(document.getElementById("type_of_siteHO").value=types_site);
    }

  }

</script>


<script>
$(document).ready(function(){
  $("#ho").hide();
  $("#gp").hide();

//   $("#typeofsite").change(function(){
    if($("#typeofsite").val()=='2')
    {
      $("#ho").show();
      $("#gp").hide();
    }
    if($("#typeofsite").val()=='1')
    {
      $("#ho").hide();
      $("#gp").show();
    }
    if($("#typeofsite").val()=='NA')
    {
      $("#ho").hide();
      $("#gp").hide();
    }
  });
// });
</script>
  <!-- ======= End Footer ======= -->
