<?php
include 'connection.php';
$EmpID=$_REQUEST["ID"];
// //echo $sql="SELECT * FROM `master_salary_data` WHERE `Id`='$EmpID'";
// //$EmpID=EDV($EmpID,2);
//echo $sql="SELECT * FROM `add_offer_letter_salary` WHERE `Id`='$EmpID'";
//Salary Mode
// $fetch_salary_mode   = mysqli_query($conn, "SELECT * FROM `add_offer_letter_salary` WHERE `Id`='$EmpID'");
// $salary_data = mysqli_fetch_array($fetch_salary_mode);
// $salarymode=$salary_data["basic_monthly"];
//Salary Mode

// //Salary Mode
// $fetch_employee   = mysqli_query($conn, "SELECT `ofd`.*,`desig`.`Designation` FROM `offer_letters_details` `ofd` LEFT JOIN `designation` `desig` ON `ofd`.`desig_id` =`desig`.`desig_id`  WHERE `ofd`.`Id` ='$EmpID'");
// $employee_data = mysqli_fetch_array($fetch_employee);
// $employee_data_res=$employee_data["employee_name"];
// //Salary Mode

//FETCHING A EMPLOYEE DETAILS.
$fetch_salary_m   = mysqli_query($conn, "SELECT `aols`.*,`oldls`.*,`desig`.`Designation` FROM `offer_letters_details` `oldls` LEFT JOIN  `add_offer_letter_salary` `aols` ON `oldls`.`Id`=`aols`.`emp_id` LEFT JOIN `designation` `desig` ON `oldls`.`desig_id` =`desig`.`desig_id` WHERE `oldls`.`Id`='$EmpID'");
$salary_data = mysqli_fetch_array($fetch_salary_m);
//FETCHING A EMPLOYEE DETAILS.
?>
<style>

.table1
{
  
  width: 852px;
  margin-left: 24px;
}
.table2
{
  width: 852px;
  margin-left: 24px;
}
.table3
{
  width: 852px;
  margin-left: 24px;
}
#images
{
  width: 406px;
    height: 143px;
    margin-top: 10px;
    margin-right: 167px;
}

.td_one
{
    width: 611px;
    text-align: center;
    padding: 15px;
    position: static;
}

.td_two
{
width: 418px;
text-align: center;
padding: 15px;
position: static;
}
.td_heading
{
  width: 415px;
}
 
</style>
<style>
table, th, td {
  border: 1px solid black;
}
.one-line 
  {
    white-space: nowrap;   
  }
</style>
<main id="main" class="main">
  <?php
  $currentDate = date('Y-m-d'); // Get the current date (in the format YYYY-MM-DD)

  // Extract the year and month from the current date
  list($year, $month, $day) = explode('-', $currentDate);
  
  if ($month >= 4) {
      // If the current month is April or later, it's the financial year of the current year to the next year
      $startYear = substr($year, -2); // Get the last two digits of the year
      $endYear = substr($year + 1, -2); // Get the last two digits of the next year
  } else {
      // If the current month is before April, it's the financial year of the previous year to the current year
      $startYear = substr($year - 1, -2); // Get the last two digits of the previous year
      $endYear = substr($year, -2); // Get the last two digits of the current year
  }
  
  $financialYear = $startYear . '-' . $endYear;
  
  //echo "Current Financial Year: '$financialYear'";
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
              <form action="#" method="GET">
              <a class="btn btn-warning text-dark" href="PFC.php?PageName=view_offer_letter" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:left;margin-left:18px;" role="button">Back</a>
              </form>
              <h2 style="color:#012970;margin-right:80px;margin-top: 8px;"><b>DOWNLOAD OFFER LETTER</b></h2><br/><br/>
              </nav><br><br>
                    <div class="modal-body">
                    <div id="outerdiv">
                  <div id="tableContainer" style="margin-left: 63px;">
                  <h5 class="card-title text-center"><img src="assets/img/companylatech.png"  id="images"  alt="LatechLogo" style="height: 101px;width: 973px;margin-left: -21px;margin-top: 19px;"></h5></br>
                  <!-- <h5 style="color:#012970;margin-left:-136px;margin-top:-155px;text-align: center;font-size:45px;" id="textid"><b>LATECH SOLUTIONS</b></h5><br>
                  <h5 style="color:#012970;margin-left:-136px;margin-top: -13px;text-align: center;font-size:45px;" id="h-partss"><b>GST NO: 09AAKFL1138N1ZX</b></h5><br> -->
                    <div class="appointment-letter" style="margin-left: 78px;text-align: justify;">
                  <br/><br/>
                    <h4 style="color:#012970;">LTS/OFFER LETTER/<?php echo $financialYear;?>/<?php echo $salary_data["Id"];?> <br/></h4>
                                       <p><b style="color:black;"><?php echo date('d-F-Y') . "<br>";?></b></p>
                                        <p style="color:#012970;"><?php echo $salary_data["employee_name"];?></p>
                                        <p style="color:#012970;"><?php echo $salary_data["address"];?></p>
                                        <p>Dear <b style="color:black;"><?php echo $salary_data["employee_name"];?></b>,</p>
                                        <p> We take great pleasure in inviting you to be an integral part of <b style="color:black;">La Tech Solutions.</b><br/>With reference to your application and subsequent interview you had with us, we are pleased to offer you the position of <b style="color:black;"><?php echo '"'.$salary_data["Designation"].'"';?></b> on terms and conditions agreed upon between us, which will be specified in the formal letter of appointment that you have agreed to accept, on the date of joining our company. The date of joining shall not be later than 
                                        <b style="color:black;"><?php echo $salary_data["joining_date"].'.';?></b><br/>Your posting will be for the support services on <b style="color:black;">La Tech Solutions.</b></p>
                                        <p> You will be deputed at <b style="color:black;"> any were in Rajasthan (According to project requirement).</b></p>
                                        <p>Your salaries and other terms of employment are explained to you in detail however the same is printed in the annexure sheet.<b>(See Annexure).</b></p>
                                        <p>The revisions in your salary will not be automatic but will be subject to satisfactory work, regular attendance, good conduct and performance appraisal is your superiors.</p>
                                        <p>Reporting: - <b style="color:black;">Project Manager.</b></p>

                                        <p>As a part of the joining process, you are requested to send us the following documents within the specified period. Photocopies of</p>
                                        <ul>
                                            <li>SSLC/Degree/ Diploma/ Highest Qualification Certificate.</li>
                                            <li>Relieving letter from previous organization or accepted Resignation letter Experience letter.</li>
                                            <li>Permanent address proof - Aadhar Card/ Passport.</li>
                                            <li>Pan Card</li>
                                            <li>1 Passport size photograph</li>
                                        </ul>

                                        <p>We look forward to your joining the project and wish you all success.</p>

                                        <p><b style="color:black;">You're sincerely,</b><br/>
                                        <img src="assets/img/amansir_sign.png" alt="authorised signature" width="150px" height="50px"/>
                                        </p>
                                        <p><b style="color:black;">Aman Singh Sengar,<br/>
                                        Senior HR and Legal Executive</b></p>
                                        </p><br><br><br><br>
                                        <footer class="footer" id="footer-letter" style="margin-top: 84px;">
                                                <div class="copyright" style="margin-right:100px;">&copy; <b>Office No. 5A 39, 6TH Floor, Cloud -9, Tower, Vaishali, Sector-1, Ghaziabad, 201010</b><strong></div>
                                                <div  class="copyright" style="margin-right:96px;"><span><b> +91 9650458765</b></span></div>
                                                <div class="copyright" style="margin-right:96px;"></strong><u><b>info@latech-solutions.com</b></u> </div>
                                              </footer>
                                              </div></div>                
                         <div id="outermax">
                           <div id="tableContainer2" style="margin-top:14px;">
                              <div class="card-body">
                              <p style="color:#012970;margin-top:37px;" id="salarystruct"><center><b>SALARY STRUCTURE</b></center></p><br>
                                <table  class="table table-bordered border-dark" id="table1"  style="width:100%;margin-top:-25px;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="td_one">Monthly</th>
                                            <th class="td_two">Annual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td scope="row">
                                          <div >
                                            <label for="text" class="one-line">Basic Pay</label></div></td>
                                            <td class="td_one"><?php echo $salary_data["basic_monthly"];?></td>
                                            <td class="td_two"><?php echo $salary_data["basic_annual"];?></td>
                                         </tr>
                                         <tr>
                                          <td scope="row">
                                             <div >
                                            <label for="text" class="one-line">HRA </label> 
                                          </div></td>
                                          <td class="td_one"><?php echo $salary_data["hra_monthly"];?></td>
                                          <td class="td_two"><?php echo $salary_data["hra_annual"];?></td>
                                          </tr>
                                       <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line">CCA </label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["cca_monthly"];?></td>
                                          <td class="td_two"><?php echo $salary_data["cca_annual"];?></td>
                                      </tr>
                                      <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line">Medical Reimbursement</label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["medical_monthly"];?></td>
                                          <td class="td_two"><?php echo $salary_data["medical_annual"];?></td>
                                      </tr>
                                      <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line">Special Allowance</label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["special_monthly"];?></td>
                                           <td class="td_two"><?php echo $salary_data["special_annual"];?></td>
                                      </tr>
                                      <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line">Mobile Allowance</label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["mobile_monthly"];?></td>
                                           <td class="td_two"><?php echo $salary_data["mobile_annual"];?></td>
                                      </tr>
                                      <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line">Travel Allowance </label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["travel_monthly"];?></td>
                                           <td class="td_two"><?php echo $salary_data["travel_annual"];?></td>
                                      </tr>
                                      <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line">Monthly Bonus</label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["bonus_monthly"];?></td>
                                           <td class="td_two"><?php echo $salary_data["bonus_annual"];?></td>
                                      </tr>
                                      <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line">Other Allowance </label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["other_all_monthly"];?></td>
                                           <td class="td_two"><?php echo $salary_data["other_annual"];?></td>
                                      </tr>
                                      <tr>
                                           <td>
                                           <div >
                                           <label for="text" class="one-line"><b>Gross Pay(A)</b> </label>
                                           </div></td>
                                           <td class="td_one"><?php echo $salary_data["gross_monthly"];?></td>
                                           <td class="td_two"><?php echo $salary_data["gross_annual"];?></td>
                                      </tr>
                                      
                              </tbody>
                          </table>
                          <h5 style="color:#012970;"><center><B>DEDUCTION</B></center></h5><br>
                            <table  class="table table-bordered border-dark" id="table2" style="width:100%;margin-top:-23px;">
                              <tbody>
                                    <tr>
                                       <td>
                                         <div >
                                           <label for="text" class="one-line">PF (Employee Contribution)</label>
                                          </div></td>
                                          <td class="td_one"><?php echo $salary_data["pf_monthly"];?></td>
                                          <td class="td_two"><?php echo $salary_data["annual_pf"];?></td>
                                       </tr> 
                                       <tr>
                                       <td>
                                         <div >
                                         <label for="text" class="one-line">ESI </label>
                                          </div></td> 
                                          <td class="td_one"><?php echo $salary_data["esi_amount_monthly"];?></td>
                                           <td class="td_two"><?php echo $salary_data["esi__annual"];?></td>
                                       </tr> 
                                       <tr>
                                       <td>
                                         <div >
                                         <label for="text" class="one-line">TDS </label>
                                          </div></td>
                                          <td class="td_one"> <?php echo $salary_data["tds_monthly"];?></td>
                                          <td class="td_two"> <?php echo $salary_data["annual_tds"];?></td>
                                       </tr> 
                                       <tr>
                                       <td>
                                         <div >
                                         <label for="text" class="one-line">LWF </label>
                                          </div></td>
                                          <td class="td_one"> <?php echo $salary_data["lwf_monthly"];?></td>
                                          <td class="td_two"> <?php echo $salary_data["lwf_annual"];?></td>
                                       </tr> 
                                       <tr>
                                       <td>
                                         <div >
                                         <label for="text" class="one-line">PT</label>
                                          </div></td>
                                          <td class="td_one"> <?php echo $salary_data["pt_monthly"];?></td>
                                          <td class="td_two"> <?php echo $salary_data["pt_annual"];?></td>
                                       </tr> 
                                       <tr>
                                       <td>
                                         <div >
                                         <label for="text" class="one-line">Other Deductions </label>
                                          </div></td>
                                          <td class="td_one"> <?php echo $salary_data["total_deduction_b_monthly"];?></td>
                                          <td class="td_two"> <?php echo $salary_data["total_deduction_b_monthly"];?></td>
                                       </tr> 
                                       <tr>
                                       <td>
                                         <div >
                                         <label for="text" class="one-line"><b>Total Deduction(B) </b> </label>
                                          </div></td>
                                          <td class="td_one"><?php echo $salary_data["total_deduction_b_monthly"];?></td>
                                          <td class="td_two"><?php echo $salary_data["annual_total"];?></td>
                                       </tr> 
                                       <tr>
                                       <td>
                                         <div >
                                         <label for="text" class="one-line"><b>Net Pay </b> </label>
                                          </div></td>
                                          <td class="td_one"><?php echo $salary_data["net_monthly"];?></td>
                                          <td class="td_two"><?php echo $salary_data["net_annual"];?></td>
                                       </tr> 
                               </tbody>
                              </table><br/>
                              <h5 style="color:#012970;margin-top: -26px;"><center><B>COST TO THE COMPANY</B></center></h5><br/><br/>
                            <table  class="table table-bordered border-dark" id="table3" style="width:100%;margin-top: -38px;">   
                              <tr>
                                  <td>
                                  <div >
                                  <label for="text" class="form-label">Gross Pay </label>
                                  </div></td>
                                  <td class="td_one"><?php echo $salary_data["gross_pay_monthly"];?></td>
                                  <td class="td_two"><?php echo $salary_data["total_amount_annual"];?></td>
                              </tr> 
                              <tr>
                                  <td>
                                  <div >
                                  <label for="text" class="one-line">PF Contribution from the company</label>
                                  </div></td>
                                  <td class="td_one"><?php echo $salary_data["pf_contribution_monthly"];?></td>
                                  <td class="td_two"><?php echo $salary_data["annual_pf_contribution"];?></td>
                              </tr> 
                              <tr>
                                  <td>
                                  <div >
                                  <label for="text" class="one-line">ESI</label>
                                  </div></td>
                                  <td class="td_one"> <?php echo $salary_data["esi_amounts_monthly"];?></td>
                                  <td class="td_two">  <?php echo $salary_data["annual_esi"];?></td>
                              </tr>
                              <tr>
                                  <td>
                                  <div >
                                  <label for="text" class="one-line">Accident Insurance</label>
                                  </div></td>
                                  <td class="td_one"><?php echo $salary_data["accident_insurance_monthly"];?></td>
                                  <td class="td_two"> <?php echo $salary_data["accident_annual"];?></td>
                              </tr> 
                              <tr>
                                  <td>
                                  <div >
                                  <label for="text" class="one-line">Gratuity</label>
                                  </div></td>
                                  <td class="td_one"> <?php echo $salary_data["grauity_monthly"];?></td>
                                  <td class="td_two"> <?php echo $salary_data["grauity_annual"];?></td>
                              </tr> 
                              <tr>
                                  <td>
                                  <div >
                                  <label for="text" class="one-line"><b>TOTAL BENEFIT</b></label>
                                  </div></td>
                                  <td class="td_one"><?php echo $salary_data["total_benefit_monthly"];?></td>
                                  <td class="td_two"><?php echo $salary_data["annual_benefit"];?></td>
                              </tr>  
                            
                            </tbody>
                                  </table>
                                  <p id="salary-footer"><b>Note:- The Statutory deductions like TDS, proof, Tax, ESI, Provident Funds ETC. will be applicable as per the law time to time.</b></p>
                                <!-- <table  class="table-striped" id="table4" style="width:90%">
                                <tr>
                                    <td>
                                    <div class="col-8">
                                    <label for="text" class="form-label"><b>Note:-</b> The Statutory deductions like TDS, proof, Tax, ESI, Provident Funds ETC. will be applicable as per the law time to time</label>
                                    </div></td>
                                    </tr>
                                 </table> -->
                               </div></div><br><br>
                                 <div id="outerdiv3">
                                  <div id="tableContainer1" class="summary">
                                 <tr>
                                  <td>
                                <div class="col-12">
                                <h5 class="card-title text-center"><img src="assets/img/companylatech.png" alt="LatechLogo" id="sublogo" style="height: 83px;width: 935px;margin-left: -35px"></h5></br>
                                 <p>This offer is valid till <b style="color:black;"><?php echo  date('d-F-Y', strtotime('+3 days')); ?></b> only if:</p>
                                <ol class="m" style="list-style-type: lower-latin;">
                                <li>La Tech Solutions, Receives your resignation letter duly acknowledged by your current Employer and all the essential documents as mentioned above for on Boarding on or before. <b style="color:black;"><?php echo date('d-F-Y', strtotime('+5 days'));?></b> </li>
                                <li>Positive reports are received from your references and verification is completed satisfactorily by LaTech Solutions.</li>
                                <li>Other Terms and Conditions will update you at the time of Joining.</li>
                                </ol>
                                </div>
                              </td>
                            </tr>

                             <footer class="footer" style="margin-top: 7px;margin-right: -75px;">
                                  <div class="copyright" style="margin-right:100px;" id="footersalary">&copy; <b>Office No. 5A 39, 6TH Floor, Cloud -9, Tower, Vaishali, Sector-1, Ghaziabad, 201010</b><strong></div>
                                  <div  class="copyright" style="margin-right:96px;"><span><b> +91 9650458765</b></span></div>
                                  <div class="copyright" style="margin-right:96px;"></strong><u><b>info@latech-solutions.com</b></u> </div>
                                  </footer>
                           
                             </div></div><br>
                            </div>
                            </div>
                            <br/>
                            <button  onclick="printDiv('outerdiv')" class="btn btn-primary" style="margin-left: 643px">Print Pay Slip</button>
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
</main>
<script type="text/Javascript">
function printDiv(divId) {
    var divToPrint = document.getElementById(divId);
    var newWin = window.open('', 'Print-Window');
    newWin.document.open();
    newWin.document.write('<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"><style>.table-bordered{border:2px solid black;}#table1 td, #table2 td, #table3 td {width: 100px;}.appointment-letter{margin-left:10px;margin-right:100px;} .summary{margin-left: 73px;margin-right: 73px;} #images{height: 101px;width: 973px;margin-left: -21px;margin-top: 19px;}#footersalary{margin-top: 1000px;}.copyright{text-align: center;}#sublogo{height:96px;width:934px;margin-left:-24px;margin-top:100px;text-align: center;}#tableContainer2{width:1000px;margin-left:10px;margin-top:66px;} .one-line{white-space: nowrap;width:100px;} @page{size: portrait;margin:20px;margin-top: 20px; }@media print { html,body { width:100%; } #outerdiv{width:100%;text-align: justify;margin-left:15px;}#outermax{width:100%;}#footer-letter{margin-bottom: 100px;}#salary-footer{margin-bottom:-29px;margin-left:15px;}#outerdiv3{margin-top:300px;}#table1{width:100%;margin-left:15px;margin-top:105px;}#table2{width:100%;margin-left:15px;margin-top:250px;}#table3{width:100%;margin-left:15px;text-align:left;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
// return false;
    newWin.document.close();

    // To ensure compatibility with some browsers, use a timeout before closing the new window
    setTimeout(function () {
        newWin.print();
        newWin.close();
    }, 100);
}
</script>


