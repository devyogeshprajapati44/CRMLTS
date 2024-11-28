<?php
require_once 'connection.php';

$ID=$_REQUEST["ID"];

echo $va = "SELECT `Id`,`letter_status`, `status_reason`, `reason_status_update_on` FROM `offer_letters_details` WHERE `Id`='$ID'";

// echo $va;
//$fetch = mysqli_query($conn, "SELECT `offerl`.*,`desig`.`Designation`,`cut`.`country_name`,`stat`.`state_name`,`citi`.`city_name` FROM `offer_letters_details` `offerl` left join `designation` `desig` ON `offerl`.`desig_id`=`desig`.`desig_id` left join `countries` `cut` ON `offerl`.`country`=`cut`.`country_id` left join `states` `stat` ON `offerl`.`emp_state_name`=`stat`.`state_id`  left join `cities` `citi` ON `offerl`.`city`=`citi`.`city_id` WHERE `offerl`.`Id`='$ID'");
$result_details = mysqli_query($conn,$va);
$row_details = $result_details->fetch_assoc();
$let_status=$row_details["letter_status"];

if(isset($_POST["submit"]))
{
  $letter_status=CF($_POST["letter_status"],$conn);
  $status_reason=CF($_POST["statusreason"],$conn);

  echo $sql_update="UPDATE `offer_letters_details` SET `letter_status`='$letter_status',`status_reason`='$status_reason',`reason_status_update_on`=now() WHERE `Id`='$ID'";
  $run_sub_update = mysqli_query($conn,$sql_update);

  if($run_sub_update > '0')
  {
 
    header("location:PFC.php?PageName=Status_letter&Mgs=1");
  }
  else
  {
 
   header("location:PFC.php?PageName=Status_letter&Mgs=2");
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
      <strong><i class="bi bi-check"></i> Success !</span>Status Updated!</strong>
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
                  <div class="card-body">
                  <nav class="navbar navbar-light bg-light">
                    <form method="POST">
                    <a class="btn btn-warning text-dark" href="PFC.php?PageName=view_offer_letter" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:left;margin-left:18px;" role="button">Back</a>
                    </form>
                    <h2 style="color:#012970;margin-right:74px;margin-top: 8px;"><b>STATUS OFFER LETTER</b></h2><br/><br/>
                    </nav><br><br>
                    <form method="POST">
                         <div class="modal-body">
                           <div class="row">
                            <div class="col-12">
                            <label for="">Status <span style="color: red">*</span></label><br>
                             <select name="letter_status" class="letter_status  form-control" id="letter_status">
                              <option value="NA">---SELECT STATUS--</option>
                             <?php 
                                          $sql="SELECT `Id`, `status` FROM `letter_status`";
                                          $result = mysqli_query($conn, $sql);
                                          while( $rowlet = mysqli_fetch_array($result))
                                    {
                                  ?>
                                  <option value="<?php echo $rowlet["Id"];?>" <?php if($rowlet["Id"]==$row_details["letter_status"]){ echo 'selected'; }?>><?php echo $rowlet["status"];?></option>
                               <?php } ?>
                                    </select>
                               </div>
                               
                              </div><br><br>

                                <div class="row">
                                <div class="col-12">
                                <p><label for="reason">Status Reason</label></p>
                                <textarea id="statusreason" name="statusreason" style="width: 100%;height: 78%;"><?php echo  $row_details["status_reason"];?></textarea>
                                <br>

                              </div>
                            </div><br><br>
                            <input type="submit" name="submit" id="submit" class="btn btn-primary submit" value="Submit">
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
</main>
