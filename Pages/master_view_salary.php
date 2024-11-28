<?php
//error_reporting(0);
//session_start();


include 'connection.php';
include("Pages/pagi_script.php");
// echo $query = "SELECT `msd`.*,`msd`.`Id` as `salary_id` FROM master_salary_data `msd` LIMIT $offset, $no_of_records_per_page";     
// $rs_result = mysqli_query ($conn, $query);
    
?>


<main id="main" class="main">

<!-- Start dashboard inner -->
<div class="midde_cont" style="margin-left: -254px;">
  <div class="container-fluid">
    <!-- row -->
<div class="row column1">
  <div class="col-md-12">
        <div class="container py-5">
            <div class="card mt-3">
            <div class="card-header" style="margin-right:-275px">
            <nav class="navbar navbar-light bg-light">
          <form method="POST">
                  <input type="text" name="searchvalue" style="margin:13px;height:41px;width:287px;margin-top:1px;" placeholder="Search By Employee Name" title="Type Employee Name Here">
                  <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                  <h2 style="color:#012970;margin-left:686px;margin-top:-44px;"><b>MASTER SALARY</b></h2>
          </form>
          </nav><br><br><br>
          
                        <!--table start-->
                        <div class="card-body">
                            <table id="myTabless1" class="hover table table-striped" style="width:100%">
                            <thead class="thead-pink" >
                              <tr>
                                <th>S.No</th>
                                <th hidden>ID</th>
                                <th>Employee Name</th>
                                <th>Active Date</th>   
                                <th>De-active Date</th>
                                <th>Status</th> 
                                <th style="margin-right: -29px;"><b> Action</b></th>
                              </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                  //$sql = "SELECT * FROM `master_salary_data` LIMIT $start_from, $per_page_record";
                                  //$sql = "SELECT * FROM `employee` LIMIT $offset, $no_of_records_per_page";
                                  //$sql = "SELECT * FROM `employee` where `Id`!='1' LIMIT $offset, $no_of_records_per_page";
                                  $sql = "SELECT `emp`.`Id`,`emp`.`emp_name`,`msd`.*,  CASE
                                  WHEN `msd`.`status` = 1 THEN 'Active'
                                  WHEN `msd`.`status` = 2 THEN 'De-active'
                                END AS `status_description` FROM `employee` `emp` LEFT JOIN `master_salary_data` `msd` ON `emp`.`Id`= `msd`.`user_id` where `emp`.`Id`!='1' LIMIT $offset, $no_of_records_per_page";

                                  if(isset($_POST['submitsearch']))
                                  {
                                    $filtervalue=strtoupper($_REQUEST['searchvalue']);
                                    //$sql = "SELECT * FROM `employee` where `emp_name` LIKE '%$filtervalue' OR `emp_name` LIKE '$filtervalue%' OR `emp_name` LIKE '%$filtervalue%' LIMIT $offset, $no_of_records_per_page";
                                    //$sql = "SELECT * FROM `employee` where `emp_name` LIKE '%$filtervalue' OR `emp_name` LIKE '$filtervalue%' OR `emp_name` LIKE '%$filtervalue%' AND `Id`!='1' LIMIT $offset, $no_of_records_per_page";
                                    $sql = "SELECT `emp`.`Id`,`emp`.`emp_name`,`msd`.*,CASE
                                    WHEN `msd`.`status` = 1 THEN 'Active'
                                    WHEN `msd`.`status` = 2 THEN 'De-active'
                                  END AS `status_description` FROM `employee` `emp` LEFT JOIN `master_salary_data` `msd` ON `emp`.`Id`= `msd`.`user_id` where `emp`.`Id`!='1' and `emp`.`emp_name` LIKE '%$filtervalue' OR `emp`.`emp_name` LIKE '$filtervalue%' OR `emp`.`emp_name` LIKE '%$filtervalue%' LIMIT $offset, $no_of_records_per_page";
                                  }
                                  
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) 
                                  {
                                    $cnt=0;
                                      while($row = $result->fetch_assoc()) 
                                    {?>
                                    <tr>
                                    <td><?php echo ++$cnt;?></td>
                                      <td hidden><?php echo $row["user_id"];?></td>
                                      <td><?php echo $row["emp_name"];?></td>
                                      <td><?php echo $row["active_date"];?></td>
                                      <td><?php echo $row["deactive_date"];?></td>
                                      <td><?php echo $row["status_description"];?></td>
                                      <td>
                                      <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Action
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <form method="POST" action='#'>
                                         <button id="singlebuttonview" name="empView" value="<?php echo $row["user_id"]; ?>" class="btn btn-danger" >View</button>
                                          <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["user_id"]; ?>" class="btn btn-success" >Edit</button>
                                          <button id="singlebuttonadd" name="empAdd" value="<?php echo $row["user_id"]; ?>" class="btn btn-success" >Add</button>
                                     </form>
                                    </div>
                                    </div>
                                     </td>
                                      </tr>   
                                    <?php
                                    }
                                  }
                                  ?>
                              
                                </tbody>
                                
                            </table>
                    <?php
                          if(isset($_POST["empEdit"]))
                          {
                          $Id=$_REQUEST["empEdit"]; 
                          $EID=EDV($Id,1); 
                          header("location:PFC.php?PageName=master_edit_salary&EmpID=".$EID);
                          }
                          if(isset($_POST["empView"]))
                          {
                          $Id=$_REQUEST["empView"];  
                          $EID=EDV($Id,1);
                          header("location:PFC.php?PageName=master_show_data&EmpID=".$EID);
                          }
                          if(isset($_POST["empAdd"]))
                          {
                          $Id=$_REQUEST["empAdd"];  
                          $EID=EDV($Id,1);
                          header("location:PFC.php?PageName=salary_master_data&EmpID=".$EID);
                          }
                          $sql1 = "SELECT * from `employee`";
                          echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
                      ?>
                  
                          </div>
                        <!--table End-->
                        </div> 
                          </div>
                        <!--table End-->
                        </div> 
                    </div>
                  </div> 
                </div> 
              </div> 
           </div>
            
</main><!-- End #main -->

  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script type="text/Javascript">
        //function EmpUpdate(id) {
            //window.open('PFC?PageName=employee_details&EmpID='+id,'_blank');
          //  window.open('PFC.php?PageName=Edit_Salary&EmpID='+id,);
      //  }

        
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTabless");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>