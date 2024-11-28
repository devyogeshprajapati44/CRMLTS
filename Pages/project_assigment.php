<?php
error_reporting(0);
require_once 'connection.php';
include('pagi_script.php');

if(isset($_POST["submit"]))
{
  $emp_name=CF($_POST["user_id"],$conn);
  $project_name=CF($_POST["project_id"],$conn);
  $start_date=CF($_POST["start_date"],$conn);
  $sql_insert="INSERT INTO `project_assignment`(`user_id`, `project_id`, `start_date`) VALUES  ('$emp_name', '$project_name', '$start_date')"; 
  $run_Sub = mysqli_query($conn, $sql_insert); 
  header("location:PFC.php?PageName=project_assigment&Mgs=1");
}
// update project assignment

?>
<main id="main" class="main">
<style>
/* body{
background-color: #eee; 
}
table th , table td{
text-align: center;
}

table tr:nth-child(even){
background-color: #e4e3e3
} */

/* th {
background: #333;
color: #fff;
} */

.pagination {
margin: 0;
}

.pagination li:hover{
cursor: pointer;
}

.header_wrap {
padding:30px 0;
}
.num_rows {
width: 20%;
float:left;
}
.tb_search{
width: 20%;
float:right;
}
.pagination-container {
width: 70%;
float:left;
}

.rows_count {
width: 20%;
float:right;
text-align:right;
color: #999;
}
</style>
         <!-- Start dashboard inner -->
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
                    <a class="btn btn-warning text-black" href="PFC.php?PageName=project_assigment" style="margin:7px;font-size:large;height:37px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
                        <input type="text" name="searchvalue" style="margin:3px;height:39px;padding:6px;width:300px;"  placeholder="Search Project Name" value="">&nbsp;&nbsp;
                        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                        </form>
                        <h2 style="color:#012970;margin-left:581px;margin-top: -52px;"><b>PROJECT ASSIGNMENT</b></h2>
                        <a class="btn btn-warning text-black" href="PFC.php?PageName=project_add_assignatment" style="margin:11px;font-size:large;height:46px;padding:11px;width:210px;margin-top:-45px;" class="btn btn-success">+ Project Assignment</a>
                     </div> 
         <!--table start-->
              <div class="card-body">
                  <table  class="hover table table-striped" style="width:100%">
                    <thead class="thead-dark" >
                      <tr>
                        <th><b>S.No</b></th>
                        <th><b>Project  Name</b></th>
                        <th><b>Employee Name</b></th>
                        <th><b>Start Date</b></th>
                        <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //$sqldata ="SELECT `emp`.`Id` as `useid`,`emp`.`emp_name`,`pm`.`project_id`,`pm`.`project_name`,`pa`.`Id` as `useridd`,`pa`.`user_id` as `usd_id`,`pa`.`start_date` as `pa_startdate`,`pa`.`project_id` as `pa_pro_assg_id` FROM `employee` `emp` LEFT JOIN `project_assignment` `pa` ON `emp`.`Id`=`pa`.`user_id` LEFT JOIN `project_manganement` `pm` ON `pa`.`project_id`=`pm`.`project_id` where `emp`.`emp_status`='ACTIVE'";

                   $sqldata ="SELECT `pa`.*,`emp`.`emp_name` FROM `project_assignment` `pa` LEFT JOIN `employee` `emp` ON `pa`.user_id=`emp`.`Id` LEFT JOIN `project_manganement` `pm` ON `pa`.`project_id`=`pm`.`project_id` where `emp`.`emp_status`='1' order by `pa`.`Id`  LIMIT $offset, $no_of_records_per_page";
                  if(isset($_POST['submitsearch']))
                  {
                    $filtervalue=strtoupper($_REQUEST['searchvalue']);
                    //$sqldata ="SELECT `emp`.`Id` as `useid`,`emp`.`emp_name`,`pm`.`project_id`,`pm`.`project_name`,`pa`.`Id` as `useridd`,`pa`.`user_id` as `usd_id`,`pa`.`start_date` as `pa_startdate`,`pa`.`project_id` as `pa_pro_assg_id` FROM `employee` `emp` LEFT JOIN `project_assignment` `pa` ON `emp`.`Id`=`pa`.`user_id` LEFT JOIN `project_manganement` `pm` ON `pa`.`project_id`=`pm`.`project_id` where `emp`.`emp_status`='ACTIVE' AND `emp`.`emp_name` LIKE '%$filtervalue' OR `emp`.`emp_name` LIKE '$filtervalue%' OR `emp`.`emp_name` LIKE '%$filtervalue%'";
                 $sqldata ="SELECT `pa`.*,`emp`.`emp_name` FROM `project_assignment` `pa` LEFT JOIN `employee` `emp` ON `pa`.user_id=`emp`.`Id` LEFT JOIN `project_manganement` `pm` ON `pa`.`project_id`=`pm`.`project_id` where `emp`.`emp_status`='1' AND `emp`.`emp_name` LIKE '%$filtervalue' OR `emp`.`emp_name` LIKE '$filtervalue%' OR `emp`.`emp_name` LIKE '%$filtervalue%'  LIMIT $offset, $no_of_records_per_page";
                  }

                  $cnt=0;
                  $resul = mysqli_query($conn,$sqldata);
                  while($rawdata = mysqli_fetch_assoc($resul))
                  {
                  ?>
                     <tr>
                        <td><?php echo ++$cnt;?></td>
                        <td hidden><?php echo $row["Id"];?></td>
                        <td><?php echo ProjectName($rawdata['project_id'],$conn);?></td>
                        <td><?php echo EmployeeName($rawdata['user_id'],$conn);?></td>
                        <td><?php echo $rawdata['start_date'];?></td>
                        <td><form method="POST"><button id="singlebuttonedit" name="empEdit" value="<?php echo $rawdata["project_id"];?>" class="btn btn-info">Edit</button></form></td>
                     </tr>
            <?php } ?>

                 </tbody>
            </table>
      <?php
       $sql1 = "SELECT * from `project_assignment`";
       echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
      ?>
           </div><br>

           <!-- Start Pagination  -->
			  

</main><!-- End #main -->
<?php
            function ProjectName($id,$conn){
              $sqldata = "SELECT * FROM project_manganement where project_id ='$id'" ;
              $resul = mysqli_query($conn,$sqldata);
              $rawdata = mysqli_fetch_assoc($resul);
              $PojectName=$rawdata['project_name'];
              return $PojectName;

            }

            function EmployeeName($userid,$conn){
              //$sqld = "SELECT `emp_name` FROM `employee` where `Id` ='$userid'" ;
              $sqld = "SELECT d.user_id, GROUP_CONCAT(n.emp_name) AS names FROM project_assignment d LEFT JOIN employee n ON FIND_IN_SET(n.Id, '$userid') > 0 where d.user_id='$userid'";
              $res = mysqli_query($conn,$sqld);
              $rad = mysqli_fetch_assoc($res);
              $empName=$rad['names'];
              return $empName;
            }

            if(isset($_POST["empEdit"]))
            {
              $Id=$_REQUEST["empEdit"];  
              header("location:PFC.php?PageName=project_view&EmpID=".$Id);
            }
           
?>
  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>






  
