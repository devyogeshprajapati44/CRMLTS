<?php
error_reporting(0);
session_start();
include 'connection.php';
$user_id=$_REQUEST["EmpID"];
// print_r($user_id);
// echo $user_id;
// echo $xyz="SELECT `emp`.`Id` as `empid`,`emp`.`emp_name`,`pa`.*,`pm`.`project_name` FROM `employee` `emp` LEFT JOIN `project_assignment` `pa` ON  `emp`.`Id`=`pa`.`user_id` LEFT JOIN `project_manganement` `pm` ON `emp`.`project_id`=`pm`.`project_id` where `emp`.`emp_status`='ACTIVE' AND `emp`.`Id`='$user_id'";
// die;
$fetch=mysqli_query($conn, "SELECT `emp`.`Id` as `empid`,`emp`.`emp_name`,`pa`.*,`pm`.`project_id` as `pm_id`,`pm`.`project_name`,`pa`.`Id` as `pa_id`,`pa`.`start_date` as `pa_startdate`  FROM `employee` `emp` LEFT JOIN `project_assignment` `pa` ON  `emp`.`Id`=`pa`.`user_id` LEFT JOIN `project_manganement` `pm` ON `emp`.`project_id`=`pm`.`project_id` where `emp`.`emp_status`='1' AND `emp`.`Id`='$user_id'");
$alldata=mysqli_fetch_array($fetch);
$proj_assign_id=$alldata["pa_id"];

$_SESSION["proj_assgn_id"]=$proj_assign_id;



// update project assignment
if(isset($_POST["Editsubmit"]))
{

  $emp_names=CF($_POST["user_id"],$conn);
  $project_id=CF($_POST["project_id"],$conn);
  $start_date=CF($_POST["start_date"],$conn);
  //$user_id=$_POST["Id"];
  echo $sql_update="UPDATE `project_assignment` SET `user_id`='$emp_names',`project_id`='$project_id',`start_date`='$start_date' WHERE `Id`='".$_SESSION["proj_assgn_id"]."'"; 
  //die;

  $run_Subb = mysqli_query($conn, $sql_update);

  echo $sql_update_emp="UPDATE `employee` SET `project_id`='$project_id' WHERE `Id`='$user_id'"; 


  $run_emp_data = mysqli_query($conn, $sql_update_emp);
  header("location:PFC.php?PageName=project_assigment&Mgs=1");
}
// update project assignment
?>

<main id="main" class="main">
  
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Project Updated Successfully.</strong>
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
                  <form action="#" method="POST">
                       <a class="btn btn-warning text-black" href="PFC.php?PageName=project_assigment" style="margin:-1;font-size:large;height:39px;padding:6px;width:100px;margin-right: 1367px;" role="button">Back</a>
                     </form>
                 <h1 style="color:#012970;margin-left:572px;margin-top: -34px;">EDIT PROJECT DETAILS</h1>
                </nav><br><br>
                <div class="card-body">
                  <form method="POST">    
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3"> 
                      <div class="row">
                      <div class="col-8">
                       <label class="col-sm-4 col-form-label">Project Name<span style="color: red">*</span></label>
                       <select name="project_id"  class="fstdropdown-select form-control project_id"  data-live-search="true"   data-size="8" tabindex="null">
                        <option value="NA">Select Project</option>
                        <?php 
                            $sqlproj="SELECT * FROM `project_manganement`";
                            $result_proj = mysqli_query($conn, $sqlproj);
                            while( $projdata = mysqli_fetch_array($result_proj))
                            {
                        ?>
                        <option value="<?php echo $projdata["project_id"];?>" <?php if($projdata["project_id"]==$alldata["pm_id"]) { echo 'selected';} ?>><?php echo $projdata["project_name"];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div><br>
                    <div class="col-8">
                        <label class="col-sm-4 col-form-label">Employee Name<span style="color: red">*</span></label>
                        <select class="user_id form-select form-control" name="user_id[]" multiple  data-live-search="true"   onclick="myfunction()"  data-size="8" tabindex="null">
                        <option value="NA">Select Employee</option>
                         <?php 
                         

                         
                        $sql="SELECT * FROM `employee` where `emp_status`='1'";
                        $result = mysqli_query($conn, $sql);
                        
                        while( $editdata = mysqli_fetch_array($result))
                        {
                       ?>
                   <option value="<?php echo $editdata["Id"];?>" <?php if($editdata["Id"]==$alldata["empid"]) { echo 'selected';} ?>><?php echo $editdata["emp_name"];?></option>
                     <?php } ?>
                     </select>
                     </div>
                     </div><br>
                        <div class="col-8">
                            <label  class="col-sm-4 col-form-label">Start Date<span style="color: red">*</span></label>
                            <input type="date" class="start_date form-control" name="start_date"  id="pa_startdate"  value="<?php  echo $alldata["start_date"]; ?>"  required>
                            </div>
                            </div><br>
                       
                           </div>
                           <div class="modal-footer">
                          <div class="row mb-3">
                          <div class="col-sm-3">
                          <input type="submit" id="submit"  name="Editsubmit" class="btn btn-primary update_data" value="Update"> 
                          </div>
                          </div>
                        <!-- <button type="submit" id="submit" class="btn btn-primary add_empolyee">Submit</button> -->
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
</section>
</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
 
  <script type="text/javascript">
function myfunction(){
  $(document).ready(function () {
            $('.user_id').select2();
        });
        $('modal-body').on('click', '.add-data', function (event) {
            event.preventDefault();
            var project_name = $('input[project_name=project_name]').val();
            var user_id = $('.user_id').val();
            $.ajax({
                method: 'POST',
                url: './database/db.php',
                data: {
                  project_name: project_name,
                    user_id: user_id,
                },
                success: function (data) {
                    console.log(data);
                    $('.res-msg').css('display', 'block');
                    $('.alert-success').text(data).show();
                    $('input[project_name=project_name]').val('');
                    $(".user_id").val('').trigger('change');
                    setTimeout(function () {
                        $('.alert-success').hide();
                    }, 3500);

                }
            });
        });
}
</script>