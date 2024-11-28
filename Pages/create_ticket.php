<?php
  //error_reporting(0);
  date_default_timezone_set('Asia/Kolkata');
  error_reporting(E_ALL);
  error_reporting(E_WARNING);
  include 'connection.php';
  $message='';
if (isset($_POST['saveticket'])) 
{
  $emp_name=CF($_POST["empname"],$conn);
  $typeofticket=CF($_POST["typeofticket"],$conn);
  $Complainissue=CF($_POST["Complain_issue"],$conn);
  $status='1';
  //$ticket_open_date=date('Y-m-d H:i:s');
  $ticket_open_date=date('Y-m-d');


  $qry_Adv = "INSERT INTO `ticket_system`(`user_id`,`ticket_no`, `type_of_ticket`, `complain_issue`, `status`, `ticket_open_date`) 
  VALUES ('$emp_name','$ticket_no','$typeofticket','$Complainissue','$status','$ticket_open_date')";

    $run_Sub = mysqli_query($conn, $qry_Adv);
    $last_id = mysqli_insert_id($conn);
    $ticket_no='LTS-TIC-'.$last_id;
    $_SESSION['ticket_number']=$ticket_no;
    $update_ticket="UPDATE `ticket_system` SET `ticket_no`='$ticket_no' WHERE `Id`='$last_id'";
    $run = mysqli_query($conn, $update_ticket);
   
    if($run)
    {
      //$message="Record Save successfully";
      header("location:PFC.php?PageName=create_ticket&Mgs=1");
    }
    else
    {
      //$message="Record Not Save.";
      header("location:PFC.php?PageName=create_ticket&Mgs=2");
    }
    
}
?>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Data Saved And Ticket Number :- <?php echo $_SESSION['ticket_number'];?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==2){
        ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Error !</span>Data Not Saved.</strong>
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
                 <h1 style="color:#012970;margin-left:581px;">CREATE TICKET</h1>
                </nav><br><br>
                <div class="card-body">
                 <h5 class="card-title"></h5>
                 <!-- <u>Create Ticket:-</u> -->
                  <form method="POST">    
                    <div class="modal-body">
                     <div class="form-group">
                     <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <div class="col-6">
                          <label for="empname" class="form-label">Employee Name</label>
                          <select class="fstdropdown-select" name="empname" id="empname" required>
                            <option value="NA">--SELECT EMPLOYEE--</option>
                            <?php 
                                    $sql="SELECT `Id`,`emp_name` FROM `employee` WHERE `emp_status`=1 and `Id`!=1";
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                  ?>
                                  <option value="<?php echo $row["Id"];?>"><?php echo $row["emp_name"];?></option>
                               <?php } ?>
                          </select>

                        </div>

                        <div class="col-6">
                          <label for="typeofticket" class="form-label">Type of Ticket</label>
                          <select  class="fstdropdown-select" name="typeofticket" id="typeofticket" required>
                          <option value="NA">--SELECT TYPE OF COMPLAINT--</option>
                          <?php 
                                    $sql_complt="SELECT `Id`, `type_of_ticket` FROM `complaint_type`";
                                    $result_compliant = mysqli_query($conn, $sql_complt);
                                    while($row_complat = mysqli_fetch_array($result_compliant))
                                    {
                                  ?>
                                  <option value="<?php echo $row_complat["Id"];?>" ><?php echo $row_complat["type_of_ticket"];?></option>
                               <?php } ?>
                          </select>
                        </div>
                      </div> 
                          <br>
                         
                       <div class="row">
                            <div class="col-12">
                                <label for="Complain_issue" class="form-label">Complain/Issue</label>
                                <textarea class="Complain_issue form-control" name="Complain_issue" id="Complain_issue" style="height:170px;overflow: auto;"></textarea>
                            </div>
                        </div>
                        <br><br/>
                         <div class="modal-footer">
                          <input type="submit" name="saveticket" class="btn btn-primary add_empolyee" value="Submit"> 
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
</section>
</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script>
  setFstDropdown();
  </script> -->
  <!-- ======= End Footer ======= -->
