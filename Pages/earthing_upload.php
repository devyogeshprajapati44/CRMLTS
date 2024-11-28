<?php
error_reporting(E_ALL & ~E_NOTICE);
//header('Content-Type: text/csv'); 
include 'connection.php';

//excel file upload
if (isset($_POST['submit'])) 
{ 
    $fileName=$_FILES["upload_file"]["name"];
    $fileTmpName=$_FILES["upload_file"]["tmp_name"];
    $fileExtension=pathinfo($fileName,PATHINFO_EXTENSION);

    $allowedType=array('csv');
    if(!in_array($fileExtension,$allowedType))
    {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Error !</span>File Type Not Allowed.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    } 
    
    else
    {
      $handle=fopen($fileTmpName,'r'); //read mode 'r'
      if ($handle) {
        // Read and extract year and month from metadata line
        $metadataLine = fgets($handle);
        preg_match('/Year :(\d+) Month :(\w+)/', $metadataLine, $matches);
        $year = intval($matches[1]);
        $monthName = $matches[2];

        // Convert month name to numeric value (1-12)
            $monthNumeric = date_parse($monthName)['month'];
            $date_atten=$year.'-'.$monthNumeric;
            $d=cal_days_in_month(CAL_GREGORIAN,$monthNumeric,$year);

      fgetcsv($handle);//It will skip the header part like employe name,date etc.
      while(($myData = fgetcsv($handle,1000,',')) !== FALSE)
      {
          //$userid=$myData[0];//It is refer as next line after header and it will contain Employee name data part.
          $sno       = $myData[0];
          $empCode   = $myData[1];
          $userid    = $myData[2];
          $Status    = $myData[6];
          //$Status_2  = $myData[35];
         // $year_date=$date_atten.'-'.$dateNumbers;
          $upload_type='FILE';
          $check_intime  ='';
          $check_outtime ='';
          /**According to their employee name,we are Fetching an Id of corresponding.**/
          //$names=strtoupper($userid);
          if(!empty($empCode))
          {
            $names=strtoupper($empCode);
            $select="SELECT `Id` FROM `employee` WHERE `emp_code` IN ('$names')";//IN Operator Find List employee code,Id.
            
            $fetch = mysqli_query($conn,$select);
            $row_user_id   = mysqli_fetch_array($fetch);

            $emp_user_id=$row_user_id['Id'];
          }
          //die();
          /***
           * Getting Check_in Time and Check_out Time according their Status.   
             $checkintime :- It will use as a status as well Like P,WO etc.**/

             //if(!empty($userid) && $userid)
             if(!empty($empCode) && $empCode)
             //if($userid=="Chiranji lal")
             {
                 for($i=1;$i<=$d;$i++)
                 {
                     echo $check_in_out_date=$date_atten.'-'.$i;
                     //die;
                     $index = 5 + $i; 

                     if(!empty($myData[$index]))
                     {
                      
                      $att_status=$myData[$index];

                         if($myData[$index] == 'L')
                         {
                             $check_intime  ='00:00';
                             $check_outtime ='00:00';
                         }
                         if($myData[$index] == 'W')
                         {
                             $check_intime  ='00:00';
                             $check_outtime ='00:00';
                         }
                         if($myData[$index] == 'P')
                         {
                             $check_intime  ='09:30';
                             $check_outtime ='18:30';
                         }
                         if($myData[$index] == 'CO')
                         {
                             $check_intime  ='09:30';
                             $check_outtime ='18:30';
                         }
                    }
                    // echo"<pre>";
                    // print_r($myData[$index]);
                    // echo"</pre>";
                    //die;
                  //}
          //attendance time calculation.
          $t1 = strtotime($check_intime);
          $t2 = strtotime($check_outtime); 
          $hours = ($t2 - $t1)/3600;  

          $tootltime=floor($hours) . ':' . ( ($hours-floor($hours)) * 60 );
          //attendance time calculation.

          //$checkoutdate=$myData[2]; //It is refer to date is coming from excel.

          $upload_type='FILE';
//die;
          echo $query="INSERT INTO `employee_attendence`( `user_id`, `check_in_time`, `check_in_date`, `check_out_time`, `check_out_date`, `Total_hours`,`status`,`upload_type`) 
          VALUES ('".$emp_user_id."','".$check_intime."','".$check_in_out_date."','".$check_outtime."','".$check_in_out_date."','".$tootltime."','".$att_status."','".$upload_type."')";
         // DIE();
          $fileres = mysqli_query($conn,$query);
          header("location:PFC.php?PageName=attendance_upload&Mgs=2");
                  }
      }
    }
  }
}
    }
//excel file upload.

//Manual Entry
  if(isset($_POST["manualsubmit"]))
  {

    $signintime=$_POST["signintime"];    //For Sign_in_time
    $signouttime=$_POST["signouttime"]; //For Sign_Out_time
    $att_status=$_POST["status"];      //For status
    $upload_types='MANUAL';           //Upload type in Manual.Here we can recongnize entry has done from FILE or MANUAL.

    //attendance time calculation.
    $t1 = strtotime($_POST["signintime"]);             //Convert sign in time into string time.

    $t2 = strtotime($_POST["signouttime"]);             //Convert sign out time into string time.

    $hours = ($t2 - $t1)/3600;                      //calculating hours and minutes Here.

    $tootltime=floor($hours) . ':' . ( ($hours-floor($hours)) * 60 );//Complete calculation of time Like Hours and minutes here.
    //attendance time calculation.

if(!empty($_POST["selected_date"]))
{
  foreach($_POST["selected_date"] as $dateval)//GETTING MULTIPLE DATE WHERE IT WILL INSERT VERTICALLY INTO DB.
  {
      $dates_selected=$dateval;
    foreach($_POST["empname"] as $empval)//GETTING MULTIPLE EMPLOYEE NAME WHERE IT WILL INSERT VERTICALLY INTO DB.
    {
      $employeesList=$empval;
      echo $qry_Adv = "INSERT INTO `employee_attendence`(`user_id`, `check_in_time`, `check_in_date`,`check_out_time`,`check_out_date`,`Total_hours`,`status`,`upload_type`) 
      VALUES ('".$employeesList."','".$signintime."','".$dates_selected."','".$signouttime."','".$dates_selected."','".$tootltime."','".$att_status."','".$upload_types."')";
      //die;
      $run_Sub   = mysqli_query($conn, $qry_Adv);

      if($run_Sub > 0)
      {
        header("location:PFC.php?PageName=attendance_upload&Mgs=1");
      }
    }
 }

}

}
?>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"]))
{
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
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==2){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>File Upload.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<style>
.select2-selection__choice__display
{
  color:black;
}
</style>
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
           <div class="pagetitle">
            <!-- <h1><u>Upload Attendance:-</u></h1> -->
           </div>
                <?php //echo $message; ?>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
              <nav class="navbar navbar-light bg-light">
              <h1 style="color:#012970;margin-left: -105px;margin-left: 489px;">UPLOAD EARTHING</h1><br/><br/>
              </nav><br><br>
                <div>
                  <form method="POST">
                   <fieldset class="row mb-3">
                     <legend class="col-form-label col-sm-2 pt-0" style="color:#012970;font-size:15px;"><u><b>UPLOAD TYPE:-</b></u></legend>
                         <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Manual">
                                  <label class="form-check-label" for="gridRadios1" style="color:#012970;font-size:15px;;margin-top:-4px;"><b>MANUAL ENTRY</b></label>
                             </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <span style="margin-left:232px;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="File" style="margin-top:6px;">&nbsp;
                                    <label class="form-check-label" for="gridRadios2" style="color:#012970;font-size:15px;"><b>UPLOAD FILE</b></label>
                                </div>
                            </span>
                        </div>
                    </fieldset>
                  </form>
                </div>
                <div class="card-body" id="uploadfile">
                 <h5 class="card-title" style="color:#012970;"><b>UPLOAD FILE</b></h5>
                  <form method="POST" enctype="multipart/form-data">    
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
                      <div class="row" >
                         <div class="col-6" style="margin-left:921px;margin-top:41px;" id="gp">
                          <label for="emp_name" class="form-label" style="color:#012970;"><b>GP-Site Upload Format</b></label>&nbsp;
                          <a href="uploadFormat/Latech_Jaipur_Aug2023.csv" class="btn btn-primary" download="Latech_Jaipur_Aug2023.csv">Download Here</a>
                        </div>

                         <div class="col-6" style="margin-left:655px;margin-top:21px;" id="ho">
                          <label for="emp_name" class="form-label" style="color:#012970;"><b>HO-Site Upload Format</b></label>&nbsp;
                          <a href="uploadFormat/Latech_Jaipur_Aug2023.csv" class="btn btn-primary" download="Latech_Jaipur_Aug2023.csv">Download Here</a>
                        </div>
                        </div><br>
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Upload Earthing *(Accept CSV file Only)</label>
                          <input type="file" class="form-control" name="upload_file" id="upload_file" accept=".csv" required>
                        </div>
                      </div><br><br><br>
                         <!--<div class="modal-footer">-->
                          <input type="submit" name="submit"  id="excelFile" class="btn btn-primary add_empolyee" style="margin-left:7px;margin-top:-20px;" value="Upload Earthing"> 
                         </div>

                         <div>
                    <!-- <form>
                      <input type="text" name="xyz"/>
                    </form> -->
                    <div>
                        </form>
                       <!-- </div> -->
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
          
                <!--Upload Manual--->
                <div class="card-body" id="uploadfilemanual">
                 <h5 class="card-title"  style="color:#012970;"><b>MANUAL ENTRY</b></h5>
                  <form method="POST">    
                    <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee Name:-</label>
                          <select  class="SelectEmp form-select" name="empname[]" onclick="emp_multiple_select()" id="empname" multiple>
                            <option value="NA">--SELECT EMPLOYEE--</option>
                            <?php
                            $sql="select * from employee where emp_status='1'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                                {?>
                              <option value="<?php echo $row['Id'];?>"><?php echo $row['emp_name'];?></option>
                              <?php 
                                }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-6">
                          <label  class="form-label">Month:-</label>
                          <select name="selected_month" class="month  form-control select_type" id="selected_month">
                                    <option value="NA">SELECT MONTHS</option>
                                    <?php for ($i = 1; $i <= 12; $i++) { $month = date('F', mktime(0, 0, 0, $i, 1, 2011)); ?>
                                          <option value="<?php echo $i; ?>"><?php echo $month; ?></option>
                                    <?php } ?>
                          </select>
                        </div>
                      </div> 
                          <br>
        
                    <div class="row mb-3">
                        <div class="col-12">
                          <label for="selected_date" class="form-label">Sign-In Date:-</label>
                          <select name="selected_date[]" class="form-control" id="selected_date" multiple>
                          <option value="NA">--Select Date--</option>
                         </select>
                        </div>
                        <br/><br/>
                          </div><br/><br/>

                        <div class="row mb-3">
                        <div class="col-4">
                          <label  class="form-label">Sign-In Time:-</label>
                          <input type="time" name="signintime" class="form-control" id="signintime">
                        </div>

                        <div class="col-4">
                          <label for="emp_name" class="form-label">Sign-Out Time:-</label>
                          <input type="time" name="signouttime" class="form-control" id="signouttime">
                        </div>
                        <div class="col-4">
                          <label for="emp_name" class="form-label">Status</label>
                          <select name="status" class="form-control" id="status" onchange="emp_status_multiple()">
                            <option value="NA">--Select Status--</option>
                            <option value="P">P (Present)</option>
                            <option value="A">A (Absent)</option>
                            <option value="HD">HD (Half Day)</option>
                            <option value="L">L (Leave)</option>
                            <option value="WO">WO (Week OFF)</option>
                            <option value="GH">GH (Gazetted Holiday)</option>
                            <option value="H">H (Holiday)</option>
                         </select>
                        </div>
                          </div>
                          <input type="submit" name="manualsubmit"  id="manualsubmit" class="btn btn-primary manualsubmit" value="Submit"> 
                         </div>
                        </form>
                      
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
              
                <!--Upload Manual--->
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
<style>
#uploadfile
{
  display:none;
}
#uploadfilemanual
{
  display:none;
}
</style>
  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script type="text/Javascript">
$(document).ready(function()
{
$("#uploadfile").hide();
$("#uploadfilemanual").hide();

$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1").val()=="Manual")
    {
  
        $("#uploadfile").hide();
        $("#uploadfilemanual").show();
    } 
});

$("#gridRadios2").click(function()
{
    //no
   if($("#gridRadios2").val()=="File")
    {
        
        $("#uploadfile").show();
        $("#uploadfilemanual").hide();
    }
    
});

$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1:checked").val()=="Manual")
    {
        $("#uploadfile").hide();
        $("#uploadfilemanual").show();
    } 
});
});
</script>
<script>
    function bindCompleteDates() {
      const selectedMonth = parseInt(document.getElementById("selected_month").value);
      const selectedDateElement = document.getElementById("selected_date");

      // Clear existing options
      selectedDateElement.innerHTML = '';

      // Get the number of days in the selected month
      const daysInMonth = new Date(2023, selectedMonth, 0).getDate();

      // Add options for each date in the selected month
      for (let date = 1; date <= daysInMonth; date++) {
        const dayString = String(date).padStart(2, '0'); // Ensure two-digit day format (e.g., "01")
        const formattedDate = `2023-${String(selectedMonth).padStart(2, '0')}-${dayString}`;
        
        const option = document.createElement("option");
        option.value = formattedDate;
        option.text = formattedDate;
        selectedDateElement.appendChild(option);
      }
    }

    if(document.getElementById("selected_month").value=="NA")
    {
      document.getElementById("selected_date").value=" ";
    }

    // Bind complete dates when the month dropdown value changes
    document.getElementById("selected_month").addEventListener("change", bindCompleteDates);
    // Initially bind complete dates for the default selected month (e.g., January)
    bindCompleteDates();

    //Second date and time.
    function bindCompleteDates_2() {
      const selectedMonth2 = parseInt(document.getElementById("selected_month").value);
      const selectedDateElement = document.getElementById("signoutdate");

      // Clear existing options
      selectedDateElement.innerHTML = '';

      // Get the number of days in the selected month
      const daysInMonth = new Date(2023, selectedMonth2, 0).getDate();

      // Add options for each date in the selected month
      for (let date = 1; date <= daysInMonth; date++) {
        const dayString = String(date).padStart(2, '0'); // Ensure two-digit day format (e.g., "01")
        const formattedDate = `2023-${String(selectedMonth2).padStart(2, '0')}-${dayString}`;
        
        const option = document.createElement("option");
        option.value = formattedDate;
        option.text = formattedDate;
        selectedDateElement.appendChild(option);
      }
    }

    if(document.getElementById("selected_month").value=="NA")
    {
      document.getElementById("signoutdate").value=" ";
    }

    // Bind complete dates when the month dropdown value changes
    document.getElementById("selected_month").addEventListener("change", bindCompleteDates_2);
    // Initially bind complete dates for the default selected month (e.g., January)
    bindCompleteDates_2();
  </script>
      <script type="text/javascript">
        function emp_multiple_select()
        {
          $(document).ready(function () 
          {
            $('.SelectEmp').select2();
          });
        }
    </script>
      <script type="text/javascript">
        function emp_status_multiple()
        {
          //console.log("Hi Function");
          var emp_status=document.getElementById("status").value;
          if(emp_status == "NA")//No value selected.
          {
            document.getElementById("signintime").value='';
            document.getElementById("signouttime").value='';
          }

          if(emp_status == "P")//Present
          {
            document.getElementById("signintime").value='09:30';
            document.getElementById("signouttime").value='18:30';
          }

          if(emp_status == "A")//Absent
          {
            document.getElementById("signintime").value='00:00';
            document.getElementById("signouttime").value='00:00';
          }

          if(emp_status == "L")//Leave
          {
            document.getElementById("signintime").value='00:00';
            document.getElementById("signouttime").value='00:00';
          }
          if(emp_status == "WO")//WO (Week OFF)
          {
            document.getElementById("signintime").value='00:00';
            document.getElementById("signouttime").value='00:00';
          }
          if(emp_status == "GH")//GH (Gazetted Holiday)
          {
            document.getElementById("signintime").value='00:00';
            document.getElementById("signouttime").value='00:00';
          }
          if(emp_status == "H")//H (Holiday) //New added 09-09-2023
          {
            document.getElementById("signintime").value='00:00';
            document.getElementById("signouttime").value='00:00';
          }
          if(emp_status == "HD")//HD (Half Day) // new added New added 09-09-2023.
          {
            document.getElementById("signintime").value='09:30';
            document.getElementById("signouttime").value='01:30';
          }
        }
    </script>
  <!-- ======= End Footer ======= -->

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