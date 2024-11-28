<?php
error_reporting(0);
require_once 'connection.php';

if(isset($_POST["submit"]))
{
  $emp_name=$_POST["user_id"];
  $empname_imp=implode(",",$emp_name);
  $project_name=CF($_POST["project_id"],$conn);
  $start_date=CF($_POST["start_date"],$conn);
  echo $sql_insert="INSERT INTO `project_assignment`(`user_id`, `project_id`, `start_date`) VALUES  ('$empname_imp', '$project_name', '$start_date')"; 
  //die;
  $run_Sub = mysqli_query($conn, $sql_insert); 
  header("location:PFC.php?PageName=project_add_assignatment&Mgs=1");
}
// update project assignment

?>

<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"]))
{
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
                  <form action="#" method="POST">
                       <a class="btn btn-warning text-black" href="PFC.php?PageName=project_assigment" style="margin:-1;font-size:large;height:39px;padding:6px;width:100px;margin-right: 1367px;" role="button">Back</a>
                     </form>
                 <h2 style="color:#012970;margin-left:573px;margin-top: -34px;"><b>ADD PROJECT ASSIGNMENT</b></h2>
                </nav><br><br>
                       <div class="card-body">
                   <!-- <h1><b><u>Project Assignment:</b></u></h1> -->
                  <form method="POST">    
                       <div class="modal-body">
                            <div class="form-group">
                                <div class="col ms-1 me-2 mt-3"> 
                                 <div class="row">
                                        <div class="col-8">
                                         <label class="col-sm-4 col-form-label">Project Name<span style="color: red">*</span></label>
                                          <select name="project_id"  class="fstdropdown-select form-control project_id" id="project_names" data-live-search="true"  data-size="8" tabindex="null">
                                            <option value="NA">Select Project</option>
                                            <?php 
                                                $sqlproj="SELECT * FROM `project_manganement`";
                                                $result_proj = mysqli_query($conn, $sqlproj);
                                                //$row    = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                                                //$row    = mysqli_fetch_array($result);
                                                while( $projdata = mysqli_fetch_array($result_proj))
                                                {
                                            ?>
                                            <option value="<?php echo $projdata["project_id"];?>"><?php echo $projdata["project_name"];?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                    </div><br>
                                <div class="col-8">
                                 <label class="col-sm-4 col-form-label">Employee Name<span style="color: red">*</span></label>
                                  <select  class="user_id form-select" name="user_id[]" multiple  data-live-search="true"  data-size="8" tabindex="null" onclick="myfunction()" multiple>
                                        <option value="NA">Select Employee</option>
                                        <?php 
                                            $sql="SELECT * FROM `employee` where `emp_status`='1' and Id!=1";
                                            $resemp = mysqli_query($conn, $sql);
                                            //$row    = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                                            //$row    = mysqli_fetch_array($result);
                                            while( $row = mysqli_fetch_array($resemp))
                                            {
                                        ?>
                                        <option value="<?php echo $row["Id"];?>"><?php echo $row["emp_name"];?></option>
                                        <?php } ?>
                                        </select>
                                        </div>
                                            </div><br>
                                          <div class="col-8">
                                          <label  class="col-sm-4 col-form-label">Start Date<span style="color: red">*</span></label>
                                             <input type="date" class="start_date form-control" name="start_date" required>
                                          </div>
                                        </div><br><br>
                                        <div class="modal-footer">
                                       <input type="submit" id="submit"  name="submit" class="btn btn-primary add_desig" value="Submit" style="margin-right: 1349px;">
                                      </div>
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