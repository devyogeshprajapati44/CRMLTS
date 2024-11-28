<?php
//error_reporting(0);
include 'connection.php';
include("Pages/pagi_script.php");
$EmpID=$_REQUEST["EmpID"];
$month_naame=$_REQUEST["monthname"];
      $EmpID=EDV($EmpID,2);
      $month_naame=EDV($month_naame,2);

      $sql_Details="SELECT `ea`.`user_id`,MONTHNAME(`check_in_date`) as `MonthName`,year(`check_in_date`) as `YearName`,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` WHERE `ea`.`user_id` = '$EmpID' and MONTHNAME(`ea`.`check_in_date`)='$month_naame'";
      $result_details = mysqli_query($conn,$sql_Details);
      $row_details = $result_details->fetch_assoc();
      $month_name=$row_details["MonthName"];
      $YearName=$row_details["YearName"];
      $Employee_name=$row_details["emp_name"];

?>
  <main id="main" class="main">
         <!-- Start dashboard inner -->
<div class="midde_cont">
  <div class="container-fluid">
  <div class="row column1">
  <div class="col-md-12">
        <div class="container py-5">
            <div class="card mt-3">
                <div class="card-header">
                <nav class="navbar navbar-light bg-light">
                <a class="btn btn-warning text-black" href="PFC.php?PageName=attence_emp" style="margin:7px;font-size:large;height:37px;padding:6px;width:100px;float:right;margin-top:3px;margin-right:-473px;" role="button">Back</a>&nbsp;&nbsp;
                <h2 class="card-title" style="color:#012970;margin-right:17px;"><b>ATTENDENCE REPORT LIST</b></h2>
                 </nav><br><br>
                    <nav class="navbar navbar-light bg-light">
                    <!-- <form method="POST" class="form-inline">
                    <input type="text" name="searchvalue" style="margin:13px;height:41px;padding:-3px;width:287px;" placeholder="Search by Employee name Or Date" title="Type in a Employee name Or Date">&nbsp;&nbsp;
                         <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                    </form> -->
                    <!-- <a href="Pages/exportCSV.php"><button type="submit" name="exportCSV" id="exportCSV" class="btn btn-success" style="margin-left: 595px;">Export CSV</button></a> -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        + Select Attendence Report
                    </button> -->
                    <!-- <h2><u style="color:black;">Attendence Report List:-</u></h2><br/><br/>$Employee_name.' '. -->
                    <centre><h2 style="color:black;margin-right: 578px;margin-left: 353px;"><?php echo $month_name.' '.$YearName.' '.'Attendance';?></h2></centre>
                    <!-- <a href="Pages/export_date_view_attendance.php?EmpID=<?php //echo $EmpID;?>&monthname=<?php //echo $month_naame;?>"><button type="submit" name="exportCSV" id="exportCSV" class="btn btn-success" style="margin-left: 1169px;margin-top: -40px;">Export File</button></a> -->
                    <form id="locationForm" action="Pages/export_date_view_attendance.php" method="GET">
                      <!-- <a href="Pages/export_date_view_attendance.php?EmpID=<?php //echo $EmpID;?>&monthname=<?php //echo $month_naame;?>"><button type="submit" name="exportCSV" id="exportCSV" class="btn btn-success" style="margin-left: 1169px;margin-top: -40px;">Export File</button></a> -->
                      <input type="hidden" name="employeeid" id="employeeid" value="<?php echo $EmpID;?>"/>
                      <input type="hidden" name="monthname"  id="monthname"  value="<?php echo $month_naame;?>"/>
                      <input type="hidden" name="longitude"  id="longitude"/>
                      <input type="hidden" name="latitude"   id="latitude"/>
                      <button type="submit" name="exportCSV" id="exportCSV" class="btn btn-success" style="margin-left: 1169px;margin-top: -40px;">Export File</button>
                    </form>
                </div>
         <!--table start-->
         <div class="card-body">
            <table class="table table-striped" style="width:100%">
            <thead class="thead-pink">
              <tr>
                 <th><b>S.No.</b></th>
                 <th><b>Emp Name</b></th> 
                 <th><b>Check In Time</b></th> 
                 <th><b>Check In Date</b></th> 
                 <th><b>Check Out Time</b></th> 
                 <th><b>Check Out Date</b></th> 
                 <th><b>Status</b></th>
                 <th><b>CreatedOn</b></th>
               </tr>
                </thead>
               <tbody>
               <?php
                  //$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` WHERE `ea`.`user_id` = '$EmpID'";
                  //$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` WHERE `ea`.`user_id` = '$EmpID' and MONTHNAME(`check_in_date`)='$month_naame'";
                  $sql="SELECT `ea`.*,REPLACE(ea.`check_in_time`, 'am', '') AS `check_in_time`, REPLACE(ea.`check_out_time`, 'pm', '') AS `check_out_time`,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` WHERE `ea`.`user_id` = '$EmpID' and MONTHNAME(`ea`.`check_in_date`)='$month_naame' ORDER BY ea.check_in_date ASC";
                  //LIMIT $offset, $no_of_records_per_page
                  $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) 
                    {
                      $cnt=0;
                        while($row = $result->fetch_assoc()) 
                      {?>
                        <tr>
                        <th scope='row'><?php echo ++$cnt; ?></th>
                        <td><?php echo $row["emp_name"]; ?></td>
                        <td><?php echo $row["check_in_time"]; ?></td>
                        <td><?php echo $row["check_in_date"]; ?></td>
                        <td><?php echo $row["check_out_time"]; ?></td>
                        <td><?php echo $row["check_out_date"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td><?php echo $row["CreatedOn"]; ?></td>
                      </tr>
                      <?php
                      }
                    } 
               ?>
              </tbody>
             </table>
             <?php
                $sql1="SELECT * from `employee_attendence`";
                echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
            ?>
            </div>


  <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action="#"  method="POST" >
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabel"><u>Attendence Report:-</u></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <div class="col-4">
                             <label for="text" class="form-label">EMPLOYEE-NAME:</label>
                              <select name="emp_id" class="fstdropdown-select" id="emp_id">
                                  <option value="NA">SELECT EMPLOYEE NAME</option>
                                  <?php  
                                        $sql="SELECT `Id`,`emp_code`,`emp_name` FROM `employee` where emp_status=1 ORDER BY `Id` DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while( $row = mysqli_fetch_array($result))
                                        {
                                    ?>
                                  <option value="<?php echo $row["Id"];?>"><?php echo $row["emp_name"];?></option>
                                  <?php } ?>
                              </select>
                             </div>
                             <div class="col-4">
                              <label for="text" class="form-label">Month:</label>
                                 <select name="month" class="month  form-control select_type" id="month">
                                    <option value="NA">SELECT MONTHS</option>
                                    <?php for ($i = 1; $i <= 12; $i++) { $month = date('F', mktime(0, 0, 0, $i, 1, 2011)); ?>
                                          <option value="<?php echo $i; ?>"><?php echo $month; ?></option>
                                    <?php } ?>
                               </select>
                               </div>
                              <div class="col-4">
                              <label for="text" class="form-label">Year:</label>
                                <select name="Year" class="Year form-control select_type" id="Year">
                                  <option value="NA">SELECT YEARS</option>
                                  <?php for($n=2022;$n<=2050;$n++) { ?>
                                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                  <?php } ?>
                              </select>
                              </div>
                            </div><br/>
                            <div class="row">
                            <div class="col-6">
                               <label for="text" class="form-label">Date To:</label>
                              <input type="date" name="date_to" class="form-control" id="date_to" format="Y-m-d">
                             </div>
                             <div class="col-6">
                              <label for="text" class="form-label">Date From:</label>
                              <input type="date" name="date_from" class="form-control" id="date_from" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                            </div>
                         </div>
                      </div>
                    </div>
                   <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                  <input type="submit" id="submit"  name="getreport" class="btn btn-primary add_role" value="Submit">
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
<script>
        document.getElementById('locationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;

                    // Submit the form after getting the location
                    document.getElementById('locationForm').submit();
                });
            } else {
                alert("Geolocation is not supported in your browser.");
            }
        });
    </script>
  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

