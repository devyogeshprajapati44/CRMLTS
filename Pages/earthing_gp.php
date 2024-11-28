<?php
  error_reporting(E_ALL);
  error_reporting(0);
  include 'connection.php';

//Ho Site.
if (isset($_POST['HOsave'])) 
{
  $ho_code=CF($_POST["HOid"],$conn);
  $DistrictName=CF($_POST["DistrictName"],$conn);
  $BlockName=CF($_POST["BlockName"],$conn);
  //$doneby=CF($_POST["doneby"],$conn);
  $DepartmentName=CF($_POST["DepartmentName"],$conn);
  $HOOfficeNameAddress=CF($_POST["HOOfficeNameAddress"],$conn);
  $DHQBHQ=CF($_POST["DHQBHQ"],$conn);
  $ConnectivityType=CF($_POST["ConnectivityType"],$conn);
  $Bandwidth=CF($_POST["Bandwidth"],$conn);
  $Status=CF($_POST["Status"],$conn);

  //Type of Site FOR HO.
    $type_of_site_HO=CF($_POST["type_of_siteHO"],$conn);
  //Type of Site FOR HO.

  // $qry_Adv = "INSERT INTO `earthing_gp`(`earthing_gp_code_id`, `name`, `date`, `concern_person_mobile_no`, `site_in_charge`, `report_status`, `done_by`) 
  // VALUES ('".$unique_code."','".$name."','".$date."','".$concernperson_mobiles."','".$site_incharge."','".$report_status."','".$doneby."')";
  echo $qry_Adv = "INSERT INTO `ho_site`(`HO_id`, `district_name`, `block_name`, `department_name`, `HO_Officename_address`, `DHQ/BHQ`, `connectivity_type`, `Bandwidth`,`status`) 
  VALUES ('$ho_code','$DistrictName','$BlockName','$DepartmentName','$HOOfficeNameAddress','$DHQBHQ','$ConnectivityType','$Bandwidth','$Status')";
//   echo $qry_Adv;
//   die;
//die;
$run_Sub = mysqli_query($conn, $qry_Adv);
$lastInsertedID = mysqli_insert_id($conn);
//Inserting Type of Site and ID of HO site.
echo $qry_site = "INSERT INTO `earthing_gp`(`ho_site_id`,`type_of_site`) VALUES ('$lastInsertedID','".$type_of_site_HO."')";
$run_n = mysqli_query($conn,$qry_site);
//Inserting Type of Site and ID of HO site.
    if($run_Sub > '0')
    {
      //$message="Record Save successfully";
      header("location:PFC.php?PageName=earthing_gp&Mgs=1");
    }

    else
    {
      //$message="Record Not Save.";
      header("location:PFC.php?PageName=earthing_gp&Mgs=2");
    }
}
//Ho Site.

//GP Site.
if (isset($_POST['saveGP'])) 
{
  $UniqueCode=CF($_POST["UniqueCode"],$conn);
  $GoLive=CF($_POST["GoLive"],$conn);
  $GPCode=CF($_POST["GPCode"],$conn);
  $GPLGDCode=CF($_POST["GPLGDCode"],$conn);
  $GPID=CF($_POST["GPID"],$conn);
  $TypeOfSite=CF($_POST["TypeOfSite"],$conn);
  $Zone=CF($_POST["Zone"],$conn);
  $District=CF($_POST["District"],$conn);
  $PS=CF($_POST["PS"],$conn);
  $NewPSName=CF($_POST["NewPSName"],$conn);
  $GP=CF($_POST["GP"],$conn);
  $TypeOfConnectivity=CF($_POST["TypeOfConnectivity"],$conn);
  $Status=CF($_POST["Status"],$conn);

  //Type of Site FOR GP.
  $type_of_site_GP=CF($_POST["type_of_siteGP"],$conn);
  //Type of Site FOR GP.

  
  // $qry_Adv = "INSERT INTO `earthing_gp`(`earthing_gp_code_id`, `name`, `date`, `concern_person_mobile_no`, `site_in_charge`, `report_status`, `done_by`) 
  // VALUES ('".$unique_code."','".$name."','".$date."','".$concernperson_mobiles."','".$site_incharge."','".$report_status."','".$doneby."')";
  echo $qry_Adv = "INSERT INTO `gp_site`(`UniqueCode`, `Go-Live`, `GPCode`, `GPLGDCode`, `GPID`, `TypeOfSite`, `Zone`, `District`, `PS`, `NewPSName`, `GP`, `TypeOfConnectivity`, `status`) 
  VALUES ('$UniqueCode','$GoLive','$GPCode','$GPLGDCode','$GPID','$TypeOfSite','$Zone','$District','$PS','$NewPSName','$GP','$TypeOfConnectivity','$Status')";
  // echo $qry_Adv;
  // die;
    $run_Sub = mysqli_query($conn, $qry_Adv);
    $lastInsertedID_GP = mysqli_insert_id($conn);
    
//Inserting Type of Site and ID of GP site.
  echo $qry_siteS = "INSERT INTO `earthing_gp`(`gp_id`,`type_of_site`) VALUES ('$lastInsertedID_GP','".$type_of_site_GP."')";
  $run_n_n = mysqli_query($conn,$qry_siteS);
//Inserting Type of Site and ID of GP site.

    if($run_Sub > '0')
    {
      header("location:PFC.php?PageName=earthing_gp&Mgs=1");
    }

    else
    {
      header("location:PFC.php?PageName=earthing_gp&Mgs=2");
    }
}
//GP Site.
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
                <h2 class="card-title" style="color:#012970;margin-left:534px;"><b>ADD EARTHING DETAILS</b></h2>
                 </nav><br><br>
                  <Form method="POST">    
                      <input type="hidden" name="roleid"   id="roleid"   value="<?php echo $_SESSION["role_Id"];?>"/>
                      <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                      <div class="col-12">
                      <label for="text" class="form-label"  style="color:#012970;"><b>Type of Site</b></label>
                                <select  class="typeofsite form-control"  name="typeofsite" id="typeofsite" onchange="type_of_site_val()">
                                <option value="NA">----SELECT SITE----</option>
                                  <?php
                                  $sql_gp="SELECT `Id`, `type_of_site` FROM `type_of_site`";
                                  $result = mysqli_query($conn,$sql_gp);
                                  while( $row = mysqli_fetch_array($result))
                                  {
                                ?>
                                <option value="<?php echo $row["Id"];?>"><?php echo $row["type_of_site"];?></option>
                             <?php } ?>
                                </select>
                            </div>
                      </div>                     
                    <br>   
                         <div class="modal-footer">
                          <br><br> 
                          <br><br> 
                          <!-- <input type="submit" name="save" id="save" class="btn btn-primary earthing_gp" value="Submit">  -->
                         </div>
                        </form>
                       </div>
                    </div>
                  <!----HO-SITE----->
                <div id="ho" >
                <nav class="navbar navbar-light bg-light">
                <h2 class="card-title" style="color:#012970;margin-left:534px;"><b>ADD HO-SITE DETAILS</b></h2>
                 </nav><br><br>
                  <Form method="POST">    
                      <input type="hidden" name="roleid"   id="roleid"   value="<?php echo $_SESSION["role_Id"];?>"/>
                      <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>

                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">HO ID <span style="color: red">*</span></label>
                          <input type="text" class="HOid form-control" name="HOid" id="HOid" required>
                          <input type="hidden" name="type_of_siteHO"  id="type_of_siteHO">
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">District Name <span style="color: red">*</span></label>
                          <input type="text" class="DistrictName form-control" name="DistrictName" id="DistrictName" required>
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                            <div class="col-4">
                                <label for="email" class="form-label">Block Name <span style="color: red">*</span></label>
                                <input type="text" class="BlockName form-control" name="BlockName" id="BlockName" required>
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">Department Name <span style="color: red">*</span></label>
                                <input type="text" class="DepartmentName form-control" name="DepartmentName" id="DepartmentName" required>
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">HO Office Name/ Address <span style="color: red">*</span></label>
                                <input type="text"  class="HOOfficeNameAddress form-control"  name="HOOfficeNameAddress" id="HOOfficeNameAddress" required>
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="desigantion" class="form-label">DHQ/BHQ <span style="color: red">*</span></label>
                            <input type="text"  class="DHQBHQ form-control"  name="DHQBHQ" id="DHQBHQ" required>
                        </div>
                        <div class="col-4">
                            <label for="department" class="form-label">Connectivity Type <span style="color: red">*</span> </label>
                              <input type="text" class="ConnectivityType form-control" name="ConnectivityType" id="ConnectivityType" required>
                           </div>
                           <div class="col-4">
                            <label for="text" class="form-label">Bandwidth <span style="color: red">*</span></label>
                            <input type="text" class="Bandwidth form-control" name="Bandwidth" id="Bandwidth" required>
                        </div>
                        </div><br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="Status" class="form-label">Status <span style="color: red">*</span></label>
                            <select  class="Status form-control"  name="Status" id="Status" required="true">
                                <option value="NA">--SELECT STATUS--</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="DEACTIVE">DE-ACTIVE</option>
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
                          <input type="submit" name="HOsave" id="HOsave" class="btn btn-primary HOsave" value="Submit"> 
                         </div>
                        </form>
                        </div>
                      </div>
                     </div>
                     </div>
                     </div>
                 <!----HO-SITE----->
         <!----GP-SITE----->
                     <div id="gp">
                          <nav class="navbar navbar-light bg-light">
                      <h2 class="card-title" style="color:#012970;margin-left:534px;"><b>ADD GP-SITE DETAILS</b></h2>
                      </nav><br><br>
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
                          <label for="UniqueCode" class="form-label">Unique Code <span style="color: red">*</span></label>
                          <input type="text" class="UniqueCode form-control" name="UniqueCode" id="UniqueCode" required>
                          <input type="hidden" name="type_of_siteGP" id="type_of_siteGP">

                        </div>

                        <div class="col-6">
                          <label for="GoLive" class="form-label">Go-Live <span style="color: red">*</span></label>
                          <input type="text" class="GoLive form-control" name="GoLive" id="GoLive" required>
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                            <div class="col-4">
                                <label for="GPCode" class="form-label">GP Code <span style="color: red">*</span></label>
                                <input type="text" class="GPCode form-control" name="GPCode" id="GPCode" required>
                            </div>
                            <div class="col-4">
                                <label for="GPLGDCode" class="form-label">GP LGD Code <span style="color: red">*</span></label>
                                <input type="text" class="GPLGDCode form-control" name="GPLGDCode" id="GPLGDCode" required>
                            </div>
                            <div class="col-4">
                                <label for="GPID" class="form-label">GP ID <span style="color: red">*</span></label>
                                <input type="text"  class="GPID form-control"  name="GPID" id="GPID" required>
                            </div>
                        </div>
                        <br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="TypeOfSite" class="form-label">Type Of Site <span style="color: red">*</span> </label>
                            <input type="text"  class="TypeOfSite form-control"  name="TypeOfSite" id="TypeOfSite" required>
                        </div>
                        <div class="col-4">
                            <label for="Zone" class="form-label">Zone <span style="color: red">*</span> </label>
                              <input type="text" class="Zone form-control" name="Zone" id="Zone" required>
                           </div>
                           <div class="col-4">
                            <label for="District" class="form-label">District <span style="color: red">*</span></label>
                            <input type="text" class="District form-control" name="District" id="District" required>
                        </div>
                        </div><br>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="PS" class="form-label">PS <span style="color: red">*</span></label>
                            <input type="text"  class="PS form-control"  name="PS" id="PS" required>
                        </div>
                        <div class="col-4">
                            <label for="NewPSName" class="form-label">New PS Name <span style="color: red">*</span> </label>
                              <input type="text" class="NewPSName form-control" name="NewPSName" id="NewPSName" required>
                           </div>
                           <div class="col-4">
                            <label for="GP" class="form-label">GP <span style="color: red">*</span></label>
                            <input type="text" class="GP form-control" name="GP" id="GP" required>
                         </div>
                        </div><br/><br/>
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="TypeOfConnectivity" class="form-label">Type Of Connectivity <span style="color: red">*</span> </label>
                            <input type="text"  class="TypeOfConnectivity form-control"  name="TypeOfConnectivity" id="TypeOfConnectivity" required>
                        </div>
                          <div class="col-4">
                            <label for="Status" class="form-label">Status <span style="color: red">*</span></label>
                            <select  class="Status form-control"  name="Status" id="Status" required="true">
                                <option value="NA">--SELECT STATUS--</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="DEACTIVE">DE-ACTIVE</option>
                          </select>
                          </div>
                         </div>
                         <div class="modal-footer"> 
                          <input type="submit" name="saveGP" id="saveGP" class="btn btn-primary saveGP" value="Submit"> 
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
<!----GP-SITE----->
</section>

</main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <script type="text/Javascript">
  
  // onkeyup event will occur when the user 
  // release the key and calls the function
  // assigned to this event
  function GetDetail(str) {
    console.log(str.length);
      if (str.length == 0) 
      {
            document.getElementById("gpcode").value = '';
            document.getElementById("gpgdcode").value = '';
            document.getElementById("gpid").value = '';
            document.getElementById("typeofsite").value = '';
            document.getElementById("zone").value = '';
            document.getElementById("district").value = '';
            document.getElementById("ps").value = '';
            document.getElementById("new_ps").value = '';
            document.getElementById("gp_name").value = '';
          return;
      }
      if ( document.getElementById("unique_code").value == 'NA') 
      {
            document.getElementById("gpcode").value = '';
            document.getElementById("gpgdcode").value = '';
            document.getElementById("gpid").value = '';
            document.getElementById("typeofsite").value = '';
            document.getElementById("zone").value = '';
            document.getElementById("district").value = '';
            document.getElementById("ps").value = '';
            document.getElementById("new_ps").value = '';
            document.getElementById("gp_name").value = '';
          return;
      }
      else {

          // Creates a new XMLHttpRequest object
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {

              // Defines a function to be called when
              // the readyState property changes
              if (this.readyState == 4 && this.status == 200) 
              {      
                  var myObj = JSON.parse(this.responseText);
                  console.log(myObj);       

                 // document.getElementById("project_name").value = myObj[0];
                  document.getElementById("gpcode").value = myObj[1];
                  document.getElementById("gpgdcode").value = myObj[2];
                  document.getElementById("gpid").value = myObj[3];
                  document.getElementById("typeofsite").value = myObj[4];
                  document.getElementById("zone").value = myObj[5];
                  document.getElementById("district").value = myObj[6];
                  document.getElementById("ps").value = myObj[7];
                  document.getElementById("new_ps").value = myObj[8];
                  document.getElementById("gp_name").value = myObj[9];
                 
              }
          };

          // xhttp.open("GET", "filename", true);
          xmlhttp.open("GET", "Pages/bind_code.php?user_id=" + str, true);
            
          // Sends the request to the server
          xmlhttp.send();
      }
  }
</script>
<script type="text/javascript">
  function type_of_site_val()
  {
    var types_site=document.getElementById("typeofsite").value;
    if(types_site=='1')
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
    $("#success").hide(1000);
    $("#notsuccess").hide(1000);
});
</script>

<script>
$(document).ready(function(){
  $("#ho").hide();
  $("#gp").hide();
  //GP SITE.
  $("#UniqueCode").val("");
  $("#GoLive").val("");
  $("#GPCode").val("");
  $("#GPLGDCode").val("");
  $("#GPID").val("");
  $("#TypeOfSite").val("");
  $("#Zone").val("");
  $("#District").val("");
  $("#PS").val("");
  $("#NewPSName").val("");
  $("#GP").val("");
  $("#TypeOfConnectivity").val("");
  $("#Status").val("NA");
//GP SITE

//HO SITE
  $("#HOid").val("");
  $("#DistrictName").val("");
  $("#BlockName").val("");
  $("#DepartmentName").val("");
  $("#HOOfficeNameAddress").val("");
  $("#DHQBHQ").val("");
  $("#ConnectivityType").val("");
  $("#Bandwidth").val("");
  $("#Status").val("");
//HO SITE

  $("#typeofsite").change(function(){
    if($("#typeofsite").val()=='2')
    {
      $("#ho").show();
      $("#gp").hide();
      $("#UniqueCode").val("");
      $("#GoLive").val("");
      $("#GPCode").val("");
      $("#GPLGDCode").val("");
      $("#GPID").val("");
      $("#TypeOfSite").val("");
      $("#Zone").val("");
      $("#District").val("");
      $("#PS").val("");
      $("#NewPSName").val("");
      $("#GP").val("");
      $("#TypeOfConnectivity").val("");
      $("#Status").val("NA");
    }
    if($("#typeofsite").val()=='1')
    {
      $("#ho").hide();
      $("#HOid").val("");
      $("#DistrictName").val("");
      $("#BlockName").val("");
      $("#DepartmentName").val("");
      $("#HOOfficeNameAddress").val("");
      $("#DHQBHQ").val("");
      $("#ConnectivityType").val("");
      $("#Bandwidth").val("");
      $("#Status").val("NA");

      $("#gp").show();
    }
    if($("#typeofsite").val()=='NA')
    {
      $("#ho").hide();
      $("#gp").hide();
      $("#UniqueCode").val("");
      $("#GoLive").val("");
      $("#GPCode").val("");
      $("#GPLGDCode").val("");
      $("#GPID").val("");
      $("#TypeOfSite").val("");
      $("#Zone").val("");
      $("#District").val("");
      $("#PS").val("");
      $("#NewPSName").val("");
      $("#GP").val("");
      $("#TypeOfConnectivity").val("");
      $("#Status").val("NA");

      $("#HOid").val("");
      $("#DistrictName").val("");
      $("#BlockName").val("");
      $("#DepartmentName").val("");
      $("#HOOfficeNameAddress").val("");
      $("#DHQBHQ").val("");
      $("#ConnectivityType").val("");
      $("#Bandwidth").val("");
      $("#Status").val("NA");
    }
  });
});
</script>
  <!-- ======= End Footer ======= -->
