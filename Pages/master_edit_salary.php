<?php
error_reporting();
require_once 'connection.php';

//salary master view.
$EmpID=$_REQUEST["EmpID"];
$EmpID=EDV($EmpID,2);
//echo $sql="SELECT `emp`.`Id` as 'idd',`emp`.`emp_name`,`msd`.* FROM `employee` `emp` LEFT JOIN `master_salary_data` `msd` ON `emp`.`Id` = `msd`.`user_id` where `emp`.`Id`='$EmpID'";

$fetch = mysqli_query($conn, "SELECT `emp`.`Id` as 'idd',`emp`.`emp_name`,`msd`.* FROM `employee` `emp` LEFT JOIN `master_salary_data` `msd` ON `emp`.`Id` = `msd`.`user_id` where `emp`.`Id`='$EmpID'");
$row_sal_data   = mysqli_fetch_array($fetch);

//print_r($row_sal_data);
//salary master view.

if(isset($_POST["Editsalary"]))
{
  
  $user_id=CF($_POST["user_id"],$conn);
  $basic_monthly = CF($_POST['basic_monthly'],$conn);
  $basic_annual = CF($_POST['basic_annual'],$conn);
  $hra_monthly = CF($_POST['hra_monthly'],$conn);
  $hra_annual = CF($_POST['hra_annual'],$conn);
  $cca_monthly = CF($_POST['cca_monthly'],$conn);
  $cca_annual = CF($_POST['cca_annual'],$conn);
  $medical_monthly = CF($_POST['medical_monthly'],$conn);
  $medical_annual = CF($_POST['medical_annual'],$conn);
  $special_monthly = CF($_POST['special_monthly'],$conn);
  $special_annual = CF($_POST['special_annual'],$conn);
  $mobile_monthly = CF($_POST['mobile_monthly'],$conn);
  $mobile_annual = CF($_POST['mobile_annual'],$conn);
  $travel_monthly = CF($_POST['travel_monthly'],$conn);
  $travel_annual = CF($_POST['travel_annual'],$conn);
  $bonus_monthly = CF($_POST['bonus_monthly'],$conn);
  $bonus_annual = CF($_POST['bonus_annual'],$conn);
  $other_all_monthly = CF($_POST['other_all_monthly'],$conn);
  $other_annual = CF($_POST['other_annual'],$conn);
  $gross_monthly = CF($_POST['gross_monthly'],$conn);
  $gross_annual = CF($_POST['gross_annual'],$conn);
  $pf_monthly = CF($_POST['pf_monthly'],$conn);
  $annual_pf = CF($_POST['annual_pf'],$conn);
  $esi_amount_monthly = CF($_POST['esi_amount_monthly'],$conn);
  $esi__annual = CF($_POST['esi__annual'],$conn);
  $tds_monthly = CF($_POST['tds_monthly'],$conn);
  $annual_tds = CF($_POST['annual_tds'],$conn);
  $lwf_monthly = CF($_POST['lwf_monthly'],$conn);
  $lwf_annual = CF($_POST['lwf_annual'],$conn);
  $pt_monthly = CF($_POST['pt_monthly'],$conn);
  $pt_annual = CF($_POST['pt_annual'],$conn);
  $other_deductions_monthly = CF($_POST['other_deductions_monthly'],$conn);
  $annual_other = CF($_POST['annual_other'],$conn);
  $total_deduction_b_monthly = CF($_POST['total_deduction_b_monthly'],$conn);
  $annual_total = CF($_POST['annual_total'],$conn);
  $net_monthly = CF($_POST['net_monthly'],$conn);
  $net_annual = CF($_POST['net_annual'],$conn);
  $gross_pay_monthly = CF($_POST['gross_pay_monthly'],$conn);
  $total_amount_annual = CF($_POST['total_amount_annual'],$conn);
  $pf_contribution_monthly = CF($_POST['pf_contribution_monthly'],$conn);
  $annual_pf_contribution = CF($_POST['annual_pf_contribution'],$conn);
  $esi_amounts_monthly = CF($_POST['esi_amounts_monthly'],$conn);
  $annual_esi = CF($_POST['annual_esi'],$conn);
  $accident_insurance_monthly = CF($_POST['accident_insurance_monthly'],$conn);
  $accident_annual = CF($_POST['accident_annual'],$conn);
  $grauity_monthly = CF($_POST['grauity_monthly'],$conn);
  $grauity_annual = CF($_POST['grauity_annual'],$conn);
  $total_benefit_monthly = CF($_POST['total_benefit_monthly'],$conn);
  $annual_benefit = CF($_POST['annual_benefit'],$conn);


 echo $sql_update="update `master_salary_data` set `user_id`='".$user_id."', 
 `basic_monthly`='".$basic_monthly."', 
 `basic_annual`='".$basic_annual."', 
 `hra_monthly`='".$hra_monthly."', 
 `hra_annual`='".$hra_annual."', 
 `cca_monthly`='".$cca_monthly."', 
 `cca_annual`='".$cca_annual."', 
 `medical_monthly`='".$medical_monthly."',
 `medical_annual`='".$medical_annual."',
 `special_monthly`='".$special_monthly."',
 `special_annual`='".$special_annual."',
 `mobile_monthly`='".$mobile_monthly."',
 `mobile_annual`='".$mobile_annual."',
 `travel_monthly`='".$travel_monthly."',
 `travel_annual`='".$travel_annual."',
 `bonus_monthly`='".$bonus_monthly."',
 `bonus_annual`='".$bonus_annual."',
 `other_all_monthly`='".$other_all_monthly."',
 `other_annual`='".$other_annual."',
 `gross_monthly`='".$gross_monthly."',
 `gross_annual`='".$gross_annual."',
 `pf_monthly`='".$pf_monthly."',
 `annual_pf`='".$annual_pf."',
 `esi_amount_monthly`='".$esi_amount_monthly."',
 `esi__annual`='".$esi__annual."',
 `tds_monthly`='".$tds_monthly."',
 `annual_tds`='".$annual_tds."',
 `lwf_monthly`='".$lwf_monthly."',
 `lwf_annual`='".$lwf_annual."',
 `pt_monthly`='".$pt_monthly."',
 `pt_annual`='".$pt_annual."',
 `other_deductions_monthly`='".$other_deductions_monthly."',
 `annual_other`='".$annual_other."',
 `total_deduction_b_monthly`='".$total_deduction_b_monthly."',
 `annual_total`='".$annual_total."',
 `net_monthly`='".$net_monthly."',
 `net_annual`='".$net_annual."',
 `gross_pay_monthly`='".$gross_pay_monthly."', 
 `total_amount_annual`='".$total_amount_annual."', 
 `pf_contribution_monthly`='".$pf_contribution_monthly."', 
 `annual_pf_contribution`='".$annual_pf_contribution."',
 `esi_amounts_monthly`='".$esi_amounts_monthly."', 
 `annual_esi`='".$annual_esi."', 
 `accident_insurance_monthly`='".$accident_insurance_monthly."', 
 `accident_annual`='".$accident_annual."', 
 `grauity_monthly`='".$grauity_monthly."', 
 `grauity_annual`='".$grauity_annual."', 
 `total_benefit_monthly`='".$total_benefit_monthly."',
 `annual_benefit`='".$annual_benefit."' WHERE `Id`='".$EmpID."'"; 

 

   $run_Sub = mysqli_query($conn, $sql_update); 
   $emp_ID=$_REQUEST["EmpID"];
       if($run_Sub)
          {
      $message="Record Save successfully";
      header("location:PFC.php?PageName=master_edit_salary&Mgs=1&EmpID=".$emp_ID);
    }

    else
    {
      //echo"<script>alert('Not save');</script>";
      $message="Record Not Save.";
    }
    //header("location:PFC.php?PageName=employee_details");

}
?>
<style>
table, th, td {
  border: 1px solid black;
}
.one-line {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; /* Optional: Adds an ellipsis (...) for overflow */
    width: 210px; /* Optional: Set a fixed width to limit the content */
    
  }
</style>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Data Updated.</strong>
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
                  <a class="btn btn-warning text-black" href="PFC.php?PageName=master_view_salary" style="margin:-1;font-size:large;height:39px;padding:6px;width:100px;margin-right: 1367px;" role="button">Back</a>
                </form>
                <h2 style="color:#012970;margin-left:598px;margin-top:-36px;"><b>EDIT SALAY</b></h2>
                </nav> 
                <div class="form-group">
                      <fieldset class="scheduler-border">
                        <Form action="" method="POST"><br> 
                             <div class="row">
                                <div class="col-12">
                                   
                                    <select name="user_id"  class="fstdropdown-select" id="emp_name">
                                        <option value="NA">Select Employee</option>
                                        <?php 
                                            $sql="SELECT * FROM `employee` where emp_status=1 and Id!=1";
                                            $result = mysqli_query($conn, $sql);
                                            //$row    = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                                            //$row    = mysqli_fetch_array($result);
                                            while( $row = mysqli_fetch_array($result))
                                            {
                                        ?>
                                        <option value="<?php echo $row["Id"];?>" <?php if($row["Id"]==$row_sal_data["idd"]){ echo 'selected'; }?>><?php echo $row["emp_name"];?></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <!-- <div class="col-4">
                                <label for="text" class="form-label"><b> Salary Created Date</b><span style="color: red">*</span></label>
                                <input type="date" class="salary_date form-control" name="salary_date" id="salary_date">
                                </div> -->
                                </div><br>
                                </fieldset>
                             <div class="card-body">
                                <table  class="hover table table-striped"  style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Monthly</th>
                                            <th>Annual</th>
                                        </tr>
                                    </thead>
                                    <h5 style="color:#012970;"><center><B>SALARY STRUCTURE</B></center></h5><br>
                                    <tbody>
                                        
                                              <tr>
                                              <td scope="row">
                                                <div class="col-4">
                                                  <label for="text" class="form-label">BASIC Pay<span style="color: red">*</span></label>
                                                </div></td>
                                                  <td><input type="text" class="basic_monthly form-control" name="basic_monthly"   value="<?php echo $row_sal_data["hra_monthly"]; ?>"></td>
                                                  <td><input type="text" class="basic_annual form-control" name="basic_annual"  value="<?php echo $row_sal_data["basic_annual"]; ?>"></td>
                                               </tr>
                                               <tr>
                                                <td scope="row">
                                                   <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label> 
                                                </div></td>
                                                <td><input type="text" class="hra_monthly form-control" name="hra_monthly"   value="<?php echo $row_sal_data["hra_monthly"]; ?>"></td>
                                                <td><input type="text" class="hra_annual form-control" name="hra_annual"   value="<?php echo $row_sal_data["hra_annual"]; ?>" placeholder="Enter basic"  value=""></td>
                                                </tr>
                                             <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">CCA <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="cca_monthly form-control" name="cca_monthly"   value="<?php echo $row_sal_data["hra_monthly"]; ?>"></td>
                                                 <td><input type="text" class="cca_annual form-control" name="cca_annual"   value="<?php echo $row_sal_data["cca_annual"]; ?>" ></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="one-line">Medical Reimbursement<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="medical_monthly form-control" name="medical_monthly"  value="<?php echo $row_sal_data["medical_monthly"]; ?>"></td>
                                                 <td><input type="text" class="medical_annual form-control" name="medical_annual"   value="<?php echo $row_sal_data["medical_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td> <input type="text" class="special_monthly form-control" name="special_monthly"   value="<?php echo $row_sal_data["medical_monthly"]; ?>"></td>
                                                 <td><input type="text" class="special_annual form-control" name="special_annual"  value="<?php echo $row_sal_data["special_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Mobile Allowance<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="mobile_monthly form-control" name="mobile_monthly"   value="<?php echo $row_sal_data["mobile_monthly"]; ?>"></td>
                                                 <td><input type="text" class="mobile_annual form-control" name="mobile_annual"  value="<?php echo $row_sal_data["mobile_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Travel Allowance <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="travel_monthly form-control" name="travel_monthly"   value="<?php echo $row_sal_data["travel_monthly"]; ?>"></td>
                                                 <td><input type="text" class="travel_annual form-control" name="travel_annual"  value="<?php echo $row_sal_data["travel_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="bonus_monthly form-control" name="bonus_monthly"  value="<?php echo $row_sal_data["bonus_monthly"]; ?>"></td>
                                                 <td><input type="text" class="bonus_annual form-control" name="bonus_annual"  value="<?php echo $row_sal_data["bonus_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="other_all_monthly form-control" name="other_all_monthly"    value="<?php echo $row_sal_data["other_all_monthly"]; ?>"></td>
                                                 <td><input type="text" class="other_annual form-control" name="other_annual"   value="<?php echo $row_sal_data["other_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label"><b>Gross Pay(A)</b> <span style="color: red">*</span></label>
                                                 </div></td>
                                                   
                                                 <td><input type="text" class="gross_monthly form-control" name="gross_monthly"  value="<?php echo $row_sal_data["gross_monthly"]; ?>"></td>
                                      
                                                 <td><input type="text" class="gross_annual form-control" name="gross_annual"  value="<?php echo $row_sal_data["gross_annual"]; ?>"></td>
                                            </tr>
                                            
                                    </tbody>
                                </table><br>
                                <h5 style="color:#012970;"><center><B>DEDUCTION</B></center></h5><br>
                                  <table  class="hover table table-striped" style="width:100%">
                                    <tbody>
                                          <tr>
                                             <td>
                                               <div class="col-4">
                                                 <label for="text" class="one-line">PF (Employee Contribution)<span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="pf_monthly form-control" name="pf_monthly"  value="<?php echo $row_sal_data["pf_monthly"]; ?>"></td>
                                                 <td><input type="text" class="annual_pf form-control" name="annual_pf"  value="<?php echo $row_sal_data["annual_pf"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">ESI <span style="color: red">*</span></label>
                                                </div></td> 
                                                <td> <input type="text" class="esi_amount_monthly form-control" name="esi_amount_monthly"  value="<?php echo $row_sal_data["esi_amount_monthly"]; ?>"></td>
                                                 <td><input type="text" class="esi__annual form-control" name="esi__annual"  value="<?php echo $row_sal_data["esi__annual"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">TDS <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="tds_monthly form-control" name="tds_monthly"  value="<?php echo $row_sal_data["tds_monthly"]; ?>"></td>
                                                <td> <input type="text" class="annual_tds form-control" name="annual_tds"  value="<?php echo $row_sal_data["annual_tds"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">LWF <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="lwf_monthly form-control" name="lwf_monthly"  value="<?php echo $row_sal_data["lwf_monthly"]; ?>"></td>
                                                <td> <input type="text" class="lwf_annual form-control" name="lwf_annual"  value="<?php echo $row_sal_data["lwf_annual"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">PT<span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="pt_monthly form-control" name="pt_monthly"  value="<?php echo $row_sal_data["pt_monthly"]; ?>"></td>
                                                <td> <input type="text" class="pt_annual form-control" name="pt_annual"  value="<?php echo $row_sal_data["pt_annual"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">Other Deductions <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="other_deductions_monthly form-control" name="other_deductions_monthly"  value="<?php echo $row_sal_data["other_deductions_monthly"];?>"></td>
                                                <td> <input type="text" class="annual_other form-control" name="annual_other"  value="<?php echo $row_sal_data["annual_other"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label"><b>Total Deduction(B) </b> <span style="color: red">*</span></label>
                                                </div></td>
                                                <td>    <input type="text" class="total_deduction_b_monthly form-control" name="total_deduction_b_monthly"  value="<?php echo $row_sal_data["total_deduction_b_monthly"]; ?>"></td>
                                                <td> <input type="text" class="annual_total form-control" name="annual_total"  value="<?php echo $row_sal_data["annual_total"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label"><b>Net Pay </b> <span style="color: red">*</span></label>
                                                </div></td>
                                                <td>  <input type="text" class="net_monthly form-control" name="net_monthly"  value="<?php echo $row_sal_data["net_monthly"]; ?>"></td>
                                                <td> <input type="text" class="net_annual form-control" name="net_annual"  value="<?php echo $row_sal_data["net_annual"]; ?>"></td>
                                             </tr> 
                                     </tbody>
                                    </table>
                               
                            
                                    <h5 style="color:#012970;"><center><B>COST TO THE COMPANY</B></center></h5><br>
                                  <table  class="hover table table-striped" style="width:100%">   
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Gross Pay <span style="color: red">*</span></label>
                                        </div></td>
                                        <td><input type="text" class="gross_pay_monthly form-control" name="gross_pay_monthly"  value="<?php echo $row_sal_data["gross_pay_monthly"]; ?>"></td>
                                      
                                          <td><input type="text" class="total_amount_annual form-control" name="total_amount_annual"  value="<?php echo $row_sal_data["total_amount_annual"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="one-line">PF Contribution from the company<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="form-control pf_contribution_monthly" name="pf_contribution_monthly"  value="<?php echo $row_sal_data["pf_contribution_monthly"]; ?>"></td>
                                        <td> <input type="text" class="annual_pf_contribution form-control" name="annual_pf_contribution"  value="<?php echo $row_sal_data["annual_pf_contribution"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">ESI<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="esi_amounts_monthly form-control" name="esi_amounts_monthly"  value="<?php echo $row_sal_data["esi_amounts_monthly"]; ?>"> </td>
                                        <td> <input type="text" class="annual_esi form-control" name="annual_esi" id="annual_esi"  value="<?php echo $row_sal_data["annual_esi"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="accident_insurance_monthly form-control" name="accident_insurance_monthly"  value="<?php echo $row_sal_data["accident_insurance_monthly"]; ?>"></td>
                                        <td> <input type="text" class="accident_annual form-control" name="accident_annual"  value="<?php echo $row_sal_data["accident_annual"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Gratuity<span style="color: red">*</span></label>
                                        </div></td>
                                        <td>   <input type="text" class="grauity_monthly form-control" name="grauity_monthly"  value="<?php echo $row_sal_data["grauity_monthly"]; ?>"></td>
                                        <td> <input type="text" class="grauity_annual form-control" name="grauity_annual"  value="<?php echo $row_sal_data["grauity_annual"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label"><b>TOTAL BENEFIT</b><span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="total_benefit_monthly form-control" name="total_benefit_monthly"  value="<?php echo $row_sal_data["total_benefit_monthly"]; ?>"></td>
                                        <td> <input type="text" class="annual_benefit form-control" name="annual_benefit"  value="<?php echo $row_sal_data["annual_benefit"]; ?>"></td>
                                    </tr>  
                                  
                                  </tbody>
                                </table>      
                            </div> 
                            <div class="modal-footer">
                         <input type="submit" name="Editsalary" class="btn btn-primary add_salary" value="Submit" style="margin-right: 690px;font-size: large;height: 42px;padding: 7px;width: 102px;float: left;margin-left: 20px;"> 
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
</main>
