<?php
error_reporting(0);
include 'connection.php';
//include '../Script/CommonFunctions.php';

$EmpID=$_REQUEST["EmpID"];
$monthid=$_REQUEST["month"];
$yearid=$_REQUEST["year"];
$EmpID=EDV($EmpID,2);
$MonthID=EDV($monthid,2);
$YearID=EDV($yearid,2);

$fetch   = mysqli_query($conn, "SELECT `msd`.*,`us`.*,`us`.`Id` as `empID`, `desig`.`Designation`,`addsal`.* FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` where `us`.`Id`='$EmpID' AND `month`='$MonthID' AND `year`='$YearID'");
$rowdata = mysqli_fetch_array($fetch);


//update code start here.
if(isset($_POST['savestatus']))
{

$emp_status=strtoupper($_POST["status"]);

$update_status="UPDATE `add_salary_slip` SET `status`='$emp_status' WHERE `Idd`='$EmpID'";
//die;
$run = mysqli_query($conn, $update_status);
if($run > '0')
{
    header("location:PFC.php?PageName=delete_salary&Mgs=1&EmpID=$EmpID");
}
else
{
    header("location:PFC.php?PageName=delete_salary&Mgs=2&EmpID=$EmpID");
}

}
//update code end here.
?>
<?php
    // include('view/layout/header.php');
    // include('view/layout/sidebar.php');
?>
<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Status Has Change Successfully.</strong>
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
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Not Success !</span>Status Is Not Changed.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<main id="main" class="main">
<div class="pagetitle">
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
      <div class="card-header" style="margin-left:-293px;">
          <nav class="navbar navbar-light bg-light">
          <a class="btn btn-warning text-dark"  href="PFC.php?PageName=add_salary_slip" style="font-size: large;height: 42px;padding: 7px;width: 102px;float: left;margin-left: 20px;" role="button">Back</a>
          <form method="POST">
                <h2 style="color:#012970;margin-right:486px;margin-top:-1px;"><b>EMPLOYEE SALARY STATUS</b></h2>
          </form>
          </nav><br><br><br>
        <div class="card-body">
          <!-- General Form Elements -->
          <form method="POST">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Status :</label>
              <div class="col-sm-6">
                     <?php if(($_REQUEST['EmpID']!='')){?>
                        <select name="status" class="status  form-control" id="status" style="margin-left:-184px;"> 
                                <option selected>--SELECT STATUS--</option>
                                <option value="<?php if($row['status']=="2"){ echo $row['status']; } else {echo "2"; }?>"selected><?php if($row['status']=="2"){ echo $row['status']="DEACTIVE"; } else {echo "DEACTIVE"; }?></option>
                                <option value="<?php if($row['status']=="1"){ echo $row['status']; } else {echo "1"; }?>"selected><?php if($row['status']=="1"){ echo $row['status']="ACTIVE"; } else {echo "ACTIVE"; }?></option>
                        </select>
                        <?php } ?>
                      </div>
                     </div>
                   </div><br>
                   <div class="row mb-3">
                   <div class="col-sm-10">  
                  <input type="submit" name="savestatus" id="savestatus" value="Submit" class="btn btn-primary" style="margin-left:110px;">
               </div>
              </div>
<!--userlogin div-->                
              </div>
            </div>

                 
            </form><!-- End General Form Elements -->
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

<?php
//include('view/layout/footer.php');
?>

