<?php
//error_reporting(0);
//session_start();
//error_reporting (E_ALL);
include 'connection.php';
include('pagi_script.php');
?>
<main id="main" class="main">
<!-- <h1 style="color:#012970;">VIEW SALARY SLIP</h1><br/><br/>-->
<!-- <h5><u><b>Add Salary Slip:-</b></u></h5><br/><br/> -->
<!-- Start dashboard inner -->
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <div class="card-header"> 
          <nav class="navbar navbar-light bg-light" style="height:80px;">

                 <!-- <u><b>Salary List:-</b></u> -->
                    <form method="POST">
                    <a class="btn btn-warning text-black" href="PFC.php?PageName=earthing_gp" style="font-size:large;height:39px;padding:6px;width:100px;margin-left: 15px;" role="button">Back</a>
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="float:right;margin-top:19px;margin-left:869px;display:none;" id="addsalary">+ Add Salary</button>
                            <input type="text" name="searchvalue" id="searchvalue" style="height:39px;padding:6px;width:300px;margin-left:0px;margin-top:14px;"  placeholder="Search Here...." value="">
                            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="height:39px;padding:6px;width:97px;" value="Search" onclick="myFunction()"> -->
                             
                        </form>
                      <h2 style="color:#012970;margin-left:-225px;margin-top:12px;"><b>VIEW EARTHING GP</b></h2><br/><br/>  
                   </nav><br><br>
                   <div class="card-body">
              <!-- Default Accordion -->
              <?php              
                    $months = array(1 => 'GP',2 => 'HO');
                    foreach($months as $monthNum => $monthName) 
                    {
                      // if(isset($_POST["submitsearch"]))
                      // {
                        // if(empty($_POST["searchvalue"]))
                        // {
                      ?> 

              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $monthNum;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $monthNum;?>">
                     <?php echo $monthName.' '.$_SESSION["YEAR"];?>
                    </button>
                  </h2>
                  <div id="collapseOne<?php echo $monthNum;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
<!--Data table--->
                  <!-- <nav class="navbar navbar-light bg-light">
                      <form method="POST">
                          <a class="btn btn-warning text-black" href="" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
                            <input type="text" name="searchvalue" style="margin:-25;height:39px;padding:6px;width:300px;"  placeholder="Search Here...." value="">&nbsp;&nbsp;
                            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                        </form>  -->
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin:right;" id="addsalary">+ Add Salary</button> -->
                          </div>   
                        <!--table start-->
                      
                        <div class="card-body" id="status1">
                          <?php if($monthName=='GP'){?>
                            <form method="POST">

<input type="text" name="searchvalue" id="searchvalue" style="height:39px;padding:6px;width:300px;margin-left:0px;margin-top:14px;"  placeholder="Search By GP_ID...." value="">
<input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="height:39px;padding:6px;width:97px;" value="Search">
</form><BR/><BR/>
                            <table id="myTabless11" class="table" style="width:100%">
                            <thead class="thead-pink">
                              <tr>
                                <th>S.No</th>
                                <th hidden>gp_id</th>
                                <th>UniqueCode</th>
                                <th>Go-Live</th>
                                <th>GPCode</th> 
                                <th>GPLGDCode</th>   
                                <th>GPID</th>   
                                <th>TypeOfSite</th>   
                                <th>Zone</th>   
                                <th>District</th>   
                                <th>PS</th>   
                                <th>NewPSName</th>   
                                <th>GP</th>   
                                <th>TypeOfConnectivity</th>   
                                <th>status</th>   
                                <th style="text-align: center;"><b>Action</b></th>
                              </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $pfc_uid=$_SESSION['PFC_UID'];

                                  if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                                  {
                                    if(isset($_POST["searchvalue"]))
                                    {
                                      $filtervalue=strtoupper($_REQUEST['searchvalue']);
                                      $sql = "SELECT * FROM `gp_site` WHERE `UniqueCode` LIKE '%$filtervalue' AND `UniqueCode` LIKE '$filtervalue%' AND `UniqueCode` LIKE '%$filtervalue%'";                                    
                                    }
                                    else
                                    {
                                      $sql = "SELECT * FROM `gp_site`";
                                    }
                                  }
                                  elseif(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                                  {
                                    $sql = "SELECT * FROM `gp_site`";
                                  }
                         
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) 
                                  {
                                    $cnt=1;
                                      while($row = $result->fetch_assoc()) 
                                    {
                                      ?>
                                    <tr>
                                    <td><?php echo $cnt++;?></td>
                                      <td hidden><?php echo $row["gp_id"];?></td>
                                      <td><?php echo $row["UniqueCode"];?></td>
                                      <td><?php echo $row["Go-Live"];?></td>
                                      <td><?php echo $row["GPCode"];?></td>
                                      <td><?php echo $row["GPLGDCode"];?></td>
                                      <td><?php echo $row["GPID"];?></td>
                                      <td><?php echo $row["TypeOfSite"];?></td>
                                      <td><?php echo $row["Zone"];?></td>
                                      <td><?php echo $row["District"];?></td>
                                      <td><?php echo $row["PS"];?></td>
                                      <td><?php echo $row["NewPSName"];?></td>
                                      <td><?php echo $row["GP"];?></td>
                                      <td><?php echo $row["TypeOfConnectivity"];?></td>
                                      <td><?php echo $row["status"];?></td>
                                      <td>
                                      <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Action
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:174px;height:49px;">
                                        <form method="POST">
                                        <?php if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5)) {?>
                                        <button id="singlebutton" name="empView_gp_id" value="<?php echo $row["gp_id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn'>VIEW</button>
                                        <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["gp_id"]; ?>" data-bs-toggle='modal' class='btn btn-success editbtn'>EDIT</button>
                                        <!-- <button id="singlebuttonDelete" name="EmpDelete" value="<?php //echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-warning Delete' style="margin-left: 109px;margin-top: -46px;">Delete</button> -->
                                        <input type="hidden" name="gp_id" id="gp_id" value="<?php echo $row["gp_id"];?>"/>
                                        <?php } else {?>
                                          <button id="singlebutton" name="empView" value="<?php echo $row["gp_id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn'>VIEW</button>
                                          <?php } ?>
                                        <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
                                     </form>
                                         </div>
                                        </div>
                                     </td>
                                      </tr>
                                    <?php
                                    }
                                  }
                                  ?>
                              
                                </tbody>
                            </table>
                            <?php } if($monthName=='HO') {?>
                            <form method="POST">
                              <input type="text" name="searchvalueHO" id="searchvalueHO" style="height:39px;padding:6px;width:300px;margin-left:0px;margin-top:14px;"  placeholder="Search By HO_ID...." value="">
                              <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="height:39px;padding:6px;width:97px;" value="Search">
                            </form><BR/><BR/>
                            <table id="myTabless11" class="table" style="width:100%">
                            <thead class="thead-pink">
                              <tr>
                                <th>S.No</th>
                                <th hidden>ho_site_id</th>
                                <th>HO_id</th>
                                <th>district_name</th>
                                <th>department_name</th> 
                                <th>HO_Officename_address</th>   
                                <th>DHQ/BHQ</th>   
                                <th>connectivity_type</th>   
                                <th>Bandwidth</th>   
                                <th>status</th>    
                                <th hidden>Type</th>    
                                <th style="text-align: center;"><b> Action</b></th>
                              </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $pfc_uid=$_SESSION['PFC_UID'];
                                  if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                                  {
                                    if(isset($_POST["searchvalueHO"]))
                                    {
                                      $filtervalues=strtoupper($_REQUEST['searchvalueHO']);
                                      $sql= "SELECT * FROM `ho_site` where `HO_id`LIKE '%$filtervalues' OR `HO_id`LIKE '$filtervalues%' OR `HO_id`LIKE '%$filtervalues%'";                                    
                                    }
                                    else
                                    {
                                      $sql="SELECT * FROM `ho_site`";
                                    }
                                  }
                                  elseif(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                                  {
                                      $sql="SELECT * FROM `ho_site`";
                                  }
                         
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) 
                                  {
                                    $cnt=1;
                                      while($row = $result->fetch_assoc()) 
                                    {
                                      ?>
                                    <tr>
                                    <td><?php echo $cnt++;?></td>
                                      <td hidden><?php echo $row["ho_site_id"];?></td>
                                      <td><?php echo $row["HO_id"];?></td>
                                      <td><?php echo $row["district_name"];?></td>
                                      <td><?php echo $row["department_name"];?></td>
                                      <td><?php echo $row["HO_Officename_address"];?></td>
                                      <td><?php echo $row["DHQ/BHQ"];?></td>
                                      <td><?php echo $row["connectivity_type"];?></td>
                                      <td><?php echo $row["Bandwidth"];?></td>
                                      <td><?php echo $row["status"];?></td>
                                      <td hidden><?php echo $row["Type"];?></td>
                                      <td>
                                      <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Action
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:174px;height:49px;">
                                        <form method="POST">
                                        <?php if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5)) {?>
                                        <button id="singlebutton" name="empViewho_site_id" value="<?php echo $row["ho_site_id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn'>VIEW</button>
                                        <button id="singlebuttonedit" name="empEdit_ho_id" value="<?php echo $row["ho_site_id"]; ?>" data-bs-toggle='modal' class='btn btn-success editbtn'>EDIT</button>
                                        <!-- <button id="singlebuttonDelete" name="EmpDelete" value="<?php //echo $row["ho_site_id"]; ?>" data-bs-toggle='modal' class='btn btn-warning Delete' style="margin-left: 109px;margin-top: -46px;">Delete</button> -->
                                        <input type="hidden" name="ho_type" id="ho_type" value="<?php echo $row["Type"];?>"/>
                                        <?php } else {?>
                                          <button id="singlebutton" name="empView" value="<?php echo $row["ho_site_id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn'>VIEW</button>
                                          <?php } ?>
                                        <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
                                     </form>
                                         </div>
                                        </div>
                                     </td>
                                      </tr>
                                    <?php
                                    }
                                  }
                                  ?>
                              
                                </tbody>
                            </table>
                            <?php }?>
                            <?php
                              //  $sql1="SELECT * from `add_salary_slip`";
                              //   echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
                            ?>
                          </div>
                          </div>
                          </div>
                          <?php } 
                          ?>

                  
                        <!--table End-->
  <!--table start search data--->
  
                        <!--table start search data--->
      <!-- Modal -->
        <!--Data table--->                    
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Default Accordion Example -->
    </div>
   </div>
  </div>
 </section>        
</main><!-- End #main -->
  <!-- ======= End Footer ======= -->
  <?php
        if(isset($_POST["empEdit"]))
        {
          $id=$_REQUEST["empEdit"]; 
          //$gp_id=$_REQUEST["gp_id"];  
          //$EID=EDV($id,1);
          header("location:PFC.php?PageName=earthing_gp_edit&gp_id=".$id);
        }
        if(isset($_POST["empEdit_ho_id"]))
        {
          $id=$_REQUEST["empEdit_ho_id"]; 
          //$gp_id=$_REQUEST["gp_id"];  
          //$EID=EDV($id,1);
          header("location:PFC.php?PageName=earthing_HO_edit&ho_id=".$id);
        }

        if(isset($_POST["empView_gp_id"]))
        {
          $id=$_REQUEST["empView_gp_id"]; 
          $gp_id=$_REQUEST["gp_id"]; 
          $EID=EDV($id,1);
          //$gp_type=EDV($gp_id,1);
          header("location:PFC.php?PageName=earthing_HO_view&gp_id=".$EID);
        }

        if(isset($_POST["empViewho_site_id"]))
        {
          $id=$_REQUEST["empViewho_site_id"]; 
          $site_type=$_REQUEST["ho_type"]; 
          $EID=EDV($id,1);
          //$Site_Type=EDV($site_type,1);
          header("location:PFC.php?PageName=earthing_HO_view&ho_id=".$EID);
        }
        // if(isset($_POST["EmpDelete"]))
        // {
        //   $id=$_REQUEST["EmpDelete"]; 
        //   $monthss=$_REQUEST["month_salary_month"]; 
        //   $Years=$_REQUEST["year_salary_year"]; 
        //   $EID=EDV($id,1);
        //   $MONTHID=EDV($monthss,1);
        //   $YEARID=EDV($Years,1);
        //   header("location:PFC.php?PageName=delete_salary&EmpID=".$EID."&month=".$MONTHID."&year=".$YEARID);
        // }
?>  
<script type="text/Javascript">
  function GetDetail() {
    //alert(str);str
    var str=document.getElementById("emp_name").value;//Taking Employee user_id here.
    var overtime=document.getElementById("overtime").value;
    var expenses=document.getElementById("expenses").value;
    //var dateofsalarytrans=document.getElementById("dateofsalarytrans").value;
    if(overtime!='' && expenses!='')
    {

    if (str.length == 0) 
      {
          document.getElementById("project_name").value = "";
          document.getElementById("aadhar_no").value = "";
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
                  document.getElementById("project_name").value = myObj[0];
                  document.getElementById("aadhar_no").value = myObj[1];
                  document.getElementById("pan_no").value = myObj[2];
                  document.getElementById("uan_no").value = myObj[3];
                  document.getElementById("Esi_no").value = myObj[4];
                  document.getElementById("pf_no").value = myObj[5];
                  document.getElementById("joining_date").value = myObj[6];
                  document.getElementById("father_name").value = myObj[7];
                  document.getElementById("location").value = myObj[8];
                  document.getElementById("account_number").value = myObj[9];
                  document.getElementById("bank_name").value = myObj[10];
                  document.getElementById("branch_name").value = myObj[11];
                  document.getElementById("ifsc_code").value = myObj[12];
                  document.getElementById("desig_id").value = myObj[13];
                  document.getElementById("em_id").value = myObj[14];
                  document.getElementById("desg_idd").value = myObj[15];

                  document.getElementById("basic").value = myObj[16];
                  //document.getElementById("basic1").value = myObj[16];
                  document.getElementById("hra_no").value = myObj[17];
                  document.getElementById("special_all").value = myObj[18];
                  document.getElementById("other_all").value = myObj[19];

                  document.getElementById("deductions").value = myObj[25];

//Calculating total contribution.
document.getElementById("total_contribution").value=parseInt(myObj[24]) + parseInt(myObj[23]);
//Calculating total contribution.

//Salary in words
    function numberToWords(number) {
      //number=document.getElementById("total_payble").value;
  const units = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
  const teens = ["", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
  const tens = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

  function convertChunk(num) {
    if (num < 10) {
      return units[num];
    } else if (num < 20) {
      return teens[num - 10];
    } else {
      const ten = Math.floor(num / 10);
      const unit = num % 10;
      return tens[ten] + (unit !== 0 ? ` ${units[unit]}` : '');
    }
  }

  function convertToWordsHelper(num, chunkName) {
    const chunk = Math.floor(num / 100);
    const remainder = num % 100;
    let result = '';

    if (chunk > 0) {
      result += `${units[chunk]} Hundred`;
      if (remainder !== 0) {
        result += ' and ';
      }
    }

    if (remainder !== 0) {
      result += convertChunk(remainder);
    }

    if (chunkName) {
      result += ` ${chunkName}`;
    }

    return result;
  }

  if (number === 0) {
    return "Zero";
  }

  const billion = Math.floor(number / 1e9);
  const million = Math.floor((number % 1e9) / 1e6);
  const thousand = Math.floor((number % 1e6) / 1e3);
  const remainder = number % 1e3;

  let result = '';

  if (billion > 0) {
    result += convertToWordsHelper(billion, 'Billion');
  }

  if (million > 0) {
    if (result !== '') {
      result += ' ';
    }
    result += convertToWordsHelper(million, 'Million');
  }

  if (thousand > 0) {
    if (result !== '') {
      result += ' ';
    }
    result += convertToWordsHelper(thousand, 'Thousand');
  }

  if (remainder > 0) {
    if (result !== '') {
      result += ' ';
    }
    result += convertToWordsHelper(remainder, '');
  }

  return result;
}

//const number = document.getElementById("total_payble").value;
var totalPayableElement = parseFloat(document.getElementById("total_payble").value);
if(document.getElementById("total_payble").value!='')
{
   // var value = totalPayableElement.value;  
    const numberInWords = numberToWords(totalPayableElement);
    document.getElementById("salary_in_words").value=numberInWords;
    console.log(numberInWords); // Outputs: "One Hundred Twenty-Three Million Four Hundred Fifty-Six Thousand Seven Hundred Eighty-Nine"
    console.log(totalPayableElement); 
}
// const numberInWords = numberToWords(number);
// document.getElementById("salary_in_words").value=numberInWords;
// console.log(numberInWords); // Outputs: "One Hundred Twenty-Three Million Four Hundred Fifty-Six Thousand Seven Hundred Eighty-Nine"
// console.log(number); 
    //salary in words.

//Calculating Basic pay according to total_payable_days.
var basic_payy=parseFloat(document.getElementById("basic").value);
var total_sal=(basic_payy/document.getElementById("totaldaysinmonth").value) * document.getElementById("total_payable_days").value;
round_off_basic=Math.round(total_sal);
document.getElementById("basic").value=round_off_basic;
document.getElementById("basic1").value=round_off_basic;
console.log('basic_payy'+ basic_payy + 'Total_Salary' + round_off_basic);
//Calculating Basic pay according to total_payable_days.

//Calculating hra according to total_payable_days.
var hra=parseFloat(document.getElementById("hra_no").value);
cal_hra=((hra / document.getElementById("totaldaysinmonth").value) * document.getElementById("total_payable_days").value);
round_off_hra=Math.round(cal_hra);
document.getElementById("hra_no").value=round_off_hra;

console.log(round_off_hra + 'hra' + hra + 'cal_hra' + cal_hra);
//Calculating hra according to total_payable_days.

//Count Special allowance.
var special_allowance=parseFloat(document.getElementById("special_all").value);
cal_special_allowance=((special_allowance / document.getElementById("totaldaysinmonth").value) * document.getElementById("total_payable_days").value);
round_off_special_allowance=Math.round(cal_special_allowance);
  
document.getElementById("special_all").value=round_off_special_allowance;
  
console.log(cal_special_allowance + 'special_allowance' + special_allowance);
//Count Special allowance.

//Count Other_all.
  var other_all=parseFloat(document.getElementById("other_all").value);
  cal_other_all=((other_all / document.getElementById("totaldaysinmonth").value) * document.getElementById("total_payable_days").value);
  round_off_otherall=Math.round(cal_other_all);
  document.getElementById("other_all").value=round_off_otherall;

  console.log(cal_other_all + 'other_all' + other_all);
//Count Other_all.

//Count gross_earning.
  cal_gross_earning=parseFloat(document.getElementById("basic").value) + parseFloat(document.getElementById("hra_no").value) + parseFloat(document.getElementById("special_all").value) + parseFloat(document.getElementById("other_all").value);
  round_off_grossearning=Math.round(cal_gross_earning);
  document.getElementById("gross_earning").value=cal_gross_earning;

  console.log(cal_gross_earning + 'gross_earning');
//Count gross_earning.

//Esic Calculation 0.75% EMPLOYEE CONTRIBUTION
    var esic_cal = (parseFloat(document.getElementById("gross_earning").value) * 0.75) / 100;
    var roundoff_esic = Math.round(esic_cal);
    document.getElementById("esi_amounttt").value=roundoff_esic;

    console.log(esic_cal + 'roundoff_esic' + roundoff_esic);
//Esic Calculation 0.75% EMPLOYEE CONTRIBUTION.

//PF Calculation 12% EMPLOYEE CONTRIBUTION.
    var ec_pf_total = (parseFloat(document.getElementById("basic").value) * 12) / 100;
    //var ec_pf_total = basicPay * 0.12;
    var roundoff_pf = Math.round(ec_pf_total);
    document.getElementById("Provident_fund").value = roundoff_pf;
    console.log('roundoff_pf' + ec_pf_total + 'ec_pf_total' + ec_pf_total + 'Basic Pay' + parseFloat(document.getElementById("basic").value) + 'Formula' + parseFloat(document.getElementById("basic").value) * 0.12);
//PF Calculation 12% EMPLOYEE CONTRIBUTION.

//Esic Calculation 3.25% ON EMPLOYER'S CONTRIBUTION & LEAVE DETAILS SECTION.
      var esic2 = (parseFloat(document.getElementById("gross_earning").value) * 3.25) / 100;
      var roundoff_esic_2 = Math.round(esic2);

      document.getElementById("esi_amounts").value=roundoff_esic_2;
      console.log(esic2 + 'roundoff_esic_2' + roundoff_esic_2);
//Esic Calculation 3.25% ON EMPLOYER'S CONTRIBUTION & LEAVE DETAILS SECTION.

//PF Calculation 13%.
    var ec_pf_total2 = parseFloat(document.getElementById("basic").value) * 0.13;
    var roundoff_pf2 = Math.round(ec_pf_total2);
    document.getElementById("Provident_funds").value=roundoff_pf2;

    console.log(ec_pf_total2 + 'ec_pf_total2' + ec_pf_total2);
//PF Calculation 13%.

//TOTAL DEDUCTION CALCULATION.
    var total_deduction = parseInt(document.getElementById("esi_amounttt").value) + parseInt(document.getElementById("Provident_fund").value);
    document.getElementById("deductions").value=total_deduction;

    console.log('total_deduction' + total_deduction);
//TOTAL DEDUCTION CALCULATION.

//Expense addition
var expenses = parseInt(document.getElementById("expenses").value);
if(expenses!=0)
{
  const expense_emp = parseInt(document.getElementById("total_payble").value) + parseInt(expenses);
  document.getElementById("total_payble").value=expense_emp;
  console.log('expense_emp' + expense_emp);
}
//Expense addition

//Count Over-Time.
var overtime_hours=parseInt(document.getElementById("overtime").value);
if(overtime_hours!=0)
  {
    over_time_cal();
  }
//Count Over-Time.

//Total Payable.
  total_payable=(parseInt(document.getElementById("gross_earning").value)) - (parseInt(document.getElementById("deductions").value));
  document.getElementById("total_payble").value=total_payable;

  console.log('total_payable' + total_payable);
//Total Payable.

              }


          };

          //xhttp.open("GET", "filename", true);
          xmlhttp.open("GET", "Pages/bind_value.php?user_id=" + str, true);
            
          //Sends the request to the server
          xmlhttp.send();
      }

    }//closing if statement of overtime!='' && expenses!='' && dateofsalarytrans!=''.
    else
    {
      alert("OTT(Over-Time),Expense Feild Should be blank.");
      return false;
    }

  }
</script>
<script type="text/javascript">
$(document).ready(function()
{
var emp_role=$("#pfc_role").val();

if(emp_role==2)
   {
        $("#singlebuttonedit").hide();
        $("#addsalary").hide();
   }

if(emp_role==1 || emp_role==5)
   {
        $("#singlebuttonedit").show();
        $("#addsalary").show();
   }

   if(emp_role==3 || emp_role==4)
   {
        $("#singlebuttonedit").hide();
        $("#addsalary").hide();
   }

});
</script>
<script type="text/Javascript">
function count_salary()
  {

    //LEAVE TAKEN CALCULATION
      var total_no_days = document.getElementById("month").value;
      var daysInput     = document.getElementById("total_payable_days").value;


  
  const dropdown = document.getElementById("month");
  const selectedMonth = parseInt(dropdown.value, 10);


  const currentYear = new Date().getFullYear();


  const date = new Date(currentYear, selectedMonth, 1);


  date.setMonth(date.getMonth() + 1);
  date.setDate(date.getDate() - 1);

  //LEAVE TAKEN CALCULATION

  }

</script>
<script>
  //Calculating over time.
  function over_time_cal()
  {
    //var totl_months_day=30;
    var totl_months_day=document.getElementById("total_payable_days").value;//salarmonth now it will calculate on total_payable_days
    var overtime_hours=document.getElementById("overtime").value;
    var cal_over_time;  
    var Gross_sal=document.getElementById("gross_earning").value; 

    cal_over_time=((Gross_sal/totl_months_day) * 8 ) * overtime_hours;//over-time  according to gross salary.
    //document.getElementById("monthly_ctc").value=Math.round(cal_over_time);
    document.getElementById("total_payble").value=Math.round(cal_over_time);
  }  
</script>
<script>
//Calculating total days in a month.
function salary_month() 
{
  // Get the selected month value from the dropdown
  const dropdown = document.getElementById("month");
  const selectedMonth = parseInt(dropdown.value, 10);

  // Get the current year
  const currentYear = new Date().getFullYear();

  // Create a new Date object with the selected year and month
  const date = new Date(currentYear, selectedMonth, 1);

  // Move to the next month and subtract 1 day to get the last day of the specified month
  date.setMonth(date.getMonth() + 1);
  date.setDate(date.getDate() - 1);

  // Return the day component of the last date
  const numberOfDays = date.getDate();
  document.getElementById("salarymonth").value=numberOfDays;
  console.log(numberOfDays);
}
</script>
<script type="text/Javascript">
  function calculateDays() {
    const monthSelect = document.getElementById('month');
    const selectedMonth = parseInt(monthSelect.value);
    const year = new Date().getFullYear(); // Use the current year

    const daysInMonth = getDaysInMonth(selectedMonth, year);
    const sundayCount = countSundaysInMonth(year, selectedMonth, daysInMonth);

    const textInput = document.getElementById('totaldaysinmonth');
    const sundayInput = document.getElementById('Sunday');

    textInput.value = daysInMonth;
    sundayInput.value = sundayCount;
}

function getDaysInMonth(month, year) {
    const lastDayOfMonth = new Date(year, month, 0).getDate();
    return lastDayOfMonth;
}

function countSundaysInMonth(year, month, daysInMonth) {
    let count = 0;

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month - 1, day); // Month is 0-indexed
        if (date.getDay() === 0) {
            count++;
        }
    }

    return count;
}

// Initially calculate the days and Sundays for the default selected month
calculateDays();
</script>
<script>
function cal_working_days()
{
  var total_no_days =document.getElementById("totaldaysinmonth").value;
  var leaves =document.getElementById("leaves").value;
  var holiday =document.getElementById("holiday").value;
  var Sunday  =document.getElementById("Sunday").value;
  var halfday  =document.getElementById("HalfDay").value;
  var OverTime  =document.getElementById("overtime").value;
  var working_days;

  working_days=parseInt(total_no_days)-(parseInt(leaves)+parseInt(holiday)+parseInt(Sunday)+parseInt(halfday)/2);

  document.getElementById("working_days").value=working_days;
  //console.log(working_days);

}
function CountDaysPayable(){
  var total_no_days =document.getElementById("totaldaysinmonth").value;
  var leaves =document.getElementById("leaves").value;
  var holiday =document.getElementById("holiday").value;
  var Sunday  =document.getElementById("Sunday").value;
  var cl  =document.getElementById("CL").value;
  var ml  =document.getElementById("ML").value;
  var halfday  =document.getElementById("HalfDay").value;
  var OverTime  =document.getElementById("overtime").value;
  var TotalPayableDays;

  TotalPayableDays=(parseInt(total_no_days)-(parseInt(leaves)+parseInt(holiday)+parseInt(Sunday)+parseInt(halfday)/2))+parseInt(holiday)+parseInt(Sunday)+parseInt(ml)+parseInt(cl)+parseInt(OverTime);

  

  document.getElementById("total_payable_days").value=TotalPayableDays;
}
</script>
