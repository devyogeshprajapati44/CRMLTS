<?php
error_reporting(0);
include 'connection.php';
//include '../Script/CommonFunctions.php';
$ID=$_REQUEST["ID"];

$va = "SELECT `offerl`.*,`desig`.`Designation`,`cut`.`country_name`,`stat`.`state_name`,`citi`.`city_name` FROM `offer_letters_details` `offerl` left join `designation` `desig` ON `offerl`.`desig_id`=`desig`.`desig_id` left join `countries` `cut` ON `offerl`.`country`=`cut`.`country_id` left join `states` `stat` ON `offerl`.`emp_state_name`=`stat`.`state_id`  left join `cities` `citi` ON `offerl`.`city`=`citi`.`city_id` WHERE `offerl`.`Id`='$ID'";

// echo $va;
//$fetch = mysqli_query($conn, "SELECT `offerl`.*,`desig`.`Designation`,`cut`.`country_name`,`stat`.`state_name`,`citi`.`city_name` FROM `offer_letters_details` `offerl` left join `designation` `desig` ON `offerl`.`desig_id`=`desig`.`desig_id` left join `countries` `cut` ON `offerl`.`country`=`cut`.`country_id` left join `states` `stat` ON `offerl`.`emp_state_name`=`stat`.`state_id`  left join `cities` `citi` ON `offerl`.`city`=`citi`.`city_id` WHERE `offerl`.`Id`='$ID'");
$result_details = mysqli_query($conn,$va);
$row_details = $result_details->fetch_assoc();
$Employee_name=$row_details["employee_name"];

//update code start here.
if(isset($_POST['savestatus']))
{

$emp_status=strtoupper($_POST["status"]);

$update_status="UPDATE `offer_letters_details` SET `status`='$emp_status' WHERE `Id`='$ID'";
//die;
$run = mysqli_query($conn, $update_status);
header("location:PFC.php?PageName=Del_offer_letter&Mgs=1&ID=$ID");
}
//update code end here.
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
<main id="main" class="main">
<section class="section">
  <div class="row mt-4">
    <div class="col-md-12">
      <div class="card" style="margin-left: -335px;">
      <div class="card-header"> 
      <nav class="navbar navbar-light bg-light">
      <form action="#" method="GET">
               <a class="btn btn-warning text-dark"  href="PFC.php?PageName=view_offer_letter" style="margin:7px;font-size:large;height:37px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
               </form>
             <h2  style="color:#012970;margin-right:609px;margin-top:4px;"><b>OFFER EMPLOYEE STATUS</b></h2>
       </nav><br><br><br><br>
        <div class="card-body">
          <!-- General Form Elements <u>Employee Status:--->
          <form method="POST">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label" style="color:#012970;">STATUS :</label>
              <div class="col-sm-6">
              <?php if(($_REQUEST['ID']!='')){?>
                        <select name="status" class="status  form-control" id="status" style="margin-left:-172px;">
                                <option selected>--SELECT STATUS--</option>
                                <option value="<?php if($row['emp_status']=="2"){ echo $row['emp_status']; } else {echo "2"; }?>"selected><?php if($row['emp_status']=="2"){ echo $row['emp_status']="DEACTIVE"; } else {echo "DEACTIVE"; }?></option>
                                <option value="<?php if($row['emp_status']=="1"){ echo $row['emp_status']; } else {echo "1"; }?>"selected><?php if($row['emp_status']=="1"){ echo $row['emp_status']="ACTIVE"; } else {echo "ACTIVE"; }?></option>
                        </select>
                        <?php } ?>
                       </div>
                      </div><BR/><BR/>
                      <input type="submit" name="savestatus" id="savestatus" value="Save Status" class="btn btn-primary" style="margin-left:70px;">
                     </div>            
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



