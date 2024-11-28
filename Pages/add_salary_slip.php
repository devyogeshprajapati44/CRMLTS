<?php
//error_reporting(0);
//session_start();
//error_reporting (E_ALL);
include 'connection.php';
include('pagi_script.php');
?>
<?php
 if(isset($_POST['Add'])) 
 {
  $emp_name = CF($_POST['emp_name'],$conn);
  //$emp_name = CF($_POST['em_id'],$conn);
  $desig_id = CF($_POST['desig_id'],$conn);
  $depart_id = CF($_POST['dept_id'],$conn);
  //$depart_id='';
  $project_name = CF($_POST['project_name'],$conn);
  $aadhar_no = CF($_POST['aadhar_no'],$conn);
  $pan_no = CF($_POST['pan_no'],$conn);
  $Esi_no = CF($_POST['Esi_no'],$conn);
  $pf_no = CF($_POST['pf_no'],$conn);
  $joining_date = CF($_POST['joining_date'],$conn);
  $father_name = CF($_POST['father_name'],$conn);
  $location = CF($_POST['location'],$conn);
  $account_number = CF($_POST['account_number'],$conn);
  $bank_name = CF($_POST['bank_name'],$conn);
  $branch_name = CF($_POST['branch_name'],$conn);
  $ifsc_code = CF($_POST['ifsc_code'],$conn);
  $basic = CF($_POST['basic'],$conn);
  $hra_no = CF($_POST['hra_no'],$conn);
  $cca = CF($_POST['cca'],$conn);
  $Provident_fund = CF($_POST['Provident_fund'],$conn);
  $advance = CF($_POST['advance'],$conn);
  $esi_amount = CF($_POST['esi_amount'],$conn);
  $special_all = CF($_POST['special_all'],$conn);
  $monthly_bonus = CF($_POST['monthly_bonus'],$conn);
  $other_all = CF($_POST['other_all'],$conn);

  $Professional_tax = CF($_POST['Professional_tax'],$conn);
  $lwa_amount = CF($_POST['lwa_amount'],$conn);
  $lop_amounts = CF($_POST['lop_amounts'],$conn);
  $gross_earning = CF($_POST['gross_earning'],$conn);

  $total_deductions = CF($_POST['total_deductions'],$conn);
  $salary_in_words = CF($_POST['salary_in_words'],$conn);
  $net_payble = CF($_POST['net_payble'],$conn);
  $Provident_funds = CF($_POST['Provident_funds'],$conn);
  $working_dayys = CF($_POST['working_days'],$conn);
  $esi_amounts = CF($_POST['esi_amounts'],$conn);
  $total_days = CF($_POST['totaldaysinmonth'],$conn);//saving total days in a month.
  $accident_insurance = CF($_POST['accident_insurance'],$conn);
  $leave_taken = CF($_POST['leaves'],$conn);
  $loss_of_pay = CF($_POST['loss_of_pay'],$conn);
  $total_contribution = CF($_POST['total_contribution'],$conn);
  $ctc_wages = CF($_POST['monthly_ctc'],$conn);
  // $date = date("Y-m-d h:i:s A");
  // $month=date("m");
  // $year=date("Y");
  $month=CF($_POST['month'],$conn);
  $year=CF($_POST['year'],$conn);

  $amount=CF($_POST["amount"],$conn);
  $gross_salary=CF($_POST["gross_salary"],$conn);
  $total_payble=CF($_POST["total_payble"],$conn);
  $dateofsalarytrans=CF($_POST["dateofsalarytrans"],$conn);
  $salary_mode=CF($_POST["salary_mode"],$conn);

  $over_time = CF($_POST['overtime'],$conn);//new added
  $expenses = CF($_POST['expenses'],$conn);//new added on 24-08-2023
  $deductions = CF($_POST['deductions'],$conn);//new added on 24-08-2023
  //expenses

  //New addded on 15-09-2023.
  $CL=CF($_POST["CL"],$conn);
  $ML=CF($_POST["ML"],$conn);
  $HalfDay = CF($_POST['HalfDay'],$conn);
  $holiday = CF($_POST['holiday'],$conn);
  $Sunday = CF($_POST['Sunday'],$conn);
  $status = '1'; //Active and 2 means De-active.
  //New addded on 15-09-2023.
 $sql_insert="INSERT INTO `add_salary_slip`(`user_id`, `desig_id`, `dept_id`, `project_name`, `location`, `account_number`, `bank_name`, `branch_name`, `ifsc_code`, `basic`, `hra_no`, `cca`, `Provident_fund@ 12%`, `advance`, `esi@ 0.75%`, `special_all(SPL)`, `monthly_bonus`, `other_all`, `Professional_tax`, `lwa_amount`, `lop_amounts`, `gross_earning`, `total_deductions`, `salary_in_words`, `net_payble`, `Provident_funds@ 13%`, `working_day`, `esi_@ 3.25%`, `total_days`, `accident_insurance`, `leaves`, `loss_of_pay`, `total_contribution`, `ctc_wages`, `month`, `year`, `amount`, `gross_salary`, `total_payble`, `date_of_salary_transfer`, `salary_release_mode`,`overtime`,`expenses`,`deductions`,`CL`, `ML`, `HalfDay`, `Holiday`, `Sunday`,`status`) 
 VALUES ('$emp_name',
 '$desig_id',
 '$depart_id',
 '$project_name',
 '$location',
 '$account_number',
 '$bank_name',
 '$branch_name',
 '$ifsc_code',
 '$basic',
 '$hra_no',
 '$cca',
 '$Provident_fund',
 '$advance',
 '$esi_amount',
 '$special_all',
 '$monthly_bonus',
 '$other_all',
 '$Professional_tax',
 '$lwa_amount',
 '$lop_amounts',
 '$gross_earning',
 '$total_deductions',
 '$salary_in_words',
 '$net_payble',
 '$Provident_funds',
 '$working_dayys',
 '$esi_amounts',
 '$total_days',
 '$accident_insurance',
 '$leave_taken',
 '$loss_of_pay',
 '$total_contribution',
 '$ctc_wages',
 '$month',
 '$year',
 '$amount',
 '$gross_salary',
 '$total_payble',
 '$dateofsalarytrans',
 '$salary_mode',
 '$over_time','$expenses','$deductions','$CL','$ML','$HalfDay','$holiday','$Sunday','$status')";
//  echo $sql_insert;
 //die;
$a=mysqli_query($conn,$sql_insert);
header("location:PFC.php?PageName=add_salary_slip");
  // if ($a == true) {
  //   header('location:view_salary_slip.php');
  //   echo "<script>alert('New Add Salary created successfully');</script>";
  //   } else {
  //   echo "<script>alert('Error: " . $arr . "<br>" . $a->error."');</script>";
  //   }
}

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
              <form method="POST">
                <a class="btn btn-warning text-black" href="PFC.php?PageName=add_salary_slip" style="font-size:large;height:39px;padding:6px;width:100px;margin-left:12px;" role="button">Back</a>
                  <input type="text" name="searchvalue" id="searchvalue" style="height:37px;padding:6px;width:300px;margin-left:6px;margin-top:14px;"  placeholder="Search Here...." value="">
                  <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="height:39px;padding:6px;width:97px;" value="Search" onclick="myFunction()">
              </form>
                       
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="float:right;margin-top:18px;margin-left:635px;display:none;" id="addsalary">+ Add Salary</button>
              
              <?php if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5)) { ?>
                <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#myModalmy"  style="margin-right:80px;margin-top:16px;">Export File</button>
                <h2 style="color:#012970;margin-left:684px;margin-top:-66px;"><b>ADD NEW EMPLOYEE</b></h2><br/><br/>

                <?php } if($_SESSION['PFC_EmpRole']==2)  { ?>
                <h2 style="color:#012970;margin-left:607px;margin-top:5px;"><b>VIEW SALARY SLIP</b></h2><br/><br/>    
                <?php } ?>                    
            </nav><br><br>
          <div class="card-body">
              <!-- Default Accordion -->
              <?php              
                    $months = array(1 => 'January',2 => 'February',3=> 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December');
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
                            <table id="myTabless11" class="table" style="width:100%">
                            <thead class="thead-pink">
                              <tr>
                                <th>S.No</th>
                                <th>Emp_Code</th>
                                <th>Emp Name</th>
                                <th>Paid Salary</th>
                                <th>Month/Year</th> 
                                <th>Designation/Department</th>   
                                <th style="text-align: center;"><b> Action</b></th>
                              </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $pfc_uid=$_SESSION['PFC_UID'];
                                  $sql_data="SELECT `asal`.`month`,`asal`.`month` FROM `add_salary_slip` `asal` LEFT JOIN `employee` `us` ON `asal`.`user_id`=`us`.`Id` LEFT JOIN `designation` `desig` ON `asal`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `asal`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `asal`.`status`=1  group by `asal`.`month`";
                                  $res = $conn->query($sql_data);
                                  $row_data = $res->fetch_assoc();
                                  $add_sal_month=$row_data["month"];

                                  if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                                  {
                                    if(isset($_POST["searchvalue"]))
                                    {
                                      $filtervalue=strtoupper($_REQUEST['searchvalue']);
                                      $sql = "SELECT `asal`.*, `us`.`Id`,`us`.`emp_code`,`us`.`emp_name`,CONCAT(DATE_FORMAT(CONCAT(`asal`.`year`, '-', `asal`.`month`, '-01'), '%M'), ' ', year) AS `month_and_year`,`asal`.`month`,`asal`.`year`,concat(`desig`.`Designation`, ' / ' ,`depart`.`department`) as `Desig_n_Depart`FROM `add_salary_slip` `asal` LEFT JOIN `employee` `us` ON `asal`.`user_id`=`us`.`Id` LEFT JOIN `designation` `desig` ON `asal`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `asal`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `asal`.`month`='$monthNum' AND (`us`.`emp_name` LIKE '%$filtervalue' OR `us`.`emp_name` LIKE '$filtervalue%' OR `us`.`emp_name` LIKE '%$filtervalue%') group by `asal`.`month`";                                    
                                    }
                                    else
                                    {
                                      $sql = "SELECT `asal`.*, `us`.`Id`,`us`.`emp_code`,`us`.`emp_name`,CONCAT(DATE_FORMAT(CONCAT(`asal`.`year`, '-', `asal`.`month`, '-01'), '%M'), ' ', year) AS `month_and_year`,`asal`.`month`,`asal`.`year`,concat(`desig`.`Designation`, ' / ' ,`depart`.`department`) as `Desig_n_Depart`FROM `add_salary_slip` `asal` LEFT JOIN `employee` `us` ON `asal`.`user_id`=`us`.`Id` LEFT JOIN `designation` `desig` ON `asal`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `asal`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `month`='$monthNum' AND `asal`.`status`=1  order by `us`.Id";
                                    }
                                  }
                                  elseif(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                                  {
                                    $sql = "SELECT `asal`.*, `us`.`Id`,`us`.`emp_code`,`us`.`emp_name`,CONCAT(DATE_FORMAT(CONCAT(`asal`.`year`, '-', `asal`.`month`, '-01'), '%M'), ' ', year) AS `month_and_year`,`asal`.`month`,`asal`.`year`,concat(`desig`.`Designation`, ' / ' ,`depart`.`department`) as `Desig_n_Depart`FROM `add_salary_slip` `asal` LEFT JOIN `employee` `us` ON `asal`.`user_id`=`us`.`Id` LEFT JOIN `designation` `desig` ON `asal`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `asal`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `month`='$monthNum' AND `us`.`Id`='".$_SESSION['PFC_UID']."' AND `asal`.`status`=1  order by `us`.Id desc";
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
                                      <td><?php echo $row["emp_code"];?></td>
                                      <td><?php echo $row["emp_name"];?></td>
                                      <td><?php echo $row["total_payble"];?></td>
                                      <td><?php echo $row["month_and_year"];?></td>
                                      <td><?php echo $row["Desig_n_Depart"];?></td>
                                      <td>
                                      <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Action
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:174px;height:49px;">
                                        <form method="POST">
                                        <?php if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5)) {?>
                                        <button id="singlebutton" name="empView" value="<?php echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn' onclick="PaySlip(this.value)">PaySlip</button>
                                        <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-success editbtn'>Edit</button>
                                        <button id="singlebuttonDelete" name="EmpDelete" value="<?php echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-warning Delete' style="margin-left: 109px;margin-top: -46px;">Delete</button>

                                        <input type="hidden" name="month_salary_month" id="month_salary_month" value="<?php echo $row["month"];?>">
                                        <input type="hidden" name="year_salary_year" id="year_salary_year" value="<?php echo $row["year"];?>">
                                        <?php } else {?>
                                          <button id="singlebutton" name="empView" value="<?php echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn' onclick="PaySlip(this.value)">PaySlip</button>
                                          <input type="hidden" name="month_salary_month" id="month_salary_month" value="<?php echo $row["month"];?>">
                                        <input type="hidden" name="year_salary_year" id="year_salary_year" value="<?php echo $row["year"];?>">
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
 <div class="modal fade" id="myModalmy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabelmy" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action="Pages/export_attendance_data_monthwise.php"  method="GET">
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabelmy"><u>Attendence Report Excel:-</u></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <!-- <div class="col-4">
                             <label for="text" class="form-label">EMPLOYEE-NAME:</label>
                              <select name="emp_id" class="fstdropdown-select" id="emp_id">
                                  <option value="NA">SELECT EMPLOYEE NAME</option>
                                  <?php  
                                        //$sql="SELECT `Id`,`emp_code`,`emp_name` FROM `employee` ORDER BY `Id` DESC";
                                        //$result = mysqli_query($conn, $sql);
                                        //while( $row = mysqli_fetch_array($result))
                                        //{
                                    ?>
                                  <option value="<?php //echo $row["Id"];?>"><?php //echo $row["emp_name"];?></option>
                                  <?php //} ?>
                              </select>
                             </div> -->
                             <div class="col-6">
                              <label for="text" class="form-label">Month:</label>
                                 <select name="month" class="month  form-control select_type" id="months">
                                    <option value="NA">SELECT MONTHS</option>
                                    <?php for ($i = 1; $i <= 12; $i++) { $month = date('F', mktime(0, 0, 0, $i, 1, 2011)); ?>
                                          <option value="<?php echo $i; ?>"><?php echo $month; ?></option>
                                    <?php } ?>
                               </select>
                               </div>
                              <div class="col-6">
                              <label for="text" class="form-label">Year:</label>
                                <select name="Year" class="Year form-control select_type" id="Year">
                                  <option value="NA">SELECT YEARS</option>
                                  <?php for($n=2022;$n<=2050;$n++) { ?>
                                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                  <?php } ?>
                              </select>
                              </div>
                            </div><br/>
                            <!-- <div class="row">
                            <div class="col-6">
                               <label for="text" class="form-label">Date To:</label>
                              <input type="date" name="date_to" class="form-control" id="date_to" format="Y-m-d">
                             </div>
                             <div class="col-6">
                              <label for="text" class="form-label">Date From:</label>
                              <input type="date" name="date_from" class="form-control" id="date_from" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                            </div>
                         </div> -->
                      </div>
                    </div>
                   <div class="modal-footer">
                  <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
                  <input type="submit" id="submit"  name="getreport" class="btn btn-primary add_role" value="GET EXCEL">
                </div>
              </form>
             </div>
            </div>
            </div>
            </div>
           <!---- Excelmodal--->
  
  <!--table start search data--->
  
                        <!--table start search data--->
      <!-- Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <Form  method="POST" >
        <div class="modal-header">
              <!-- <legend class="card-title"  id="myModalLabel"><u style="color:blue;">Add Salary :-</u></legend> -->
              <h2 style="color:#012970;"class="scheduler-border mt-2" id="myModalLabel">Add Salary</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- <legend class="scheduler-border mt-2">&nbsp;&nbsp;<u style="color:blue;">EMPLOYEE DETAILS:-</u></legend> -->
        <!-- <h2 style="color:#012970;" class="scheduler-border mt-2" class="card-title"  id="myModalLabel">EMPLOYEE DETAILS</h2> -->
        <div class="modal-body">
                          <div class="form-group">
                          <div class="row">
                          <div class="col-4">
                                        <label for="emp_id" class="form-label">Select Employee * </label>
                                        <select name="emp_name"  class="fstdropdown-select form-control emp_name" id="emp_name" data-live-search="true"  data-size="8" tabindex="null" required>
                                            <option value="NA">Select Employee</option>
                                            <?php 
                                                $sql="SELECT * FROM `employee` where `Id`!='1' and `emp_status`='1'";
                                                $result = mysqli_query($conn,$sql);
                                                while( $row = mysqli_fetch_array($result))
                                                {
                                             ?>
                                            <option value="<?php echo $row["Id"];?>"><?php echo $row["emp_name"];?></option>
                                          <?php } ?>
                                    </select>
                                    <input type="hidden" name="em_id" id="em_id">
                                    </div>
                                      <div class="col-4">
                                        <label for="text" class="form-label">Month <span style="color: red">*</span></label>
                                        <select class="month form-control" name="month" id="month" required>
                                        <!-- onchange="salary_month()" -->
                                        <option value="NA">--SELECT MONTH--</option>
                                        <?php
                                        $months = array(1 => 'January',2 => 'February',3 => 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December');
                                        foreach($months as $monthNum => $monthName) { ?>
                                          <option value="<?php echo $monthNum; ?>"><?php echo $monthName; ?></option>
                                        <?php } ?>
                                      </select>
                                      </div>
                                      <div class=" col-4">
                                        <label for="text" class="form-label">Year <span style="color: red">*</span></label>
                                        <select class="year form-control" name="year" id="year" onchange="calculateDays()" required>
                                        <option value="NA">--SELECT YEAR--</option>
                                        <?php
                                            for($n=2022;$n<=2050;$n++)
                                            {
                                        ?>
                                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                      <?php
                                            }
                                      ?>
                                      </select>
                                      </div>
                                      </div>
                                      </br><!-- </br> -->
                                 <div class="row">
                                 <div class="col-3">
                                              <label for="text" class="form-label">Total Days In Month <span style="color: red">*</span></label>
                                              <input type="text" class="totaldaysinmonth form-control" name="totaldaysinmonth" id="totaldaysinmonth" required readonly>
                                          </div>
                                 
                                  
                                <div class="col-3"><!--Leave new added-->
                                              <label for="text" class="form-label">Leaves <span style="color: red">*</span></label>
                                              <input type="text" class="working_day form-control" name="leaves" id="leaves" value="0" required>
                                 </div>
                                 <div class="col-3">
                                              <label for="text" class="form-label">CL<span style="color: red">*</span></label>
                                              <input type="text" class="CL form-control" name="CL" id="CL" value="0" required>
                                 </div>
                                 <div class="col-3">
                                              <label for="text" class="form-label">ML<span style="color: red">*</span></label>
                                              <input type="text" class="ML form-control" name="ML" id="ML" value="0" required>
                                 </div>
                                 <div class="col-3">
                                              <label for="text" class="form-label" style="margin-top: 9px;">OT(Over Time in Days) <span style="color: red;">*</span></label>
                                              <input type="text" class="working_day form-control" name="overtime" id="overtime" value="0">
                                              <!-- onkeyup="over_time_cal()" -->
                                 </div>
                                 <div class="col-3">
                                                <label for="text" class="form-label" style="margin-top: 9px;">Half Day <span style="color: red">*</span></label>
                                                <input type="text" class="HalfDay form-control" name="HalfDay" id="HalfDay" value="0" required>
                                  </div>
                                  <div class="col-3">
                                                <label for="text" class="form-label" style="margin-top: 9px;">Holiday <span style="color: red">*</span></label>
                                                <input type="text" class="holiday form-control" name="holiday" id="holiday" value="0" required>
                                  </div><br>
                                  <div class="col-3">
                                                <label for="text" class="form-label" style="margin-top: 9px;">Sunday <span style="color: red">*</span></label>
                                                <input type="text" class="Sunday form-control" name="Sunday" id="Sunday"  value="0"  required>
                                  </div>
                                </div><br></br>
                                 <div class="row">
                                 
                                 <div class="col-4">
                                              <label for="text" class="form-label">Working Days <span style="color: red">*</span></label>
                                              <input type="text" class="working_days form-control" name="working_days" id="working_days" value="0" onclick="cal_working_days()" required> 
                                          </div>
                                 
                                  <div class="col-4">
                                                <label for="text" class="form-label">Total Days Payable <span style="color: red">*</span></label>
                                                <input type="text" class="total_payable_days form-control" name="total_payable_days" id="total_payable_days" onclick="CountDaysPayable()" required readonly>
                                                <input type="hidden" class="total_payable_days form-control" name="salarymonth" id="salarymonth">
                                  </div>
                                 <div class="col-4">
                                                <label for="text" class="form-label">Expenses <span style="color: red">*</span></label>
                                                <input type="text" class="expenses form-control" name="expenses" id="expenses" value="0" required>
                                  </div>
                                </div><br><br>
                               <center> <button type="button" class="btn btn-success" name="salary_mode" id="salary_mode" onclick="GetDetail()">Calculation</button></center>
                                <br><!-- <hr> -->
                                  <div class="row">
                                  <div class="col-4">
                                        <label for="desig_id" class="form-label"> Designation </label>
                                        <input type="text" name="desig_id"  class="desig_id form-control" id="desig_id" readonly>
                                        <input type="hidden" name="desg_idd"  class="desg_idd form-control" id="desg_idd">
                                        <input type="hidden" name="dept_id"  class="dept_id form-control" id="dept_id">
                                    </div>
                                  <div class="col-4">
                                        <label for="project_name" class="form-label">Project Name <span style="color: red">*</span></label>
                                        <input type="text" class="project_name form-control" name="project_name" id="project_name" readonly>
                                    </div>
                                      <div class="col-4">
                                          <label for="aadhar_no" class="form-label">Aadhar No<span style="color: red">*</span></label>
                                          <input type="text" class="aadhar_no form-control" name="aadhar_no" id="aadhar_no"  placeholder="Enter Aadhar No" readonly>
                                      </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-4">
                                          <label for="text" class="form-label">PAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="pan_no form-control"  placeholder="Enter PAN No "  maxlength="10" name="pan_no" id="pan_no" readonly>
                                      </div>
                                    <div class="col-4">
                                          <label for="uan_no" class="form-label">UAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="uan_no form-control"   placeholder="Enter UAN No " name="uan_no" id="uan_no" readonly>
                                      </div>
                                        <div class="col-4">
                                            <label for="Esi_no" class="form-label">ESI No <span style="color: red">*</span></label>
                                            <input type="text" class="Esi_no form-control" name="Esi_no" maxlength="10" placeholder="Enter ESI No" id="Esi_no" readonly>
                                        </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                  <div class="col-4">
                                            <label for="pf_no" class="form-label">PF No <span style="color: red">*</span></label>
                                            <input type="text"  class="pf_no form-control"  placeholder="Enter PF No" name="pf_no" id="pf_no" readonly>
                                        </div>
                                  <div class="col-4">
                                        <label for="text" class="form-label">Date Of Joining <span style="color: red">*</span></label>
                                        <input type="text" name="joining_date" class="joining_date  form-control"  id="joining_date" readonly>
                                    </div>
                                      <div class="col-4">
                                          <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                          <input type="text" name="father_name" class="father_name  form-control"  id="father_name" readonly>
                                      </div>
                                  </div>
                                <br>
                                  <div class="row">
                                  <div class="col-4">
                                          <label for="text" class="form-label">Location <span style="color: red">*</span></label>
                                          <input type="text" name="location" class="location   form-control"  id="location" readonly>
                                      </div>
                                  <div class=" col-4">
                                        <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                        <input type="text" class="account_number form-control" name="account_number" id="account_number" readonly>
                                    </div>
                                      <div class="col-4">
                                        <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                        <input type="text" class="bank_name form-control" name="bank_name" id="bank_name" readonly>
                                      </div>
                                      </div><br>
                                      <div class="row">
                                      <div class="col-6">
                                        <label for="text" class="form-label">Branch Name <span style="color: red">*</span></label>
                                        <input type="text" class="branch_name form-control" name="branch_name" id="branch_name" readonly>
                                      </div>
                                      <div class="col-6">
                                        <label for="text" class="form-label">IFSC Code <span style="color: red">*</span></label>
                                        <input type="text" class="ifsc_code form-control" name="ifsc_code" id="ifsc_code" readonly>
                                      </div>
                                      </div><br>
 <br>                                                                        
          <!--Bank Details Start-->
                              <fieldset class="scheduler-border">
                                  <!-- <legend class="scheduler-border mt-2">EARNINGS & DEDUCTIONS</legend> -->
                                  <legend class="scheduler-border mt-2"><u style="color:blue;">EMPLOYEE SALARY:-</u></legend>
                                  <div class="row">
                                      <div class="col mt-3">
                                          <div class="row">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">BASIC<span style="color: red">*</span></label>
                                                  <input type="text" class="basic form-control" name="basic" id="basic" placeholder="Enter basic" readonly>
                                                  <input type="hidden" class="basic form-control" name="basic1" id="basic1"  placeholder="Enter basic" readonly>
                                                  <input type="hidden" class="basic form-control" name="basic_count" id="basic_count">
                                                  <!-- onclick="count_salary()" -->
                                                </div>
                                              <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label>
                                                  <input type="text" class="hra_no form-control" name="hra_no"  id="hra_no" readonly>
                                                  <input type="hidden" class="hra_no form-control" name="hra_no1"  id="hra_no1">
                                              </div>
                                              <div class="col-4">
                                                <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                <input type="text" class="special_all form-control" name="special_all"  id="special_all" readonly>
                                            </div>
                                              <div class="col-4">
                                                <!-- <label for="text" class="form-label">CCA <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="cca form-control" name="cca" id="cca" value="0" readonly>
                                            </div>
                                          </div><br>
                                          <div class="row">
                                          <div class="col-6">
                                                <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                <input type="text" class="other_all form-control" name="other_all"  id="other_all" readonly>
                                            </div>
                                           
                                            <div class="col-6">
                                                <label for="text" class="form-label" style="color: red"><b>Gross Earning </b><span style="color: red">*</span></label>
                                                <input type="text" class="gross_earning form-control" name="gross_earning" id="gross_earning" >
                                            </div>
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">Advance <span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="advance form-control" name="advance" id="advance" value="0" readonly>
                                              </div>
                                          </div><br>
                                          <div class="row">
                                            <!-- <div class="col-4">
                                                <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                <input type="text" class="special_all form-control" name="special_all"  id="special_all" readonly>
                                            </div> -->
                                            <!-- <div class="col-4">
                                                <label for="text" class="form-label">Gross Earning<span style="color: red">*</span></label>
                                                <input type="text" class="gross_earning form-control" name="gross_earning" id="gross_earning" >
                                            </div> -->
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="monthly_bonus form-control" name="monthly_bonus" id="monthly_bonus" value="0" readonly>
                                            </div>
                                            <!-- <div class="col-4">
                                                <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                <input type="text" class="other_all form-control" name="other_all"  id="other_all" readonly>
                                            </div> -->
                                          </div><br>
          
                                          <div class="row">
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">Professional Tax<span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="Professional_tax form-control" name="Professional_tax" id="Professional_tax" value="0" readonly>
                                              </div>
          
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">LWF <span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="lwa_amount form-control" name="lwa_amount" id="lwa_amount" value="0" readonly>
                                              </div>
          
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">LOP <span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="lop_amounts form-control" name="lop_amounts" id="lop_amounts"  value="0" readonly>
                                              </div>
                                          </div><br>
                                          <div class="row">
                                            <!-- <div class="col-3">
                                                <label for="text" class="form-label">TOTAL EARNINGS<span style="color: red">*</span></label>
                                                <input type="text" class="gross_earning form-control" name="gross_earning" id="gross_earning" >
                                            </div> -->
        
                                            <div class="col-3">
                                                <!-- <label for="text" class="form-label">TOTAL DEDUCATIONS <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="total_deductions form-control" name="total_deductions" id="total_deductions" value="0">
                                            </div>
        
                                            <!-- <div class="col-3"> -->
                                                <!-- <label for="text" class="form-label">Salary in words<span style="color: red">*</span></label> -->
                                                <!-- <input type="hidden" class="salary_in_words form-control" name="salary_in_words"  id="salary_in_words" value="0">
                                            </div> -->
                                            <div class="col-3">
                                                <!-- <label for="text" class="form-label">NET PAYABLE <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="net_payble form-control" name="net_payble"  id="net_payble" value="0">
                                            </div>
                                        </div>
                                      </div>

                                  </div>
                              </fieldset>

                              <fieldset class="scheduler-border">
                                <!-- <legend class="scheduler-border mt-2">EMPLOYER'S CONTRIBUTION  & LEAVE DETAILS</legend> -->
                                <legend class="scheduler-border mt-2"><u style="color:blue;">EMPLOYEE CONTRIBUTION:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <div class="row">
                                        <div class="col-6">
                                                  <label for="text" class="form-label">ESI@ 0.75% <span style="color: red">*</span></label>
                                                  <input type="text" class="esi_amount form-control" name="esi_amount"   id="esi_amounttt" readonly>
                                                  <input type="hidden" class="esi_amount1 form-control" name="esi_amount1"   id="esi_amounttt1" readonly>
                                              </div>
                                              <div class="col-6">
                                                  <label for="text" class="form-label">Provident_fund@12%<span style="color: red">*</span></label>
                                                  <input type="text" class="Provident_fund form-control" name="Provident_fund" id="Provident_fund" readonly>
                                              </div>
                                              </div><br>
                                              <div class="row">
                                            <!-- <div class="col-6">
                                              <label for="text" class="form-label">Working Days <span style="color: red">*</span></label>
                                              <input type="text" class="working_days form-control" name="working_days" id="working_days">
                                          </div> -->
                                        </div>
                                        <!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label> -->
                                                <input type="hidden" class="accident_insurance form-control" name="accident_insurance" id="accident_insurance" value="0" readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Leave Taken <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="leave_taken form-control" name="leave_takenn" id="leave_takenn"  readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Loss of Pay <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="loss_of_pay form-control" name="loss_of_pay" value="0" readonly>
                                            </div>
                                        </div><!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">TOTAL CONTRIBUTION <span style="color: red">*</span></label> -->
                                                <!-- <input type="hidden" class="total_contribution form-control" name="total_contribution" id="total_contribution" value="0"> -->
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">MONTHLY CTC <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="monthly_ctc form-control" name="monthly_ctc" id="monthly_ctc" value="0">
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Amount <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="amount form-control" name="amount" value="0">
                                            </div>
                                        </div><!-- <br><br>-->
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- <label for="text" class="form-label">Gross_Salary <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="gross_salary form-control" name="gross_salary" id="gross_salary" value="0">
                                            </div>
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Total_Payble <span style="color: red">*</span></label>
                                                <input type="text" class="total_payble form-control" name="total_payble" id="total_payble" onkeyup="emp_contri()">
                                            </div> -->
                                        </div><!-- <br><br>-->
                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Date Of Salary Transfer<span style="color: red">*</span></label>
                                                <input type="date" class="dateofsalarytrans form-control" name="dateofsalarytrans" id="dateofsalarytrans" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Salary Release Mode <span style="color: red">*</span></label>
                                                <select class="salary_mode form-control" name="salary_mode" id="salary_mode" required>
                                                 <option value="NA">--SELECT--</option>
                                                 <option value="CASH">CASH</option>
                                                 <option value="NEFT">NEFT</option>
                                                 <option value="CHEQUE">CHEQUE</option>
                                                </select>
                                            </div> -->
                                        <!-- </div>   -->
                                        <!-- <br><br>-->
                                    </div>
                                </div>
                            </fieldset><br/>
                              <!-- <br> -->
                              <fieldset class="scheduler-border">
                                <!-- <legend class="scheduler-border mt-2">EMPLOYER'S CONTRIBUTION  & LEAVE DETAILS</legend> -->
                                <legend class="scheduler-border mt-2"><u style="color:blue;">EMPLOYER'S CONTRIBUTION:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <div class="row">
                                          <div class="col-6">
                                                <label for="text" class="form-label">ESI@ 3.25% <span style="color: red">*</span></label>
                                                <input type="text" class="esi_amounts form-control" name="esi_amounts" id="esi_amounts" readonly>
                                                <input type="hidden" class="esi_amounts1 form-control" name="esi_amounts1" id="esi_amounts1" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Provident_funds@ 13%<span style="color: red">*</span></label>
                                                <input type="text" class="Provident_funds form-control" name="Provident_funds" id="Provident_funds" readonly>
                                            </div>
                                            <div class="col-4">
                                              <!-- <label for="text" class="form-label">Working Days <span style="color: red">*</span></label> -->
                                              <input type="hidden" class="working_day form-control" name="working_day" id="working_day" value="0" readonly>
                                          </div>
                                        </div>
                                        <!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label> -->
                                                <input type="hidden" class="accident_insurance form-control" name="accident_insurance" id="accident_insurance" value="0" readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Leave Taken <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="leave_taken form-control" name="leave_takennn" id="leave_takennn" readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Loss of Pay <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="loss_of_pay form-control" name="loss_of_pay" value="0" readonly>
                                            </div>
                                        </div><!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">TOTAL CONTRIBUTION <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="total_contribution form-control" name="total_contribution" id="total_contribution" value="0">
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">MONTHLY CTC <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="monthly_ctc form-control" name="monthly_ctc" id="monthly_ctc" value="0">
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Amount <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="amount form-control" name="amount" value="0">
                                            </div>
                                        </div><!-- <br><br>-->
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- <label for="text" class="form-label">Gross_Salary <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="gross_salary form-control" name="gross_salary" id="gross_salary" value="0">
                                            </div>
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Total_Payble <span style="color: red">*</span></label>
                                                <input type="text" class="total_payble form-control" name="total_payble" id="total_payble" onkeyup="emp_contri()">
                                            </div> -->
                                        </div><!-- <br><br>-->
                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Date Of Salary Transfer<span style="color: red">*</span></label>
                                                <input type="date" class="dateofsalarytrans form-control" name="dateofsalarytrans" id="dateofsalarytrans" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Salary Release Mode <span style="color: red">*</span></label>
                                                <select class="salary_mode form-control" name="salary_mode" id="salary_mode" required>
                                                 <option value="NA">--SELECT--</option>
                                                 <option value="CASH">CASH</option>
                                                 <option value="NEFT">NEFT</option>
                                                 <option value="CHEQUE">CHEQUE</option>
                                                </select>
                                            </div> -->
                                        <!-- </div>   -->
                                        <!-- <br><br>-->
                                    </div>
                                </div>
                            </fieldset><br/>
                            
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2"><u style="color:blue;">DEDUCTIONS:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <!-- <br> -->
                                        <div class="row">
                                        <div class="col-12">
                                                <label for="text" class="form-label" style="color: red"><b>Deductions</b> <span style="color: red">*</span></label>
                                                <input type="text" class="deductions form-control" name="deductions" id="deductions">
                                                <!-- onkeyup="emp_contri()" -->
                                            </div>
                                        </div>
                                        <!-- <br><br> -->
                                    </div>
                                </div>
                            </fieldset><br/>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2"><u style="color:blue;">NET PAYABLE:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <!-- <br> -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="text" class="form-label" style="color: red"><b>Total_Payble </b><span style="color: red">*</span></label>
                                                <input type="text" class="total_payble form-control" name="total_payble" id="total_payble">
                                                <!-- onclick="emp_contri()" -->
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Total_Payble in words<span style="color: red">*</span></label>
                                                <input type="text" class="salary_in_words form-control" name="salary_in_words"  id="salary_in_words" placeholder="Total_Payble in words" value="0">
                                            </div>
                                        </div>
                                        <!-- <br><br> -->
                                    </div>
                                </div>
                            </fieldset><br/>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2"><u style="color:blue;">TRANSFER DETAILS:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <br>
                                        <div class="row">
                                        <div class="col-6">
                                                <label for="text" class="form-label">Date Of Salary Transfer<span style="color: red">*</span></label>
                                                <input type="date" class="dateofsalarytrans form-control" name="dateofsalarytrans" id="dateofsalarytrans" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Salary Release Mode <span style="color: red">*</span></label>
                                                <select class="salary_mode form-control" name="salary_mode" id="salary_mode"  required>
                                                 <option value="NA">--SELECT--</option>
                                                 <!-- <option value="CASH">CASH</option> -->
                                                 <option value="NEFT">NEFT</option>
                                                 <!-- <option value="CHEQUE">CHEQUE</option> -->
                                                </select>
                                            </div>
                                        </div><br><br>
                                    </div>
                                </div>
                            </fieldset>
                          </div>
                       <div class="modal-footer">
                      <input type="button" class="btn btn-primary" data-bs-dismiss="modal" value="Cancel">
                      <!-- <input type="reset" class="btn btn-primary" value="Reset"> -->
                      <input type="submit" id="submit"  name="Add" class="btn btn-primary add_desig" value="Add">
                  </div>
              </form>
           </div>
        </div> 
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
          $monthss=$_REQUEST["month_salary_month"]; 
          $Years=$_REQUEST["year_salary_year"]; 
          $EID=EDV($id,1);
          $MONTHID=EDV($monthss,1);
          $YEARID=EDV($Years,1);
          header("location:PFC.php?PageName=Edit_Salary&EmpID=".$EID."&month=".$MONTHID."&year=".$YEARID);
        }

        if(isset($_POST["empView"]))
        {
          $id=$_REQUEST["empView"]; 
          $monthss=$_REQUEST["month_salary_month"]; 
          $Years=$_REQUEST["year_salary_year"]; 
          $EID=EDV($id,1);
          $MONTHID=EDV($monthss,1);
          $YEARID=EDV($Years,1);
          header("location:PFC.php?PageName=print_payslip&EmpID=".$EID."&month=".$MONTHID."&year=".$YEARID);
        }
        if(isset($_POST["EmpDelete"]))
        {
          $id=$_REQUEST["EmpDelete"]; 
          $monthss=$_REQUEST["month_salary_month"]; 
          $Years=$_REQUEST["year_salary_year"]; 
          $EID=EDV($id,1);
          $MONTHID=EDV($monthss,1);
          $YEARID=EDV($Years,1);
          header("location:PFC.php?PageName=delete_salary&EmpID=".$EID."&month=".$MONTHID."&year=".$YEARID);
        }
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
                  document.getElementById("dept_id").value = myObj[27];
                  
                  document.getElementById("Provident_fund").value = myObj[21];
                  document.getElementById("esi_amounttt1").value = myObj[22];
                  document.getElementById("esi_amounts1").value = myObj[23];
                  document.getElementById("total_payble").value = myObj[26];
                  document.getElementById("Provident_funds").value = myObj[24];

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
if(parseInt(myObj[22])!='0' || parseInt(myObj[22])!='')
{
    var esic_cal = (parseFloat(document.getElementById("gross_earning").value) * 0.75) / 100;
    var roundoff_esic = Math.round(esic_cal);
    document.getElementById("esi_amounttt").value=roundoff_esic;

    console.log(esic_cal + 'roundoff_esic' + roundoff_esic);
//Esic Calculation 0.75% EMPLOYEE CONTRIBUTION.

//PF Calculation 12% EMPLOYEE CONTRIBUTION.
    var basicPay = parseFloat(document.getElementById("basic").value);
    var ec_pf_total = basicPay * 0.12;
    var roundoff_pf = Math.round(ec_pf_total);
    document.getElementById("Provident_fund").value = roundoff_pf;
    console.log('roundoff_pf' + ec_pf_total + 'ec_pf_total' + ec_pf_total + 'Basic Pay' + parseFloat(document.getElementById("basic").value) + 'Formula' + parseFloat(document.getElementById("basic").value) * 0.12);
//PF Calculation 12% EMPLOYEE CONTRIBUTION.
}
else
{
  document.getElementById("esi_amounttt").value=parseInt(myObj[22]);
}
if(parseInt(myObj[23])!='0' || parseInt(myObj[23])!=''){
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
}
else
{
  document.getElementById("esi_amounts").value=parseInt(myObj[23]);
}
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
          //xmlhttp.open("GET", "Pages/bind_value.php?user_id=" + str, true);
          xmlhttp.open("GET", "Script/bind_add_salary_data.php?user_id=" + str, true);
            
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
function cal_working_days() {
  var total_no_days_1 = document.getElementById("totaldaysinmonth").value;
  var leaves_1 = document.getElementById("leaves").value;
  var cl_1 = document.getElementById("CL").value;
  var ml_1 = document.getElementById("ML").value;
  var holiday_1 = document.getElementById("holiday").value;
  var sunday_1 = document.getElementById("Sunday").value;
  var half_day_1 = document.getElementById("HalfDay").value;
  var working_days;

  working_days = parseInt(total_no_days_1) - (parseInt(leaves_1)) - (parseInt(holiday_1)) - (parseInt(sunday_1)) - (parseInt(cl_1)) - (parseInt(ml_1)) - (parseInt(half_day_1) / 2);

  document.getElementById("working_days").value = working_days;
  // console.log(working_days);
  CountDaysPayable();
}

function CountDaysPayable(){
  var total_no_days =document.getElementById("working_days").value;
  var leaves =document.getElementById("leaves").value;
  var holiday =document.getElementById("holiday").value;
  var Sunday  =document.getElementById("Sunday").value;
  var cl  =document.getElementById("CL").value;
  var ml  =document.getElementById("ML").value;
  var halfday  =document.getElementById("HalfDay").value;
  //var OverTime  =document.getElementById("overtime").value;
  var TotalPayableDays;

  TotalPayableDays=(parseInt(total_no_days)) + (parseInt(leaves)) + (parseInt(holiday)) + (parseInt(Sunday)) + (parseInt(halfday)/2) + (parseInt(ml)) + (parseInt(cl));
  document.getElementById("total_payable_days").value=TotalPayableDays;

}
</script>
