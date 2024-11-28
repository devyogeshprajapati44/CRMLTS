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
                <h2 style="color:#012970;margin-left:589px;margin-top:-36px;"><b>VIEW SALARY</b></h2>
                </nav>
                <div class="form-group">
                      <fieldset class="scheduler-border">
                        <Form action="" method="POST"><br> 
                             <div class="row">
                                <div class="col-12">
                                   
                                    <select name="user_id"  class="form-control" id="emp_name" disabled="true">
                                        <option value="NA">Select Employee</option>
                                        <?php 
                                            //$sql="SELECT * FROM `employee`";
                                            $sql="SELECT `msd`.*,`emp`.`Id` as `employee_id`,`emp`.`emp_name` FROM `employee` `emp` LEFT JOIN `master_salary_data` `msd` ON `emp`.`Id`=`msd`.`user_id` where `emp`.`Id`!='1' and `msd`.`status`= 1 and `emp`.`emp_status`=1";
                                            $result = mysqli_query($conn, $sql);
                                            //$row    = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                                            //$row    = mysqli_fetch_array($result);
                                            while( $row = mysqli_fetch_array($result))
                                            {
                                        ?>
                                        <!-- <option value="<?php //echo $row["Id"];?>" <?php //if($row["Id"]==$row_sal_data["idd"]){ echo 'selected'; }?>><?php //echo $row["emp_name"];?></option> -->
                                        <!-- <option value="<?php //echo $row["Id"];?>" <?php //if($row["Id"]==$row_sal_data["user_id"]){ echo 'selected'; }?>><?php //echo $row["emp_name"].' (Last Added On:-'.$row["created_on"].')';?></option> -->
                                        <option value="<?php echo $row["employee_id"];?>" <?php if($row["employee_id"]==$row_sal_data["user_id"]){ echo 'selected'; }?>><?php echo $row["emp_name"];?></option>
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
                                                  <td><input type="text" class="basic_monthly form-control" name="basic_monthly"  readonly value="<?php echo $row_sal_data["basic_monthly"]; ?>"></td>
                                                  <td><input type="text" class="basic_annual form-control" name="basic_annual" readonly value="<?php echo $row_sal_data["basic_annual"]; ?>"></td>
                                               </tr>
                                               <tr>
                                                <td scope="row">
                                                   <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label> 
                                                </div></td>
                                                <td><input type="text" class="hra_monthly form-control" name="hra_monthly"  readonly value="<?php echo $row_sal_data["hra_monthly"]; ?>"></td>
                                                <td><input type="text" class="hra_annual form-control" name="hra_annual"  readonly value="<?php echo $row_sal_data["hra_annual"]; ?>" placeholder="Enter basic"  value=""></td>
                                                </tr>
                                             <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">CCA <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="cca_monthly form-control" name="cca_monthly"  readonly value=""></td>
                                                 <td><input type="text" class="cca_annual form-control" name="cca_annual"  readonly value="<?php echo $row_sal_data["cca_annual"]; ?>" ></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="one-line">Medical Reimbursement<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="medical_monthly form-control" name="medical_monthly" readonly value="<?php echo $row_sal_data["medical_monthly"]; ?>"></td>
                                                 <td><input type="text" class="medical_annual form-control" name="medical_annual"  readonly value="<?php echo $row_sal_data["medical_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td> <input type="text" class="special_monthly form-control" name="special_monthly"  readonly value="<?php echo $row_sal_data["special_monthly"]; ?>"></td>
                                                 <td><input type="text" class="special_annual form-control" name="special_annual" readonly value="<?php echo $row_sal_data["special_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Mobile Allowance<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="mobile_monthly form-control" name="mobile_monthly"  readonly value="<?php echo $row_sal_data["mobile_monthly"]; ?>"></td>
                                                 <td><input type="text" class="mobile_annual form-control" name="mobile_annual" readonly value="<?php echo $row_sal_data["mobile_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Travel Allowance <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="travel_monthly form-control" name="travel_monthly"  readonly value="<?php echo $row_sal_data["travel_monthly"]; ?>"></td>
                                                 <td><input type="text" class="travel_annual form-control" name="travel_annual" readonly value="<?php echo $row_sal_data["travel_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="bonus_monthly form-control" name="bonus_monthly" readonly value="<?php echo $row_sal_data["bonus_monthly"]; ?>"></td>
                                                 <td><input type="text" class="bonus_annual form-control" name="bonus_annual" readonly value="<?php echo $row_sal_data["bonus_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="other_all_monthly form-control" name="other_all_monthly"   readonly value="<?php echo $row_sal_data["other_all_monthly"]; ?>"></td>
                                                 <td><input type="text" class="other_annual form-control" name="other_annual"  readonly value="<?php echo $row_sal_data["other_annual"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label"><b>Gross Pay(A)</b> <span style="color: red">*</span></label>
                                                 </div></td>
                                                   
                                                 <td><input type="text" class="gross_monthly form-control" name="gross_monthly" readonly value="<?php echo $row_sal_data["gross_monthly"]; ?>"></td>
                                      
                                                 <td><input type="text" class="gross_annual form-control" name="gross_annual" readonly value="<?php echo $row_sal_data["gross_annual"]; ?>"></td>
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
                                                <td> <input type="text" class="pf_monthly form-control" name="pf_monthly" readonly value="<?php echo $row_sal_data["pf_monthly"]; ?>"></td>
                                                 <td><input type="text" class="annual_pf form-control" name="annual_pf" readonly value="<?php echo $row_sal_data["annual_pf"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">ESI <span style="color: red">*</span></label>
                                                </div></td> 
                                                <td> <input type="text" class="esi_amount_monthly form-control" name="esi_amount_monthly" readonly value="<?php echo $row_sal_data["esi_amount_monthly"]; ?>"></td>
                                                 <td><input type="text" class="esi__annual form-control" name="esi__annual" readonly value="<?php echo $row_sal_data["esi__annual"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">TDS <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="tds_monthly form-control" name="tds_monthly" readonly value="<?php echo $row_sal_data["tds_monthly"]; ?>"></td>
                                                <td> <input type="text" class="annual_tds form-control" name="annual_tds" readonly value="<?php echo $row_sal_data["annual_tds"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">LWF <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="lwf_monthly form-control" name="lwf_monthly" readonly value="<?php echo $row_sal_data["lwf_monthly"]; ?>"></td>
                                                <td> <input type="text" class="lwf_annual form-control" name="lwf_annual" readonly value="<?php echo $row_sal_data["lwf_annual"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">PT<span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="pt_monthly form-control" name="pt_monthly" readonly value="<?php echo $row_sal_data["pt_monthly"]; ?>"></td>
                                                <td> <input type="text" class="pt_annual form-control" name="pt_annual" readonly value="<?php echo $row_sal_data["pt_annual"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">Other Deductions <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="other_deductions_monthly form-control" name="other_deductions_monthly" readonly value="<?php echo $row_sal_data["other_deductions_monthly"];?>"></td>
                                                <td> <input type="text" class="annual_other form-control" name="annual_other" readonly value="<?php echo $row_sal_data["annual_other"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label"><b>Total Deduction(B) </b> <span style="color: red">*</span></label>
                                                </div></td>
                                                <td>    <input type="text" class="total_deduction_b_monthly form-control" name="total_deduction_b_monthly" readonly value="<?php echo $row_sal_data["total_deduction_b_monthly"]; ?>"></td>
                                                <td> <input type="text" class="annual_total form-control" name="annual_total" readonly value="<?php echo $row_sal_data["annual_total"]; ?>"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label"><b>Net Pay </b> <span style="color: red">*</span></label>
                                                </div></td>
                                                <td>  <input type="text" class="net_monthly form-control" name="net_monthly" readonly value="<?php echo $row_sal_data["net_monthly"]; ?>"></td>
                                                <td> <input type="text" class="net_annual form-control" name="net_annual" readonly value="<?php echo $row_sal_data["net_annual"]; ?>"></td>
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
                                        <td><input type="text" class="gross_pay_monthly form-control" name="gross_pay_monthly" readonly value="<?php echo $row_sal_data["gross_pay_monthly"]; ?>"></td>
                                      
                                          <td><input type="text" class="total_amount_annual form-control" name="total_amount_annual" readonly value="<?php echo $row_sal_data["total_amount_annual"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="one-line">PF Contribution from the company<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="form-control pf_contribution_monthly" name="pf_contribution_monthly" readonly value="<?php echo $row_sal_data["pf_contribution_monthly"]; ?>"></td>
                                        <td> <input type="text" class="annual_pf_contribution form-control" name="annual_pf_contribution" readonly value="<?php echo $row_sal_data["annual_pf_contribution"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">ESI<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="esi_amounts_monthly form-control" name="esi_amounts_monthly" readonly value="<?php echo $row_sal_data["esi_amounts_monthly"]; ?>"> </td>
                                        <td> <input type="text" class="annual_esi form-control" name="annual_esi" id="annual_esi" readonly value="<?php echo $row_sal_data["annual_esi"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="accident_insurance_monthly form-control" name="accident_insurance_monthly" readonly value="<?php echo $row_sal_data["accident_insurance_monthly"]; ?>"></td>
                                        <td> <input type="text" class="accident_annual form-control" name="accident_annual" readonly value="<?php echo $row_sal_data["accident_annual"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Gratuity<span style="color: red">*</span></label>
                                        </div></td>
                                        <td>   <input type="text" class="grauity_monthly form-control" name="grauity_monthly" readonly value="<?php echo $row_sal_data["grauity_monthly"]; ?>"></td>
                                        <td> <input type="text" class="grauity_annual form-control" name="grauity_annual" readonly value="<?php echo $row_sal_data["grauity_annual"]; ?>"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label"><b>TOTAL BENEFIT</b><span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="total_benefit_monthly form-control" name="total_benefit_monthly" readonly value="<?php echo $row_sal_data["total_benefit_monthly"]; ?>"></td>
                                        <td> <input type="text" class="annual_benefit form-control" name="annual_benefit" readonly value="<?php echo $row_sal_data["annual_benefit"]; ?>"></td>
                                    </tr>  
                                  
                                  </tbody>
                                </table>      
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
