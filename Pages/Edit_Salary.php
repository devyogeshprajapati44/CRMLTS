<?php
//error_reporting(0);

include 'connection.php';

$EmpID=$_REQUEST["EmpID"];
$monthid=$_REQUEST["month"];
$yearid=$_REQUEST["year"];
$EmpID=EDV($EmpID,2);
$MonthID=EDV($monthid,2);
$YearID=EDV($yearid,2);

//echo "SELECT `msd`.*,`us`.`Id`, `us`.`emp_name`,`us`.`desig_id`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation`,`addsal`.`Idd`,`addsal`.`dept_id`,`addsal`.`project_name`,`addsal`.`location`,`addsal`.`account_number`,`addsal`.`bank_name`, `addsal`.`branch_name`, `addsal`.`ifsc_code`, `addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`loss_of_pay`, `addsal`.`total_contribution`, `addsal`.`ctc_wages`, `addsal`.`month`, `year`, `addsal`.`amount`, `addsal`.`gross_salary`, `addsal`.`total_payble`, `addsal`.`date_of_salary_transfer`, `addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` where `us`.`Id`='$EmpID' AND `month`='$MonthID' AND `year`='$YearID'";
// ECHO "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`desig_id`,`us`.`father_name`, `us`.`emp_id`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation`,`addsal`.`Idd`,`addsal`.`dept_id`,`addsal`.`project_name`,`addsal`.`location`,
// `addsal`.`account_number`,`addsal`.`bank_name`, `addsal`.`branch_name`, `addsal`.`ifsc_code`, `addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`total_earninig`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`leave_taken`, `addsal`.`loss_of_pay`, `addsal`.`total_contribution`, `addsal`.`ctc_wages`, `addsal`.`month`, `year`, `addsal`.`amount`, `addsal`.`gross_salary`, `addsal`.`total_payble`, `addsal`.`date_of_salary_transfer`, `addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id`  where `us`.`Id`='$EmpID'";
// die;

//$fetch   = mysqli_query($conn, "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`desig_id`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation`,`addsal`.`Idd`,`addsal`.`dept_id`,`addsal`.`project_name`,`addsal`.`location`,
//`addsal`.`account_number`,`addsal`.`bank_name`, `addsal`.`branch_name`, `addsal`.`ifsc_code`, `addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`loss_of_pay`, `addsal`.`total_contribution`, `addsal`.`ctc_wages`, `addsal`.`month`, `year`, `addsal`.`amount`, `addsal`.`gross_salary`, `addsal`.`total_payble`, `addsal`.`date_of_salary_transfer`, `addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id`  where `us`.`Id`='$EmpID'");
//$fetch   = mysqli_query($conn, "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`desig_id`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation`,`addsal`.`Idd`,`addsal`.`dept_id`,`addsal`.`project_name`,`addsal`.`location`,
//`addsal`.`account_number`,`addsal`.`bank_name`, `addsal`.`branch_name`, `addsal`.`ifsc_code`, `addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`loss_of_pay`, `addsal`.`total_contribution`, `addsal`.`ctc_wages`, `addsal`.`month`, `year`, `addsal`.`amount`, `addsal`.`gross_salary`, `addsal`.`total_payble`, `addsal`.`date_of_salary_transfer`, `addsal`.`salary_release_mode`,`msd`.`total_benefit_monthly`,`msd`.`gross_pay_monthly` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` where `us`.`Id`='$EmpID'");
//echo $sql="SELECT `msd`.*,`us`.`Id`, `us`.`emp_name`,`us`.`desig_id`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation`,`addsal`.`Idd`,`addsal`.`dept_id`,`addsal`.`project_name`,`addsal`.`location`,`addsal`.`account_number`,`addsal`.`bank_name`, `addsal`.`branch_name`, `addsal`.`ifsc_code`, `addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`loss_of_pay`, `addsal`.`total_contribution`, `addsal`.`ctc_wages`, `addsal`.`month`, `year`, `addsal`.`amount`, `addsal`.`gross_salary`, `addsal`.`total_payble`, `addsal`.`date_of_salary_transfer`, `addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` where `us`.`Id`='$EmpID' AND `month`='$MonthID' AND `year`='$YearID'";
$fetch   = mysqli_query($conn, "SELECT `msd`.*,`us`.*,`us`.`Id` as `empID`, `desig`.`Designation`,`addsal`.* FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` where `us`.`Id`='$EmpID' AND `month`='$MonthID' AND `year`='$YearID'");
$rowdata = mysqli_fetch_array($fetch);

//update code start here.
if(isset($_POST['update']))
{
    $emp_name=CF($_POST["empployeename"],$conn);
    //$emp_id=CF($_POST["empid"],$conn);
    $desig_id=CF($_POST["desig_id"],$conn);
    $project_name=CF($_POST["project_name"],$conn);
    $adhar_no=CF($_POST["adhar_no"],$conn);
    $pan_no=CF($_POST["pan_no"],$conn);
    $uan_no=CF($_POST["uan_no"],$conn);
    $Esi_no=CF($_POST["Esi_no"],$conn);
    $pf_no=CF($_POST["pf_no"],$conn);
    $joining_date=CF($_POST["joining_date"],$conn);
    $father_name=CF($_POST["father_name"],$conn);
    $Location=CF($_POST["location"],$conn);
    $account_number=CF($_POST["account_number"],$conn);
    $bank_name=CF($_POST["bank_name"],$conn);
    $branch_name=CF($_POST["branch_name"],$conn);
    $ifsc_code=CF($_POST["ifsc_code"],$conn);

    $basic=CF($_POST["basic"],$conn);
    $hra_no=CF($_POST["hra_no"],$conn);
    $cca=CF($_POST["cca"],$conn);
    $Provident_funt=CF($_POST["Provident_fund"],$conn);
    $advance=CF($_POST["advance"],$conn);
    $esi_amount=CF($_POST["esi_amount"],$conn);
    $special_all=CF($_POST["special_all"],$conn);
    $monthly_bonus=CF($_POST["monthly_bonus"],$conn);
    $other_all=CF($_POST["other_all"],$conn);
    $Professional_tax=CF($_POST["Professional_tax"],$conn);
    $lwa_amount=CF($_POST["lwa_amount"],$conn);
    $lop_amounts=CF($_POST["lop_amounts"],$conn);
    $gross_earning=CF($_POST["total_earninig"],$conn);//total earning is  now gross_earning	
    $total_deductions=CF($_POST["total_deductions"],$conn);
    $salary_in_words=CF($_POST["salary_in_words"],$conn);
    $net_payble=CF($_POST["net_payble"],$conn);

    $Provident_funds=CF($_POST["Provident_funds"],$conn);
    $working_day=CF($_POST["working_day"],$conn);
    $esi_amounts=CF($_POST["esi_amounts"],$conn);
    $total_days=CF($_POST["total_days"],$conn);
    $accident_insurance=CF($_POST["accident_insurance"],$conn);
    $leaves=CF($_POST["leave_taken"],$conn);
    $loss_of_pay=CF($_POST["loss_of_pay"],$conn);
    $total_contribution=CF($_POST["total_contribution"],$conn);
    $ctc_wages=CF($_POST["ctc_wages"],$conn);
    $month=date("m");
    $year=date("Y");
    $amount=CF($_POST["amount"],$conn);
    $gross_salary=CF($_POST["gross_salary"],$conn);
    $total_payble=CF($_POST["total_payble"],$conn);
    $dateofsalarytrans=CF($_POST["dateofsalarytrans"],$conn);
    $salary_mode=CF($_POST["salary_mode"],$conn);
    $sal_id=$_POST["sal_id"];

    //new added
    $overtime=$_POST["overtime"];
    $expenses=$_POST["expenses"];
    $deductions=$_POST["deductions"];
    $CL=$_POST["CL"];
    $ML=$_POST["ML"];
    $HalfDay =$_POST["HalfDay"];
    $Holiday =$_POST["holiday"];
    $Sunday =$_POST["Sunday"];
    $total_payable_days=$_POST["total_payable_days"];
    //new added
 
    echo $update="UPDATE `employee` SET `emp_name`='$emp_name',`desig_id`='$desig_id',
    `father_name`='$father_name',
    `current_address`='$Location',
    `permanent_address`='$Location',
    `joining_date`='$joining_date',
    `account_number`='$account_number',
    `bank_name`='$bank_name',
    `branch_name`='$branch_name',
    `ifsc_code`='$ifsc_code',
    `project_name`='$project_name',
    `aadhar_no`='$adhar_no',
    `pan_no`='$pan_no',
    `uan_no`='$uan_no',
    `esi_no`='$Esi_no',
    `pf_no`='$pf_no' 
     WHERE `Id`='$EmpID'";
    $run = mysqli_query($conn, $update);

       //`desig_id`='$desig_id',
   echo $update_salary="UPDATE `add_salary_slip` SET 
    `user_id`='$EmpID',
    `project_name`='$project_name',
    `location`='$Location',
    `account_number`='$account_number',
    `bank_name`='$bank_name',
    `branch_name`='$branch_name',
    `ifsc_code`='$ifsc_code',
    `basic`='$basic',
    `hra_no`='$hra_no',
    `cca`='$cca',
    `Provident_fund@ 12%`='$Provident_funt',
    `advance`='$advance',
    `esi@ 0.75%`='$esi_amount',
    `special_all(SPL)`='$special_all',
    `monthly_bonus`='$monthly_bonus',
    `other_all`='$other_all',
    `Professional_tax`='$Professional_tax',
    `lwa_amount`='$lwa_amount',
    `lop_amounts`='$lop_amounts',
    `gross_earning`='$gross_earning',
    `total_deductions`='$total_deductions',
    `salary_in_words`='$salary_in_words',
    `net_payble`='$net_payble',
    `Provident_funds@ 13%`='$Provident_funds',
    `working_day`='$working_day',
    `esi_@ 3.25%`='$esi_amounts',
    `total_days`='$total_days',
    `accident_insurance`='$accident_insurance',
    `leaves`='$leaves',
    `loss_of_pay`='$loss_of_pay',
    `total_contribution`='$total_contribution',
    `ctc_wages`='$ctc_wages',
    `amount`='$amount',
    `gross_salary`='$gross_salary',
    `total_payble`='$total_payble',
    `date_of_salary_transfer`='$dateofsalarytrans',
    `salary_release_mode`='$salary_mode',
    `overtime`='$overtime',
    `expenses`='$expenses',
    `deductions`='$deductions=',
    `CL`='$CL',
    `ML`='$ML',
    `HalfDay`='$HalfDay',
    `Holiday`='$Holiday',
    `Sunday`='$Sunday',
    `total_payable_days`='$total_payable_days',
    `UpdatedOn`=now() WHERE `Idd`='$EmpID'";
 
    $run_salary = mysqli_query($conn, $update_salary);
//salary details.
//header("location:PFC.php?PageName=Edit_Salary&Mgs=1&EmpID=".$EmpID);
header("location:PFC.php?PageName=Edit_Salary&Mgs=1&EmpID=".$EmpID);
}
//update code end here.

?>

<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Employee Salary Updated Successfully.</strong>
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
              <a class="btn btn-warning text-dark" href="PFC.php?PageName=add_salary_slip" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:left;margin-left:18px;" role="button">Back</a>
              </form>
              <h2 style="color:#012970;margin-left: -105px;margin-top: 8px;"><b>UPDATE SALARY</b></h2><br/><br/>
           
              </nav><br><br> 
                <div class="card-body">
                <form  method="POST">
        <!-- <div class="modal-header">
              <legend class="card-title"  id="myModalLabel"><u style="color:blue;">Edit Salary :-</u></legend>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <legend class="scheduler-border mt-2">&nbsp;&nbsp;<u style="color:blue;">EMPLOYEE DETAILS:-</u></legend> -->
        <div class="modal-body">
                          <div class="form-group">
                          <div class="row">
                          <div class="col-4">
                                        <label for="emp_id" class="form-label">Select Employee * </label>
                                        <select name="emp_name"  class="fstdropdown-select" id="emp_name" required>
                                            <option value="NA">Select Employee</option>
                                            <?php 
                                                $sql="SELECT * FROM `employee` where `Id`!='1'";
                                                $result = mysqli_query($conn,$sql);
                                                while( $row = mysqli_fetch_array($result))
                                                {
                                             ?>
                                            <option value="<?php echo $row["Id"];?>" <?php if($row["Id"]==$rowdata["empID"]){ echo 'selected'; }?>><?php echo $row["emp_name"];?></option>
                                          <?php } ?>
                                    </select>
                                    <input type="hidden" name="empployeename" id="empployeename" value="<?php echo $rowdata["emp_name"];?>"> 
                                    </div>
                                      <div class="col-4">
                                        <label for="text" class="form-label">Month <span style="color: red">*</span></label>
                                        <select class="month form-control" name="month" id="month" required>
                                        <!-- onchange="salary_month()" -->
                                        <option value="NA">--SELECT MONTH--</option>
                                        <?php
                                        $months = array(1 => 'January',2 => 'February',3 => 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December');
                                        foreach($months as $monthNum => $monthName) { ?>
                                          <option value="<?php echo $monthNum; ?>" <?php if($monthNum==$rowdata["month"]){ echo 'selected'; }?>><?php echo $monthName; ?></option>
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
                                      <option value="<?php echo $n; ?>" <?php if($n==$rowdata["year"]){ echo 'selected'; }?>><?php echo $n; ?></option>
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
                                              <input type="text" class="totaldaysinmonth form-control" name="totaldaysinmonth" id="totaldaysinmonth" value="<?php echo $rowdata["total_days"];?>"  required>
                                          </div>
                                 
                                  
                                <div class="col-3"><!--Leave new added-->
                                              <label for="text" class="form-label">Leaves <span style="color: red">*</span></label>
                                              <input type="text" class="working_day form-control" name="leaves" id="leaves" value="<?php echo $rowdata["leaves"];?>" required>
                                 </div>
                                 <div class="col-3">
                                              <label for="text" class="form-label">CL<span style="color: red">*</span></label>
                                              <input type="text" class="CL form-control" name="CL" id="CL" value="<?php echo $rowdata["CL"];?>" required>
                                 </div>
                                 <div class="col-3">
                                              <label for="text" class="form-label">ML<span style="color: red">*</span></label>
                                              <input type="text" class="ML form-control" name="ML" id="ML" value="<?php echo $rowdata["ML"];?>" required>
                                 </div><br/><br/>
                                 <div class="col-3">
                                              <label for="text" class="form-label" style="margin-top: 9px;">OT(Over Time in Days) <span style="color: red">*</span></label>
                                              <input type="text" class="working_day form-control" name="overtime" id="overtime" onkeyup="over_time_cal()" value="<?php echo $rowdata["overtime"];?>">
                                              <!-- onkeyup="over_time_cal()" -->
                                 </div>
                                 <div class="col-3">
                                                <label for="text" class="form-label" style="margin-top: 9px;">Half Day <span style="color: red">*</span></label>
                                                <input type="text" class="HalfDay form-control" name="HalfDay" id="HalfDay" value="<?php echo $rowdata["HalfDay"];?>" required>
                                  </div>
                                  <div class="col-3">
                                                <label for="text" class="form-label" style="margin-top: 9px;">Holiday <span style="color: red">*</span></label>
                                                <input type="text" class="holiday form-control" name="holiday" id="holiday" value="<?php echo $rowdata["Holiday"];?>" required>
                                  </div>
                                  <div class="col-3">
                                                <label for="text" class="form-label" style="margin-top: 9px;">Sunday <span style="color: red">*</span></label>
                                                <input type="text" class="Sunday form-control" name="Sunday" id="Sunday" value="<?php echo $rowdata["Sunday"];?>"  required>
                                  </div>
                                </div><br/></br>
                                 <div class="row">
                                 
                                 <div class="col-4">
                                              <label for="text" class="form-label">Working Days <span style="color: red">*</span></label>
                                              <input type="text" class="working_days form-control" name="working_days" id="working_days" value="<?php echo $rowdata["working_day"];?>" onclick="cal_working_days()" required> 
                                              <!-- onclick="cal_working_days()" -->
                                          </div>
                                 
                                  <div class="col-4">
                                                <label for="text" class="form-label">Total Days Payable <span style="color: red">*</span></label>
                                                <input type="text" class="total_payable_days form-control" name="total_payable_days" id="total_payable_days" value="<?php echo $rowdata["total_payable_days"];?>" onclick="CountDaysPayable()" required> 
                                                <input type="hidden" class="total_payable_days form-control" name="salarymonth" id="salarymonth">
                                                <!-- onclick="CountDaysPayable()" -->
                                  </div>
                                 <div class="col-4">
                                                <label for="text" class="form-label">Expenses <span style="color: red">*</span></label>
                                                <input type="text" class="expenses form-control" name="expenses" id="expenses" value="<?php echo $rowdata["expenses"];?>" required>
                                  </div>
                                </div><br><br>
                               <center> <button type="button" class="btn btn-success" name="salary_mode" id="salary_mode"  onclick="GetDetail()">Calculation</button></center>
                                <br><!-- <hr> -->
                                  <div class="row">
                                  <div class="col-4">
                                        <label for="desig_id" class="form-label"> Designation </label>
                                        <input type="text" name="desig_id"  class="desig_id form-control" id="desig_id">
                                        <input type="hidden" name="desg_idd"  class="desg_idd form-control" id="desg_idd">
                                        <input type="hidden" name="dept_id"  class="dept_id form-control" id="dept_id">
                                    </div>
                                  <div class="col-4">
                                        <label for="project_name" class="form-label">Project Name <span style="color: red">*</span></label>
                                        <input type="text" class="project_name form-control" name="project_name" id="project_name">
                                    </div>
                                      <div class="col-4">
                                          <label for="aadhar_no" class="form-label">Aadhar No<span style="color: red">*</span></label>
                                          <input type="text" class="aadhar_no form-control" name="aadhar_no" id="aadhar_no"  placeholder="Enter Aadhar No">
                                      </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-4">
                                          <label for="text" class="form-label">PAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="pan_no form-control"  placeholder="Enter PAN No "  maxlength="10" name="pan_no" id="pan_no">
                                      </div>
                                    <div class="col-4">
                                          <label for="uan_no" class="form-label">UAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="uan_no form-control"   placeholder="Enter UAN No " name="uan_no" id="uan_no">
                                      </div>
                                        <div class="col-4">
                                            <label for="Esi_no" class="form-label">ESI No <span style="color: red">*</span></label>
                                            <input type="text" class="Esi_no form-control" name="Esi_no" maxlength="10" placeholder="Enter ESI No" id="Esi_no">
                                        </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                  <div class="col-4">
                                            <label for="pf_no" class="form-label">PF No <span style="color: red">*</span></label>
                                            <input type="text"  class="pf_no form-control"  placeholder="Enter PF No "name="pf_no" id="pf_no">
                                        </div>
                                  <div class="col-4">
                                        <label for="text" class="form-label">Date Of Joining <span style="color: red">*</span></label>
                                        <input type="text" name="joining_date" class="joining_date  form-control"  id="joining_date">
                                    </div>
                                      <div class="col-4">
                                          <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                          <input type="text" name="father_name" class="father_name  form-control"  id="father_name">
                                      </div>
                                  </div>
                                <br>
                                  <div class="row">
                                  <div class="col-4">
                                          <label for="text" class="form-label">Location <span style="color: red">*</span></label>
                                          <input type="text" name="location" class="location   form-control"  id="location">
                                      </div>
                                  <div class=" col-4">
                                        <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                        <input type="text" class="account_number form-control" name="account_number" id="account_number">
                                    </div>
                                      <div class="col-4">
                                        <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                        <input type="text" class="bank_name form-control" name="bank_name" id="bank_name">
                                      </div>
                                      </div><br>
                                      <div class="row">
                                      <div class="col-6">
                                        <label for="text" class="form-label">Branch Name <span style="color: red">*</span></label>
                                        <input type="text" class="branch_name form-control" name="branch_name" id="branch_name">
                                      </div>
                                      <div class="col-6">
                                        <label for="text" class="form-label">IFSC Code <span style="color: red">*</span></label>
                                        <input type="text" class="ifsc_code form-control" name="ifsc_code" id="ifsc_code">
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
                                                  <input type="text" class="basic form-control" name="basic" id="basic_c" placeholder="Enter basic" >
                                                  <!-- onclick="count_salary()"  -->
                                                  <input type="hidden" class="basic form-control" name="basic1" id="basic1"  placeholder="Enter basic" value="<?php echo $rowdata["basic"];?>">
                                                  <input type="hidden" class="basic form-control" name="basic_count" id="basic_count">
                                                  <!-- onclick="count_salary()" -->
                                                </div>
                                              <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label>
                                                  <input type="text" class="hra_no form-control" name="hra_no"  id="hra_no">
                                                  <input type="hidden" class="hra_no form-control" name="hra_no1"  id="hra_no1" value="<?php echo $rowdata["hra_no"];?>">
                                                  <input type="hidden" class="hra_count form-control" name="hra_count" id="hra_count">
                                              </div>
                                              <div class="col-4">
                                                <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                <input type="text" class="special_all form-control" name="special_all"  id="special_all">
                                                <input type="hidden" class="special_all1 form-control" name="special_all1"  id="special_all1" value="<?php echo $rowdata["special_all(SPL)"];?>">
                                                <input type="hidden" class="special_all_count form-control" name="special_all_count"  id="special_all_count">
                                            </div>
                                              <div class="col-4">
                                                <!-- <label for="text" class="form-label">CCA <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="cca form-control" name="cca" id="cca">
                                            </div>
                                          </div><br>
                                          <div class="row">
                                          <div class="col-6">
                                                <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                <input type="text" class="other_all form-control" name="other_all"  id="other_all" >
                                                <input type="hidden" class="other_all1 form-control" name="other_all1"  id="other_all1" value="<?php echo $rowdata["other_all"];?>">
                                            </div>
                                           
                                            <div class="col-6">
                                                <label for="text" class="form-label" style="color: red"><b>Gross Earning </b><span style="color: red">*</span></label>
                                                <input type="text" class="gross_earning form-control" name="gross_earning" id="gross_earning" >
                                                <input type="hidden" class="gross_earning1 form-control" name="gross_earning1" id="gross_earning1" value="<?php echo $rowdata["gross_monthly"];?>">
                                            </div>
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">Advance <span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="advance form-control" name="advance" id="advance">
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
                                                  <input type="text" class="esi_amount form-control" name="esi_amount"   id="esi_amounttt"/>
                                                  <input type="hidden" class="esi_amount form-control" name="esi_amount1"   id="esi_amounttt1">
                                              </div>
                                              <div class="col-6">
                                                  <label for="text" class="form-label">Provident_fund@12%<span style="color: red">*</span></label>
                                                  <input type="text" class="Provident_fund form-control" name="Provident_fund" id="Provident_fund"/>
                                                  <input type="hidden" class="Provident_fund form-control" name="Provident_fund1" id="Provident_fund1">
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
                                                <input type="text" class="esi_amounts form-control" name="esi_amounts" id="esi_amounts" value="<?php echo $rowdata["esi_amounts_monthly"];?>">
                                                <input type="hidden" class="esi_amounts form-control" name="esi_amounts1" id="esi_amounts1">
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Provident_funds@ 13%<span style="color: red">*</span></label>
                                                <input type="text" class="Provident_funds form-control" name="Provident_funds" id="Provident_funds">
                                                <input type="hidden" class="Provident_funds form-control" name="Provident_funds1" id="Provident_funds1">
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
                                                <input type="hidden" class="deductions form-control" name="deductions1" id="deductions1">
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
                                                <input type="hidden" class="total_payble1 form-control" name="total_payble1" id="total_payble1">
                                                <!-- onclick="emp_contri()" -->
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Total_Payble in words<span style="color: red">*</span></label>
                                                <input type="text" class="salary_in_words form-control" name="salary_in_words"  id="salary_in_words" placeholder="Total_Payble in words" value="<?php echo $rowdata["salary_in_words"];?>">
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
                                                <input type="text" class="salary_mode form-control" name="salary_mode" id="salary_mode"  value="<?php echo "NEFT";?>" readonly>
                                                 <!-- <option value="NA">--SELECT--</option>
                                                 <option value="CASH">CASH</option>
                                                 <option value="NEFT">NEFT</option>
                                                 <option value="CHEQUE">CHEQUE</option>
                                                </select> -->
                                            </div>
                                        </div><br><br>
                                    </div>
                                </div>
                            </fieldset>
                          </div>
                       <div class="modal-footer">
                      <!-- <input type="button" class="btn btn-primary" data-bs-dismiss="modal" value="Cancel"> -->
                      <!-- <input type="reset" class="btn btn-primary" value="Reset"> -->
                      <input type="submit" id="submit"  name="update" class="btn btn-primary update" value="Update">
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
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'./Pages/ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'./Pages/ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
<script type="text/Javascript">
  //  function addsalary()
  //  {
  //    var basic,hra_no,cca,Provident_funt,advance, esi_amount,special_all,monthly_bonus,other_all,Professional_tax,lwa_amount,lop_amounts,total_earninig
  //       ,total_deductions,net_payble;
  //       basic=document.getElementById("basiss").value;
  //       hra_no=basic*50/100;
  //       cca=basic*0/100;
  //       Provident_funt=basic*8/100;
  //       advance=basic*0/100;
  //       esi_amount=basic*5/100;
  //       special_all=basic*11/100;
  //       monthly_bonus=basic*11/100;
  //       other_all=basic*0/100;
  //       Professional_tax=basic*0/100;
  //       lwa_amount=basic*0/100;
  //       lop_amounts=basic*0/100;
  //       total_earninig=basic*40/100;
  //       total_deductions=basic*3/100;
  //       net_payble=basic*50/100;
  //        net=parseInt(basic)+parseInt(hra_no)-parseInt(Provident_funt)+parseInt(cca)+parseInt(advance)+parseInt(esi_amount)+parseInt(special_all)+parseInt(monthly_bonus)
  //        +parseInt(other_all)+parseInt(Professional_tax)+parseInt(lwa_amount)+parseInt(lop_amounts)+parseInt(total_earninig)+parseInt(total_deductions)+parseInt(net_payble)
  //       document.getElementById('hra_no').value=hra_no;
  //       document.getElementById('cca').value=cca; 
  //       document.getElementById('Provident_funt').value=Provident_funt;
  //       document.getElementById('advance').value=advance;
  //       document.getElementById('esi_amount').value=esi_amount;
  //       document.getElementById('special_all').value=special_all;
  //       document.getElementById('monthly_bonus').value=monthly_bonus;
  //       document.getElementById('other_all').value=other_all;
  //       document.getElementById('Professional_tax').value=Professional_tax;
  //       document.getElementById('lwa_amount').value=lwa_amount;
  //       document.getElementById('lop_amounts').value=lop_amounts;
  //       document.getElementById('total_earninig').value=total_earninig;
  //       document.getElementById('total_deductions').value=total_deductions;
  //       document.getElementById('net_payble').value=net_payble;
  //  }

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
                  //document.getElementById("em_id").value = myObj[14];
                  document.getElementById("desg_idd").value = myObj[15];

                  document.getElementById("basic").value = myObj[16];
                  document.getElementById("hra_no").value = myObj[17];
                  document.getElementById("special_all").value = myObj[18];
                  document.getElementById("other_all").value = myObj[19];
                  //document.getElementById("gross_earning").value = myObj[20];
                  //document.getElementById("Provident_fund").value = myObj[21];//Employee Contribution.
                  //document.getElementById("esi_amounttt").value = myObj[22];//Employee Contribution.

                  //document.getElementById("esi_amounts").value = myObj[23];//Employer Contribution.
                  //document.getElementById("Provident_funds").value = myObj[24];//Employer Contribution.
                
                  //document.getElementById("total_deductions").value = myObj[25];
                  //document.getElementById("deductions").value = myObj[25];
                  //document.getElementById("total_payble").value = myObj[20];//Net payable is total payable.
                  //document.getElementById("total_payble").value = myObj[26];//Net payable or net monthly(after substracting deduction) is total payable.
                  //document.getElementById("dept_id").value = myObj[26];
                
                  //document.getElementById("gross_salary").value = myObj[29];
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

// Example usage:
//const number = document.getElementById("total_payble").value;
var totalPayableElement = document.getElementById("total_payble").value;
if(totalPayableElement)
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
//salary in words

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

    calc_total_payable();
    count_salary();
  }

</script>

<script type="text/Javascript">
function count_salary()
  {
    var total_month_days=document.getElementById("totaldaysinmonth").value;//toatls days in months
    //var total_month_days=document.getElementById("total_payable_days").value;//toatls days in months
    var Total_payable; 
    var cal_hra; 
    var cal_over_time;
    var round_off_cost;
    var special_allowance=document.getElementById("special_all1").value;
    var other_all=document.getElementById("other_all1").value;
    var gross_earning=document.getElementById("gross_earning").value;
    var cal_other_all;
    var cal_special_allowance;
    var cal_gross_earning;

    var ED_basic=document.getElementById("basic1").value; 
    var hra=document.getElementById("hra_no1").value; 
    var ECLD_days_payable=document.getElementById("total_payable_days").value; // totals days in months
    var working_days=document.getElementById("total_payable_days").value;  // total payable days
    //var Gross_salary=document.getElementById("gross_salary").value; 
    var overtime_hours=document.getElementById("overtime").value;
   
    
    if(ECLD_days_payable!='')
    {
       //Counting Basic pay.
        Total_payable=((ED_basic/total_month_days) * ECLD_days_payable);
        round_off_basic=Math.round(Total_payable);
        document.getElementById("basic_count").value = round_off_basic;
        document.getElementById("basic_c").value =  document.getElementById("basic_count").value;
        //document.getElementById("basic").value = document.getElementById("basic1").value;
        console.log('basic_count' + basic_count);
        console.log(ED_basic+'/'+total_month_days+'*'+ECLD_days_payable);
        console.log(round_off_basic);
        //Counting Basic pay.
      
      //Count HRA.
        cal_hra=((hra/total_month_days) * ECLD_days_payable);
        round_off_hra=Math.round(cal_hra);
        
        document.getElementById("hra_count").value=round_off_hra;
        document.getElementById("hra_no").value=document.getElementById("hra_count").value;

        console.log(round_off_hra + 'hra' + hra + 'cal_hra' + cal_hra);
      //Count HRA.

      //Count Special allowance.
        cal_special_allowance=((special_allowance/total_month_days) * ECLD_days_payable);
        round_off_special_allowance=Math.round(cal_special_allowance);
        
        document.getElementById("special_all_count").value=round_off_special_allowance;
        document.getElementById("special_all").value=document.getElementById("special_all_count").value;
        
        console.log(cal_special_allowance + 'special_allowance' + special_allowance);
      //Count Special allowance.

      //Count Other_all.
        cal_other_all=((other_all/total_month_days) * ECLD_days_payable);
        round_off_otherall=Math.round(cal_other_all);
        
        document.getElementById("other_all1").value=round_off_otherall;
        document.getElementById("other_all").value=document.getElementById("other_all1").value;

        console.log(cal_other_all + 'other_all' + other_all);
      //Count Other_all.

      //Count gross_earning.
        cal_gross_earning=Total_payable + cal_hra + cal_special_allowance + cal_other_all;
        round_off_grossearning=Math.round(cal_gross_earning);

        document.getElementById("gross_earning1").value=round_off_grossearning;
        document.getElementById("gross_earning").value=document.getElementById("gross_earning1").value;

        console.log(cal_gross_earning + 'gross_earning' + gross_earning);
      //Count gross_earning.

      emp_contri();
    }

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

  function emp_contri()
  {
    var basic_pay=document.getElementById("basic_c").value;//Basic Pay for PF calc.
    var total_pay=document.getElementById("total_payble").value;
    var gross_earning=document.getElementById("gross_earning1").value;//Earning,where esic will calculate.
    var pf_12_percen=parseInt(document.getElementById("Provident_fund1").value);
    var esic_075_percen=parseInt(document.getElementById("esi_amounttt1").value);
    var total_deduct=document.getElementById("total_deductions").value;
    var expenses=document.getElementById("expenses").value;
    var overtime_hours=document.getElementById("overtime").value;
    var ec_esic_amt=0.75;//Employee Contribution
    var esic_amt2=3.25;//Employer Contribution
    var ec_pf_amt=12;//Employee Contribution
    var ec_pf_amt2=0.13;//Employer Contribution calcuting after 13%.
    var ec_pf_total;
    var total_payable;
    var grossearning=document.getElementById("gross_earning1").value;//Gross earning.
    var deduction=document.getElementById("deductions").value;//deduction.

//TOTAL EARNING IS TOTAL PAYABLE.
//document.getElementById("gross_earning").value=total_pay;
//TOTAL EARNING IS TOTAL PAYABLE.


//Esic Calculation 0.75% EMPLOYEE CONTRIBUTION
    var esic_cal = (gross_earning * ec_esic_amt) / 100;
    var roundoff_esic = Math.round(esic_cal);
    console.log(esic_cal + 'roundoff_esic' + roundoff_esic);
    document.getElementById("esi_amounttt1").value=roundoff_esic;
    document.getElementById("esi_amounttt").value=roundoff_esic;
//Esic Calculation 0.75% EMPLOYEE CONTRIBUTION

//PF Calculation 12% EMPLOYEE CONTRIBUTION.
    //var ec_pf_total = total_pay * ec_pf_amt / 100;
    var ec_pf_total = (basic_pay * ec_pf_amt) / 100;
    var roundoff_pf = Math.round(ec_pf_total);
    console.log(ec_pf_total + 'roundoff_pf' + roundoff_pf);
    document.getElementById("Provident_fund1").value=roundoff_pf;
    document.getElementById("Provident_fund").value=roundoff_pf;
//PF Calculation 12% EMPLOYEE CONTRIBUTION.

//Esic Calculation 3.25% ON EMPLOYER'S CONTRIBUTION & LEAVE DETAILS SECTION.
    var esic2 = (gross_earning * esic_amt2) / 100;
    var roundoff_esic_2 = Math.round(esic2);
    console.log(esic2 + 'roundoff_esic_2' + roundoff_esic_2);
    document.getElementById("esi_amounts1").value=roundoff_esic_2;
    document.getElementById("esi_amounts").value=roundoff_esic_2;
//Esic Calculation 3.25% ON EMPLOYER'S CONTRIBUTION & LEAVE DETAILS SECTION.

//PF Calculation 13%.
    var ec_pf_total2 = (basic_pay) * ec_pf_amt2;
    var roundoff_pf2 = Math.round(ec_pf_total2);
    console.log(ec_pf_total2 + 'ec_pf_total2' + ec_pf_total2);
    document.getElementById("Provident_funds1").value=roundoff_pf2;
    document.getElementById("Provident_funds").value=roundoff_pf2;
//PF Calculation 13%.

//TOTAL DEDUCTION CALCULATION.
    var total_deduction = parseInt(document.getElementById("esi_amounttt1").value) + parseInt(document.getElementById("Provident_fund1").value);
    
    document.getElementById("deductions1").value=total_deduction;
    document.getElementById("deductions").value=document.getElementById("deductions1").value;

    console.log('total_deduction' + total_deduction);
//TOTAL DEDUCTION CALCULATION.

//NET PAYABLE CALCULATION.
  // const net_payable = parseInt(total_pay) - parseInt(total_deduct);
  // document.getElementById("net_payble").value=net_payable;
//NET PAYABLE CALCULATION.

//Expense addition
if(expenses!=0)
{
  const expense_emp = parseInt(total_pay) + parseInt(expenses);
  document.getElementById("total_payble").value=expense_emp;
}
//Expense addition

//Total Payable.
  total_payable=parseInt(gross_earning)-parseInt(total_deduction);

  document.getElementById("total_payble1").value=total_payable;
  document.getElementById("total_payble").value=total_payable;

  console.log('total_deduction' + total_deduction);
//Total Payable.
  if(overtime_hours!=0)
  {
    over_time_cal();
  }
}

//Calculating salary according to total payable days.
function calc_total_payable()
 {
      var gross_earn=parseFloat(document.getElementById("gross_earning1").value);//Gross Earning.
      var total_days=parseInt(document.getElementById("totaldaysinmonth").value);//Total Days in a months.
      var oneday_sal=(gross_earn / total_days).toFixed(2); //calculating one day salary.
      var daysWorked=parseInt(document.getElementById("total_payable_days").value);
      var salaryForDays = (oneday_sal * daysWorked).toFixed(2); 
      var esic=document.getElementById("esi_amounts").value;//esic Employer contribution 3.25%.
      var Pf=document.getElementById("Provident_funds").value;//PF Employer contribution 13%.

      var complete_salary=parseInt(salaryForDays) - (parseInt(Pf)+ parseInt(esic));
      document.getElementById("total_payble").value = complete_salary;

      //console.log('oneday_sal' + oneday_sal + 'gross_earn' + gross_earn + 'salaryForDays' + salaryForDays + 'Complete Salary' + complete_salary);
      console.log('gross_earn' + gross_earn + 'total_days' + total_days + 'oneday_sal' + oneday_sal + 'daysWorked' + daysWorked + 'salaryForDays' + salaryForDays + 'Pf' + Pf + 'esic' + esic + 'complete_salary' + complete_salary);
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
    var Gross_sal=document.getElementById("gross_earning1").value; 

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
