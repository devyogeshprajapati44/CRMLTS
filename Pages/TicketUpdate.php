<?php
  error_reporting(0);
  include 'connection.php';
  $EmpID=$_REQUEST["EmpID"];
  $EmpID=EDV($EmpID,2);
  //$update_sql="SELECT `ts`.`Id` as `idd`, `ts`.`user_id`, `ts`.`ticket_no`, `ts`.`type_of_ticket`, `ts`.`complain_issue`, `ts`.`status`, `ts`.`ticket_close_date`, `ts`.`CreatedOn`,`ts`.`admin_remarks`,`emp`.`emp_name` FROM `ticket_system` `ts` LEFT JOIN `employee` `emp` ON `ts`.`user_id`=`emp`.`Id` where `emp`.`Id`='$EmpID'";
  $update_sql="SELECT `ts`.`Id` as `idd`, `ts`.`user_id`, `ts`.`ticket_no`, `ts`.`type_of_ticket`, `ts`.`complain_issue`, `ts`.`status`, `ts`.`ticket_close_date`, `ts`.`CreatedOn`,`ts`.`admin_remarks`,`emp`.`emp_name` FROM `ticket_system` `ts` LEFT JOIN `employee` `emp` ON `ts`.`user_id`=`emp`.`Id` where `ts`.`Id`='$EmpID'";
  $fetsql = mysqli_query($conn,$update_sql);
  $rowData = mysqli_fetch_array($fetsql);
  $ID=$rowData["idd"];
  //echo $ID;
  if(isset($_POST["Updateticket"]))
  {
    $emp_name=CF($_POST["empcode"],$conn);
    $status=CF($_POST["status"],$conn);
    $admin_remarks=CF($_POST["admin_remarks"],$conn);
    //$ticket_close_date=date('Y-m-d H:i:s');
    $ticket_close_date=date('Y-m-d');
    $status=$_POST["status"];
    //$sql_update="UPDATE `ticket_system` SET `user_id`='$emp_name',`status`='$status',`ticket_close_date`='$ticket_close_date',`admin_remarks`='$admin_remarks',`UpdatedOn`= CURRENT_TIMESTAMP WHERE `Id`='$ID'";
    //die;
    if($status == 1)
    {
    $sql_update="UPDATE `ticket_system` SET `user_id`='$emp_name',`status`='$status',`ticket_close_date`='',`admin_remarks`='$admin_remarks',`UpdatedOn`= CURRENT_TIMESTAMP WHERE `Id`='$ID'";
    }
    if($status == 2)
    {
      $sql_update="UPDATE `ticket_system` SET `user_id`='$emp_name',`status`='$status',`ticket_close_date`='$ticket_close_date',`admin_remarks`='$admin_remarks',`UpdatedOn`= CURRENT_TIMESTAMP WHERE `Id`='$ID'";
    }

    $run = mysqli_query($conn, $sql_update);
    $emp_ID=$_REQUEST["EmpID"];
    if($run > '0')
    {
      $message="Record Update successfully";
      header("location:PFC.php?PageName=TicketUpdate&Mgs=1&EmpID=$EmpID");
    }
    else
    {
      $message="Record Not Update.";
    }
    header("location:PFC.php?PageName=TicketUpdate&Mgs=1&EmpID=$EmpID");
  }
?>
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
         <div class="full graph_head">
            <?php echo $message; ?>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
              <nav class="navbar navbar-light bg-light">
                <form action="#" method="post">
                <a class="btn btn-warning text-dark"  href="PFC.php?PageName=view_ticket_list" style="margin:7px;font-size:large;height:37px;padding:6px;width:100px;float:left;" role="button">Back</a>&nbsp;&nbsp;
                </form>
                 <h2 style="color:#012970;margin-right:654px;margin-top:-1px;"><b>UPDATE TICKET</b></h2>
                </nav><br><br>
            
                <div class="card-body">
                 <h5 class="card-title"></h5>
                 <!-- <u>Update Ticket:-</u> -->
                  <form method="POST">    

                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                     
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Employee Name</label>
                          <span class="error">* <?php echo $nameErr;?></span>
                          <input type="text" class="empname form-control" name="empname" id="empname" value="<?php echo $rowData["emp_name"];?>" readonly>
                          <input type="hidden" class="empcode form-control" name="empcode" id="empcode" value="<?php echo $rowData["user_id"];?>">
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">Type of Ticket</label>
                          <span class="error">* <?php echo $nameErr;?></span>
                          <select  class="fstdropdown-select" name="typeoftic" id="typeoftic" required>
                          <option value="NA">--SELECT TYPE OF COMPLAINT--</option>
                          <?php 
                                    $sqlcomp="SELECT * FROM `complaint_type`";
                                    $res = mysqli_query($conn,$sqlcomp);
                                    while($ro = mysqli_fetch_array($res))
                                    {
                                  ?>  
                                  <option value="<?php echo $ro["Id"];?>" <?php if($ro["Id"]==$rowData["type_of_ticket"]){ echo 'selected'; }?>><?php echo $ro["type_of_ticket"];?></option>                         
                               <?php } ?>
                          </select>
                        </div>
                      </div> 
                          <br>
                         
                       <div class="row">
                       <div class="col-6">
                                <label for="email" class="form-label">Status</label>
                                <span  class="error">* <?php echo $emailErr;?></span>
                                <select  class="fstdropdown-select" name="status" id="status" required>
                                  <option value="NA">--SELECT COMPLAINT STATUS--</option>
                                  <?php
                                  $sql_status="SELECT * FROM `complaint_status`";
                                  $resl = mysqli_query($conn,$sql_status);
                                  while($rodata = mysqli_fetch_array($resl))
                                  {
                                  ?>
                                  <option value="<?php echo $rodata["Id"];?>" <?php if($rodata["Id"]==$rowData["status"]){ echo 'selected'; }?>><?php echo $rodata["status_of_complaint"];?></option>
                            <?php } ?>
                          </select>
                            </div>

                            <div class="col-6">
                                <label for="email" class="form-label">Complain/Issue</label>
                                <span  class="error">* <?php echo $Err;?></span>
                                <textarea class="Complain_issue form-control" name="Complain_issue" id="Complain_issue" style="width:699px;height:120px;overflow: auto;" readonly><?php echo $rowData["complain_issue"];?></textarea>
                            </div>


                        </div>                            
                        <div class="row">
                        <div class="col-4">
                                <label for="email" class="form-label">Admin Remarks</label>
                                <span  class="error">* <?php echo $Err;?></span>
                                <textarea class="admin_remarks form-control" name="admin_remarks" id="admin_remarks" style="width:1410px;height:170px;overflow: auto;" value="admin_remarks"><?php echo $rowData["admin_remarks"];?></textarea>
                                  </div>
                        </div>

                        <br><br/>
                         <div class="modal-footer">
                          <div class="row mb-3">
                          <div class="col-sm-3">
                         
                          </div>
                          </div>
                          <input type="submit" name="Updateticket" class="btn btn-primary add_empolyee" value="Update"> 
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
  <!-- ======= End Footer ======= -->
