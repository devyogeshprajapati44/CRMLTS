<?php
error_reporting();
require_once 'connection.php';

//Fetching Info using employee user id.
$EmpID=$_REQUEST["EmpID"];//getting request from master_view_salary page.
$EmpID=EDV($EmpID,2);//Decoded the encode code here.


$fetch   = mysqli_query($conn, "SELECT `msd`.*,`emp`.`Id`,`emp`.`emp_name` FROM `employee` `emp` LEFT JOIN `master_salary_data` `msd` ON `emp`.`Id`=`msd`.`user_id` where `emp`.`Id`='$EmpID'");
$rowdata = mysqli_fetch_array($fetch);
$Employee_user_id=$rowdata["Id"];
$Employee_name=$rowdata["emp_name"];
$Emp_sal_status=$rowdata["status"];
//Fetching Info using employee user id.

if(isset($_POST["Addsalary"]))
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
  //Neww added Salary Status.
  $salary_status=1;
  $active_date=date('Y-m-d');
  //Neww added Salary Status.

     //Here Updateing status of salary e.g Active=1 and De-Active=2.
 if($Emp_sal_status=='1')
 {
  $deaactive_date=date('Y-m-d');
  echo $sal_status="UPDATE `master_salary_data` SET `status`='2',`deactive_date`='$deaactive_date' where user_id='$EmpID'";
  $run_status = mysqli_query($conn, $sal_status); 
 }
 //Here Updateing status of salary e.g Active=1 and De-Active=2.

 echo $sql_insert="INSERT INTO `master_salary_data`(`user_id`, `basic_monthly`, `basic_annual`, `hra_monthly`, `hra_annual`, `cca_monthly`, `cca_annual`, `medical_monthly`,
                          `medical_annual`, `special_monthly`, `special_annual`, `mobile_monthly`, `mobile_annual`, `travel_monthly`, `travel_annual`, `bonus_monthly`,
                          `bonus_annual`,`other_all_monthly`, `other_annual`, `gross_monthly`, `gross_annual`, `pf_monthly`, `annual_pf`, `esi_amount_monthly`, `esi__annual`,
                          `tds_monthly`,`annual_tds`, `lwf_monthly`, `lwf_annual`, `pt_monthly`, `pt_annual`, `other_deductions_monthly`, `annual_other`,`total_deduction_b_monthly`, 
                          `annual_total`, `net_monthly`, `net_annual`, `gross_pay_monthly`, `total_amount_annual`, `pf_contribution_monthly`, `annual_pf_contribution`,
                          `esi_amounts_monthly`, `annual_esi`, `accident_insurance_monthly`, `accident_annual`, `grauity_monthly`, `grauity_annual`, `total_benefit_monthly`,
                          `annual_benefit`,`status`,`active_date`,`updated_on`) VALUES  ('".$user_id."','".$basic_monthly."','".$basic_annual."','".$hra_monthly."','".$hra_annual."','".$cca_monthly."',
                          '".$cca_annual."','".$medical_monthly."','".$medical_annual."','".$special_monthly."','".$special_annual."','".$mobile_monthly."','".$mobile_annual."',
                          '".$travel_monthly."','".$travel_annual."','".$bonus_monthly."','".$bonus_annual."','".$other_all_monthly."','".$other_annual."','".$gross_monthly."',
                          '".$gross_annual."','".$pf_monthly."','".$annual_pf."','".$esi_amount_monthly."','".$esi__annual."','".$tds_monthly."','".$annual_tds."','".$lwf_monthly."',
                          '".$lwf_annual."','".$pt_monthly."','".$pt_annual."','".$other_deductions_monthly."','".$annual_other."','".$total_deduction_b_monthly."','".$annual_total."',
                          '".$net_monthly."','".$net_annual."','".$gross_pay_monthly."','".$total_amount_annual."','".$pf_contribution_monthly."','".$annual_pf_contribution."',
                          '".$esi_amounts_monthly."','".$annual_esi."','".$accident_insurance_monthly."','".$accident_annual."','".$grauity_monthly."','".$grauity_annual."',
                          '".$total_benefit_monthly."','".$annual_benefit."','".$salary_status."','".$active_date."','now()')"; 

 

   $run_Sub = mysqli_query($conn, $sql_insert); 
       if($run_Sub)
          {
      $message="Record Save successfully";
      header("location:PFC.php?PageName=salary_master_data&Mgs=1");
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
      <strong><i class="bi bi-check"></i> Success !</span>Data Saved.</strong>
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
               <h2 style="color:#012970;margin-left:575px;margin-top:-36px;"><b>ADD SALARY SLIP</b></h2>
                 </nav>
                <div class="form-group">
                      <fieldset class="scheduler-border">
                        <Form action="" method="POST"><br> 
                             <div class="row">
                                <div class="col-12">
                                   
                                    <select name="user_id"  class="fstdropdown-select form-control user_id" id="emp_name" data-live-search="true"  data-size="8" tabindex="null">
                                        <option value="NA">--SELECT EMPLOYEE--</option>
                                        <?php 
                                            //$sql="SELECT * FROM `employee` where `emp_status`='1'";
                                            $sql="SELECT `msd`.*,`emp`.`Id`,`emp`.`emp_name` FROM `employee` `emp` LEFT JOIN `master_salary_data` `msd` ON `emp`.`Id`=`msd`.`user_id` where `emp`.`Id`!='1' and `emp`.`emp_status`='1'";
                                            //and`msd`.`status`= 1
                                            $result = mysqli_query($conn, $sql);
                                            //$row    = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                                            //$row    = mysqli_fetch_array($result);
                                            while( $row = mysqli_fetch_array($result))
                                            {
                                        ?>
                                        <!-- <option value="<?php //echo $row["Id"];?>"><?php //echo $row["emp_name"];?></option> -->
                                        <option value="<?php echo $row["Id"];?>" <?php if($row["Id"]==$rowdata["Id"]){ echo 'selected'; }?>><?php echo $row["emp_name"].' (Last Added On:-'.$row["created_on"].')';?></option>
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
                                                  <td><input type="text" class="basic_monthly form-control" name="basic_monthly" id="basic_plus" onblur="addsalary()"  placeholder="Enter basic" ></td>
                                                  <td><input type="text" class="basic_annual form-control" name="basic_annual" id="basic_annual"  placeholder="Enter basic"   value=""></td>
                                               </tr>
                                               <tr>
                                                <td scope="row">
                                                   <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label> 
                                                </div></td>
                                                <td><input type="text" class="hra_monthly form-control" name="hra_monthly"  id="har_plus"   onblur="addsalary()"></td>
                                                <td><input type="text" class="hra_annual form-control" name="hra_annual" id="hra_annual"  placeholder="Enter basic"  value=""></td>
                                                </tr>
                                             <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">CCA <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="cca_monthly form-control" name="cca_monthly"   id="cca"></td>
                                                 <td><input type="text" class="cca_annual form-control" name="cca_annual" id="cca_annual" value="-"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="one-line">Medical Reimbursement<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="medical_monthly form-control" name="medical_monthly" id="medical_reimb"></td>
                                                 <td><input type="text" class="medical_annual form-control" name="medical_annual" id="medical_annual" value="-"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td> <input type="text" class="special_monthly form-control" name="special_monthly"   id="special_plus" onblur="addsalary()"></td>
                                                 <td><input type="text" class="special_annual form-control" name="special_annual" id="special_annual" value=""></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Mobile Allowance<span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="mobile_monthly form-control" name="mobile_monthly"   id="mobile_monthly" ></td>
                                                 <td><input type="text" class="mobile_annual form-control" name="mobile_annual" id="mobile_annual" value="-" ></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Travel Allowance <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="travel_monthly form-control" name="travel_monthly"   id="travel_monthly" ></td>
                                                 <td><input type="text" class="travel_annual form-control" name="travel_annual" id="travel_annual" value="-"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="bonus_monthly form-control" name="bonus_monthly"   id="bonus_monthly" ></td>
                                                 <td><input type="text" class="bonus_annual form-control" name="bonus_annual" id="bonus_annual" value="-"></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                 </div></td>
                                                 <td><input type="text" class="other_all_monthly form-control" name="other_all_monthly"   id="otherallowne" onblur="addsalary()" ></td>
                                                 <td><input type="text" class="other_annual form-control" name="other_annual" id="other_annual" value=""></td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                 <div class="col-4">
                                                 <label for="text" class="form-label"><b>Gross Pay(A)</b> <span style="color: red">*</span></label>
                                                 </div></td>
                                                   
                                                 <td><input type="text" class="gross_monthly form-control" name="gross_monthly" id="gross_pay" onblur="Sum()"></td>
                                      
                                                 <td><input type="text" class="gross_annual form-control" name="gross_annual" id="total_amount" onblur="total_annual()"></td>
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
                                                <td> <input type="text" class="pf_monthly form-control" name="pf_monthly"  id="pf_deduction" onblur="deduction()"></td>
                                                 <td><input type="text" class="annual_pf form-control" name="annual_pf" id="annual_pf" value=""></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">ESI <span style="color: red">*</span></label>
                                                </div></td> 
                                                <td> <input type="text" class="esi_amount_monthly form-control" name="esi_amount_monthly" id="esi_deductiont" onblur="deduction()"></td>
                                                 <td><input type="text" class="esi__annual form-control" name="esi__annual" id="esi__annual" value=""></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">TDS <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="tds_monthly form-control" name="tds_monthly"></td>
                                                <td> <input type="text" class="annual_tds form-control" name="annual_tds" id="annual_tds" value="-"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">LWF <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="lwf_monthly form-control" name="lwf_monthly"></td>
                                                <td> <input type="text" class="lwf_annual form-control" name="lwf_annual" id="lwf_annual" value="-"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">PT<span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="pt_monthly form-control" name="pt_monthly" ></td>
                                                <td> <input type="text" class="pt_annual form-control" name="pt_annual" id="pt_annual" value="-"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label">Other Deductions <span style="color: red">*</span></label>
                                                </div></td>
                                                <td> <input type="text" class="other_deductions_monthly form-control" name="other_deductions_monthly" ></td>
                                                <td> <input type="text" class="annual_other form-control" name="annual_other" id="annual_other" value=""></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label"><b>Total Deduction(B) </b> <span style="color: red">*</span></label>
                                                </div></td>
                                                <td>    <input type="text" class="total_deduction_b_monthly form-control" name="total_deduction_b_monthly" id="total_deductions" onblur="total_net()" ></td>
                                                <td> <input type="text" class="annual_total form-control" name="annual_total" id="total__annual" onblur="total_net_pay()"></td>
                                             </tr> 
                                             <tr>
                                             <td>
                                               <div class="col-4">
                                               <label for="text" class="form-label"><b>Net Pay </b> <span style="color: red">*</span></label>
                                                </div></td>
                                                <td>  <input type="text" class="net_monthly form-control" name="net_monthly" id="net_pay_all" onblur="net_pay_deduction()"></td>
                                                <td> <input type="text" class="net_annual form-control" name="net_annual" id="net_annual" onblur="net_pay_amount()"></td>
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
                                        <td><input type="text" class="gross_pay_monthly form-control" name="gross_pay_monthly" id="gross_pay_test" onblur="Sum()"></td>
                                      
                                          <td><input type="text" class="total_amount_annual form-control" name="total_amount_annual" id="total_amount_test" onblur="total_annual()"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="one-line">PF Contribution from the company<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="form-control pf_contribution_monthly" name="pf_contribution_monthly"  id="contribution_pf"onblur="ctc_net()"></td>
                                        <td> <input type="text" class="annual_pf_contribution form-control" name="annual_pf_contribution" id="annual_pf_contribution" value=""></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">ESI<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="esi_amounts_monthly form-control" name="esi_amounts_monthly"  id="esi_amounts_annual" onblur="ctc_net()"></td>
                                        <td> <input type="text" class="annual_esi form-control" name="annual_esi" id="annual_esi" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="accident_insurance_monthly form-control" name="accident_insurance_monthly"></td>
                                        <td> <input type="text" class="accident_annual form-control" name="accident_annual" id="accident_annual" value="-"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Gratuity<span style="color: red">*</span></label>
                                        </div></td>
                                        <td>   <input type="text" class="grauity_monthly form-control" name="grauity_monthly"></td>
                                        <td> <input type="text" class="grauity_annual form-control" name="grauity_annual" id="grauity_annual" value="-"></td>
                                    </tr> 
                                    <tr>
                                        <td>
                                        <div class="col-4">
                                        <label for="text" class="form-label"><b>TOTAL BENEFIT</b><span style="color: red">*</span></label>
                                        </div></td>
                                        <td> <input type="text" class="total_benefit_monthly form-control" name="total_benefit_monthly" id="total_benefit_ctc"  onblur="total_ctc()"></td>
                                        <td> <input type="text" class="annual_benefit form-control" name="annual_benefit" id="total_benefit_amounts" onblur="total_ctc_amount()"></td>
                                    </tr>  
                                  
                                  </tbody>
                                </table>      
                            </div>
                           <div class="modal-footer">
                         <input type="submit" name="Addsalary" class="btn btn-primary add_salary" value="Submit" style="margin-right: 673px;width: 106px;padding: 10px;"> 
                       </div><br>
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
<script type="text/Javascript">


   function addsalary()
   {

    // Monthly Gross Pay 
    var basic_monthly,basic_annual, hra_monthly,hra_annual,special_advance,special_annual,other_all,other_annual,gross_pays,gross_annual
    ,pf_contribution,annual_pf_contribution,esi_amounts,esi_annual;

       basic_monthly=document.getElementById("basic_plus").value;
       basic_annual=basic_monthly*12;
        net=parseInt(basic_monthly)
        document.getElementById('basic_annual').value=basic_annual;

        hra_monthly=document.getElementById("har_plus").value;
        hra_annual=hra_monthly*12;
        net=parseInt(hra_monthly)
        document.getElementById('hra_annual').value=hra_annual;

        special_monthly=document.getElementById("special_plus").value;
        special_annual=special_monthly*12;
        net=parseInt(special_monthly)
        document.getElementById('special_annual').value=special_annual;

        other_all_monthly=parseInt(document.getElementById("otherallowne").value);
        other_all_monthly=other_all_monthly * 12;
        
        document.getElementById('other_annual').value=other_all_monthly;



        // gross_pays=document.getElementById("basiss10").value;
        // gross_annual=gross_pays*12;
        // net=parseInt(gross_pays)
        // document.getElementById('gross_annual').value=gross_annual;

        // pf_contribution=document.getElementById("basiss8").value;
        // annual_pf_contribution=pf_contribution*12;
        // net=parseInt(pf_contribution)
        // document.getElementById('annual_pf_contribution').value=annual_pf_contribution;

        // esi_amounts=document.getElementById("basiss9").value;
        // esi_annual=esi_amounts*12;
        // net=parseInt(esi_amounts)

        // document.getElementById('esi_annual').value=esi_annual;
        // var Sum=basic+hra_no+other_all;
        //document.getElementById('gross_pay').value=Sum;

        
        // gross_pay_a=parseInt(document.getElementById('gross_pay').value);
        // var mult=gross_pay_a * 12;
        // document.getElementById('total_amount').value=mult;
        
   }


   function Sum()
   {
          let basic_monthly, hra_monthly, special_advance , other_all_monthly;
          basic_monthly = parseInt(document.getElementById("basic_plus").value);
          hra_monthly = parseInt(document.getElementById("har_plus").value);
          special_advance = parseInt(document.getElementById("special_plus").value);
          other_all = parseInt(document.getElementById("otherallowne").value);
          
          sum = basic_monthly + hra_monthly + special_monthly + other_all_monthly 
          
          document.getElementById("gross_pay").value=sum;
   }

   function total_annual()
   {
          
    let gross_pay_a,mult;
    
    gross_pay_a=document.getElementById('gross_pay').value;

    mult=gross_pay_a * 12;
 
    document.getElementById('total_amount').value=mult;

    // console.log(document.getElementById('total_amount').value=mult);
    // return false;   
   }
   function Sum()
   {
          let basic_monthly, hra_monthly, special_advance , other_all;
          basic_monthly = parseInt(document.getElementById("basic_plus").value);
          hra_monthly = parseInt(document.getElementById("har_plus").value);
          special_advance = parseInt(document.getElementById("special_plus").value);
          other_all = parseInt(document.getElementById("otherallowne").value);
          
          sum = basic_monthly + hra_monthly + special_advance + other_all 
          
          document.getElementById("gross_pay").value=sum;
   }

   function total_annual()
   {
          
    let gross_pay_a,mult,total_amount;
    
    gross_pay_a=document.getElementById('gross_pay').value;
    total_amount=document.getElementById('total_amount').value

    mult=gross_pay_a * 12;
 
    document.getElementById('total_amount').value=mult;

    if(gross_pay_a!='')
    {
      document.getElementById('gross_pay_test').value=gross_pay_a;
    }

    if(total_amount!='')
    {
      document.getElementById("total_amount_test").value=total_amount;
    }    
    
    // console.log(document.getElementById('total_amount').value=mult);
    // return false;   
   }

   

// Duduction Employee


function deduction(){

  var pf_monthly ,pf_annual , esi_amount_monthly,esi__annual

      pf_monthly=document.getElementById("pf_deduction").value;
        annual_pf=pf_monthly * 12;
        net=parseInt(pf_monthly)
        document.getElementById('annual_pf').value=annual_pf;

        esi_amount_monthly=document.getElementById("esi_deductiont").value;
        esi__annual=esi_amount_monthly*12;
        net=parseInt(esi_amount_monthly)
        document.getElementById('esi__annual').value=esi__annual;

}

function total_net()

   {
          let pf_monthly, esi_amount;
          pf_monthly = parseInt(document.getElementById("pf_deduction").value);
          esi_amount_monthly = parseInt(document.getElementById("esi_deductiont").value);
          
          sum = pf_monthly + esi_amount_monthly 
          
          document.getElementById("total_deductions").value=sum;
   }
   function total_net_pay()

   {
    let total_deductions_a,mult;
    
    total_deductions_a=document.getElementById('total_deductions').value;

    mult=total_deductions_a * 12;
 
 
    document.getElementById('total__annual').value=mult;
   }

   function net_pay_deduction()

   {
          let gross_pay, total_deduction_b;
          gross_pay = parseInt(document.getElementById("gross_pay").value);
          total_deduction_b = parseInt(document.getElementById("total_deductions").value);

          sum = gross_pay - total_deduction_b 
          
          document.getElementById("net_pay_all").value=sum;
   }

   function net_pay_amount()

   {
    let net_pay_all,mult;
    
    net_pay_all=document.getElementById('net_pay_all').value;

    mult=net_pay_all * 12;
 
 
    document.getElementById('net_annual').value=mult;
   }

      // Cost to the company 
      
function ctc_net()

{
  var pf_contribution_monthly,annual_pf_contribution , esi_amounts, annual_esi;
  
  pf_contribution_monthly=document.getElementById("contribution_pf").value;
        annual_pf_contribution=pf_contribution_monthly * 12;
        net=parseInt(pf_contribution_monthly)
        document.getElementById('annual_pf_contribution').value=annual_pf_contribution;

        esi_amounts_monthly=document.getElementById("esi_amounts_annual").value;
        annual_esi=esi_amounts_monthly*12;
        net=parseInt(esi_amounts_monthly)
        document.getElementById('annual_esi').value=annual_esi;
   
}


 function total_ctc()
 {

          var gross_pay, pf_contribution , esi_amounts;
          gross_pay = parseInt(document.getElementById("gross_pay_test").value);
          pf_contribution = parseInt(document.getElementById("contribution_pf").value);
          esi_amounts = parseInt(document.getElementById("esi_amounts_annual").value);
          sum = gross_pay + pf_contribution + esi_amounts
  
          document.getElementById("total_benefit_ctc").value=sum;
 }

 function total_ctc_amount()

{
 let total_benefit_ctc,mult;
 
 total_benefit_ctc=document.getElementById('total_benefit_ctc').value;

 mult=total_benefit_ctc * 12;


 document.getElementById('total_benefit_amounts').value=mult;
}
</script>
<!-- ============================================ -->
