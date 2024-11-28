
<?php
// Get the user id 
error_reporting(0);
$user_id = $_REQUEST['user_id'];
  
// Database connection
include '../connection.php';
//$conn = new mysqli("localhost:8080", "root", "", "adminpanel");
if ($user_id !== "") 
{      
    // Get corresponding first name and 
    // last name for that user id  
//  echo $sql="SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`desig_id`,`desig`.`Designation`,`msd`.* FROM `employee` `us`
//  LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` 
//  WHERE `us`.`Id`='$user_id'";
//      $res=mysqli_query($conn,$sql);
//      print_r($res);
//      die;  
// echo $sql="SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`desig_id`,`desig`.`Designation`,`msd`.* FROM `employee` `us`
// LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` 
// WHERE `us`.`Id`='$user_id'";
// die;
    //$query = mysqli_query($conn, "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_id`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` where `us`.`emp_id`='$user_id'");
    $query = mysqli_query($conn, "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`desig_id`,`desig`.`Designation`,`depart`.`dept_id` ,`depart`.`department`,`msd`.* FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id`=`depart`.`dept_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` WHERE `us`.`Id`='$user_id'");
  
    $row = mysqli_fetch_array($query);
  
    $projectname=$row['project_name'];
    $aadhar_no=$row['aadhar_no'];
    $pan_no=$row['pan_no'];
    $uan_no=$row['uan_no'];
    $esi_no=$row['esi_no'];
    $pfo_no=$row['pf_no'];
    $joining_date=$row['joining_date'];
    $fathername=$row['father_name'];
    $perma_add=$row['permanent_address'];
    $account_nu=$row['account_number'];
    $bank_name=$row['bank_name'];
    $branch_name=$row['branch_name'];
    $ifsc_code=$row['ifsc_code'];
    $designation=$row['Designation'];
    $Id=$row['Id'];
    $desig_Id=$row['desig_id'];
    //New added_28-06-2023
    // $basic_monthly=$row['basic_monthly'];
    // $hra_monthly=$row['hra_monthly'];
    // $cca_monthly=$row['cca_monthly'];
    // $pf_monthly=$row['pf_monthly'];
    // $esi_amount_monthly=$row['esi_amount_monthly'];
    // $special_monthly=$row['special_monthly'];
    // $bonus_monthly=$row['bonus_monthly'];
    // $other_all_monthly=$row['other_all_monthly'];
    // $lwf_monthly=$row['lwf_monthly'];
    // $total_deduction_b_monthly=$row['total_deduction_b_monthly'];
    // $net_monthly=$row['net_monthly'];
    // $accident_insurance_monthly=$row['accident_insurance_monthly'];
    // $gross_monthly=$row['gross_pay_monthly'];
    // $pf_contribution_monthly=$row['pf_contribution_monthly'];
//New added_28-06-2023

//New added_28-08-2023
    $basic_monthly=$row['basic_monthly'];
    $hra_monthly=$row['hra_monthly'];
    $special_monthly=$row['special_monthly'];
    $other_all_monthly=$row['other_all_monthly'];
    $gross_monthly=$row['gross_pay_monthly'];//Gross Earning.
    $pf_monthly=$row['pf_monthly'];//Employee Contribution.
    $esi_amount_monthly=$row['esi_amount_monthly'];//Employee Contribution.
    $esi_amounts_monthly=$row['esi_amounts_monthly'];//Employer Contribution.
    $pf_contribution_monthly=$row['pf_contribution_monthly'];//Employer Contribution.
    $total_deduction_b_monthly=$row['total_deduction_b_monthly'];//Total Deduction
    $net_monthly=$row['net_monthly'];//Net Monthy 
    $department=$row['department'];
    
    
    //$bonus_monthly=$row['bonus_monthly'];
    
   
    
    //$accident_insurance_monthly=$row['accident_insurance_monthly'];
    
    
//New added_28-08-2023
}
  
// Store it in a array
$result = array("$projectname", "$aadhar_no","$pan_no","$uan_no","$esi_no","$pfo_no",
"$joining_date",
"$fathername",
"$perma_add",
"$account_nu",
"$bank_name",
"$branch_name",
"$ifsc_code","$designation","$Id","$desig_Id",
"$basic_monthly",
"$hra_monthly",
"$special_monthly",
"$other_all_monthly",
"$gross_monthly",
"$pf_monthly",
"$esi_amount_monthly",
"$esi_amounts_monthly",
"$pf_contribution_monthly",
"$total_deduction_b_monthly","$net_monthly","$department");

// Send in JSON encoded form
$myJSON = json_encode($result);
//echo"<pre>";
echo $myJSON;
//echo"</pre>";
?>