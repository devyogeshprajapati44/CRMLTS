<?php
error_reporting(0);
require_once 'connection.php';
include('pagi_script.php');

if(isset($_POST["submit"]))
{
  $project_name=CF($_POST["project_name"],$conn);
  $start_date=CF($_POST["start_date"],$conn);
  $sql_insert="INSERT INTO `project_manganement`(`project_name`, `start_date`) VALUES ('$project_name','$start_date')";
  $run_Sub = mysqli_query($conn, $sql_insert);
  header("location:PFC.php?PageName=project_management");
}

//Edit Project_start
if(isset($_POST["Editsubmit"]))
{
  $project_names=CF($_POST["project_name_edit"],$conn);
  $start_dates=CF($_POST["start_date_project"],$conn);
  $proj_Id=$_POST["project_id"];
  $sql_update="UPDATE `project_manganement` SET `project_name`='$project_names',`start_date`='$start_dates',`update_on`=now() WHERE `project_id`='$proj_Id'";
  $run_Subb = mysqli_query($conn, $sql_update);
  header("location:PFC.php?PageName=project_management&Mgs=1");
}


//Edit Project_end.
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
         <!-- Start dashboard inner -->
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
                        <input type="text" name="searchvalue" style="margin:3px;height:39px;padding:6px;width:300px;"  placeholder="Search Project Name" value="">&nbsp;&nbsp;
                        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                        </form>
                        <h2 style="color:#012970;margin-left:581px; margin-top: -45px"><b>PROJECT MANAGEMENT</b></h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"  style="margin-left: 1157px;margin-top:-46px;">  + Add Project</button>
                </div>
         <!--table start-->
         <!--table start-->
         <div class="card-body">
            <table  class="hover table table-striped" style="width:100%">
            <thead class="thead-pink" >
              <tr>
                 <th><b>S.No.</b></th>
                 <th hidden><b>ID</b></th>
                 <th><b>Project  Name</b></th> 
                 <th><b>Start Date</b></th> 
                 <th><b>Action</b></th>
               </tr>
                </thead>
                <tbody>
                <?php
                 
                 $sql ="SELECT * FROM `project_manganement` LIMIT $offset, $no_of_records_per_page";

                 if(isset($_POST['submitsearch']))
                 {
                 $filtervalue=strtoupper($_REQUEST['searchvalue']);
                 $sql ="SELECT * FROM `project_manganement` WHERE `project_name` LIKE '%$filtervalue' OR `project_name` LIKE '$filtervalue%' OR `project_name` LIKE '%$filtervalue%' LIMIT $offset, $no_of_records_per_page";
                 }
                 $result = $conn->query($sql);
                 if ($result->num_rows > 0) 
                 {
                  $cnt=0;
                 while($row = $result->fetch_assoc()) 
                   {
                     
                     ?>
                     <tr>
                     <td><?php echo ++$cnt;?></td>
                       <td hidden><?php echo $row["project_id"];?></td>
                       <td><?php echo $row['project_name'];?></td>
                       <td><?php echo $row['start_date'];?></td>
                       <td>
                        <button  value="<?php echo $row["project_id"]; ?>" data-bs-toggle='modal' class='btn btn-primary editbtn' onclick="getdata(this.value)">Edit</button></td>
                     </tr>
                   <?php  
                   }
                 }
                 ?> 

                 </tbody>
            </table>
            <?php
        $sql1="SELECT * from `project_manganement`";
         echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
      ?>
           </div>
      <!-- Modal add -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action="#"  method="POST" >
     <div class="modal-header">
              <legend class="card-title"  id="myModalLabel" style="color:#012970;"><b>Add Project</b></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row g-3">
                   <div class="col-6">
                    <label class="col-sm-3 col-form-label">Project Name<span style="color: red">*</span></label>
                      <input type="text" class="project_name form-control" name="project_name"  required>
                    </div>
                   <div class="col-6">
                     <label for="start_date" class="col-sm-2 col-form-label">Start Date<span style="color: red">*</span></label>
                     <input type="date" class="start_date form-control" name="start_date" required>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                 <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
                 <input type="submit" id="submit"  name="submit" class="btn btn-primary add_desig" value="Submit">
          </div>
       </form>
    </div>
</div>
</div>
  <!-- Modal add -->


  

  <div class="modal fade text-start" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <Form action="" method="POST"  id="editForm">
          <input type="hidden" id="project_id" name="project_id"/>
            <div class="modal-header">						
               <h5 class="card-title" id="exampleModalLabel" style="color:#012970;"><b>Edit Project Details</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
           			
                   <div class="form-group">   
                   <div class="row g-3">  
                   <div class="col-6">
                      <label class="col-sm-3 col-form-label">Project Name<span style="color: red">*</span></label>
                      <input type="text" class="project_name form-control" name="project_name_edit" id="project_name_edit" required>
                      </div><br>
                      <div class="col-6">
                      <label for="start_date" class="col-sm-2 col-form-label">Start Date<span style="color: red">*</span></label>
                      <input type="date" class="start_date form-control" name="start_date_project"  id="start_date_project" required>
                      </div>
                    </div><br>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" id="submit"  name="Editsubmit" class="btn btn-primary add_edit" value="Update">
                  </div>
                </form>
            </div>
        </div>
    </div>

</main><!-- End #main -->

  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script type="text/javascript">  
function getdata(){
    $(document).ready(function(){
     $(document).on('click', '.editbtn', function(){
       var id = $(this).val();
      $('#exampleModal').modal('show');
              $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
            return $(this).text();
            }).get();

            console.log(data);

            $('#project_id').val(data[0]);
            $('#project_name_edit').val(data[2]);
            $('#start_date_project').val(data[3]);
            });
        });     
}        
</script>


