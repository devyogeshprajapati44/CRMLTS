<?php
error_reporting(0);

require_once 'connection.php';
include("Pages/pagi_script.php");

if(isset($_POST["submit"]))
{
  $department_name=CF($_POST["depart_name"],$conn);
  $sql_insert="INSERT INTO `department`(`department`) VALUES ('$department_name')";
  $run_Sub = mysqli_query($conn, $sql_insert);
  header("location:PFC.php?PageName=view_department_details&Mgs=1");
}

//Edit Department_start
if(isset($_POST["Editsubmit"]))
{
  $department_names=CF($_POST["depart_name_edit"],$conn);
  $department_Id=CF($_POST["dept_id"],$conn);
  $sql_update="UPDATE `department` SET `department`='$department_names' WHERE `dept_id`='$department_Id';";
  $run_Subb = mysqli_query($conn, $sql_update);
  header("location:PFC.php?PageName=view_department_details&Mgs=1");
}
//Edit Department_end.
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
<div class="midde_cont">
  <div class="container-fluid">
    <!-- row -->
<div class="row column1">
  <div class="col-md-12">
        <div class="container py-5">
            <div class="card mt-3">
                <div class="card-header">
                <nav class="navbar navbar-light bg-light">
                   <form method="POST">
                      <input type="text" name="searchvalue" style="margin:-25;height:39px;padding:6px;width:300px;margin-top: 5px"  placeholder="Enter Department" value="">
                      <input class="btn btn-outline-success my-2 my-sm-0" style="height:38px;padding:8px;width:100px;" type="submit" name="submitsearch" value="Search">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left: 730px;margin-top:-1px;">+ Add Department</button>
                      <h2 style="color:#012970;margin-left:561px;margin-top: -34px;"><b>ADD DEPARTMENT</b></h2>
                    </form>
              </nav><br><br><br>
          </div>    
         <!--table start-->
         <!--table start-->
         <div class="card-body">
            <table  class="hover table table-striped" style="width:100%">
            <thead class="thead-pink" >
              <tr>
                 <th><b>S.No.</b></th>
                 <th hidden><b>ID</b></th>
                 <th><b>Department Name</b></th> 
                 <th><b>Action</b></th>
               </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM `department` order by `dept_id`  LIMIT $offset, $no_of_records_per_page";
                  if(isset($_POST['submitsearch']))
                  {
                    $filtervalue=strtoupper($_REQUEST['searchvalue']);
                    //$sqldata ="SELECT `emp`.`Id` as `useid`,`emp`.`emp_name`,`pm`.`project_id`,`pm`.`project_name`,`pa`.`Id` as `useridd`,`pa`.`user_id` as `usd_id`,`pa`.`start_date` as `pa_startdate`,`pa`.`project_id` as `pa_pro_assg_id` FROM `employee` `emp` LEFT JOIN `project_assignment` `pa` ON `emp`.`Id`=`pa`.`user_id` LEFT JOIN `project_manganement` `pm` ON `pa`.`project_id`=`pm`.`project_id` where `emp`.`emp_status`='ACTIVE' AND `emp`.`emp_name` LIKE '%$filtervalue' OR `emp`.`emp_name` LIKE '$filtervalue%' OR `emp`.`emp_name` LIKE '%$filtervalue%'";
                    $sql = "SELECT * FROM `department` WHERE `department` LIKE '%$filtervalue' OR `department` LIKE '$filtervalue%' OR `department` LIKE '%$filtervalue%' LIMIT $offset, $no_of_records_per_page";
                  }
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  {
                  $cnt=0;
                  while($row = $result->fetch_assoc()) 
                    {
                      $depart_name=$row['department'];
                      $_SESSION["depart_name"]=$depart_name;
                      ?>
                      <tr>
                      <td><?php echo ++$cnt;?></td>
                        <td hidden><?php echo $row["dept_id"];?></td>
                        <td><?php echo $row['department'];?></td>
                        <td><button  value="<?php echo $row["dept_id"]; ?>" data-bs-toggle='modal' class='btn btn-primary editbtn' onclick="EmpUpdate(this.value)">Edit</button></td>
                      </tr>
                    <?php  
                    }
                  }
                  ?>
                 </tbody>
            </table>
            <?php
                 $sql1 = "SELECT * from department";
                 echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
             ?>
           </div>
<!-- ADD Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action="#"  method="POST" >
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabel" style="color:#012970;">Add Department</legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="mb-3 row">
                      <label for="depart_name" class="col-sm-2 col-form-label">Department Name<span style="color: red">*</span></label>
                      <div class="col-4">
                      <input type="text" class="depart_name form-control" name="depart_name"  required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                 <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancel">
                 <input type="submit" id="submit"  name="submit" class="btn btn-primary add_desig" value="Department">
          </div>
       </form>
    </div>
</div>
</div>
<!-- ADD Modal -->
<!-- Edit Modal -->   
<div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
     <Form action="" method="POST"  id="editForm">
          <input type="hidden" id="dept_id" name="dept_id"/>
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabel" style="color:#012970;">Edit Department Details</legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="mb-3 row">
                      <label for="depart_name" class="col-sm-2 col-form-label">Department Name<span style="color: red">*</span></label>
                      <div class="col-4">
                      <input type="text" class="depart_name form-control" name="depart_name_edit" id="depart_name_edit">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
           <input type="submit" id="submit"  name="Editsubmit" class="btn btn-primary add_depart_name" value="Edit Department">
          </div>
       </form>
        <!-- <Form action="" method="POST"  id="editForm">
          <input type="hidden" id="dept_id" name="dept_id"/>
            <div class="modal-header">						
               <h5 class="card-title"><u>Edit Department Details:-</u></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
               <div class="modal-body">			
                   <div class="form-group">     
                     <div class="col ms-1 me-2 mt-3">              
                       <div class="row g-3">
                       <div class="col-ms-10">
                           <label for="" class="form-label">Designation Name <span style="color: red">*</span></label>
                          <input type="text" class="depart_name form-control" name="depart_name_edit" id="depart_name_edit">
                      </div>
                   </div><br>
               </div>    
           </div>    
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
           <input type="submit" id="submit"  name="Editsubmit" class="btn btn-primary add_depart_name" value="Edit Department">
      </div>
    </form> -->
  </div>
</div>
</div>
<!-- Edit Modal -->
<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
          <form  action=""  method="POST">
             <div class="modal-header">                        
                <h4 class="modal-title"  id="deleteModalLabel">Delete Department</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                         <div class="modal-body">
                         <div class="form-group">                    
                           <p>Are you sure you want to delete these Records?</p>
                           <input type="hidden" name="delete_id" id="delete_id">
                            <input type="hidden" name="department" id="department">
                            <p class="text-warning"><small>.</small></p>
                         </div>
                         </div>
                         <div class="modal-footer">
                           <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                           <input type="submit" class="btn btn-danger" name="delete" id="delete" value="Delete">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
<!-- Delete Modal -->
</main><!-- End #main -->
  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    //return confirm('Are you sure?');
}
</script>
 <script>  
$(document).ready(function(){
    $(document).on('click', '.editbtn', function(){
    var id = $(this).val();
      $('#EditModal').modal('show');
              $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
            return $(this).text();
            }).get();

            console.log(data);

            $('#dept_id').val(data[0]);
            $('#depart_name_edit').val(data[2]);
       
            });
});          
</script>

<script>
        $(document).ready(function () {

          $('.deletedepartmentBtn').click(function (e) {
                e.preventDefault();
               var department = $(this).val();
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[1]);
              });
        });
    </script>

