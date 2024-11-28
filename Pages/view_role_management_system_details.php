<?php

    require_once 'connection.php';
    include("Pages/pagi_script.php");

    if(isset($_POST["roleadded"]))
    {
      $role_name=CF($_POST["rolen"],$conn);
      $role_add=$_POST["permissionforadd"];
      $role_edit=$_POST["permissionforedit"];
      $role_view=$_POST["permissionforview"];
      $role_delete=$_POST["permissionfordel"];

      $sql_role="INSERT INTO `roles`(`role_name`, `permission_for_add`, `permission_for_edit`, `permission_for_view`, `permission_for_delete`) 
      VALUES ('$role_name','$role_add','$role_edit','$role_view','$role_delete')";
      $run_Sub = mysqli_query($conn, $sql_role);
      header("location:PFC.php?PageName=view_role_management_system_details&Mgs=1");
    }
    
    //Edit roles_start
    if(isset($_POST["editrole"]))
    {
      $role_names=CF($_POST["roleedit"],$conn);
      $role_Id=$_POST["roleid"];
      $role_add1=$_POST["permissionforadd1"];
      $role_edit1=$_POST["permissionforedit1"];
      $role_view1=$_POST["permissionforview1"];
      $role_delete1=$_POST["permissionfordel1"];

      $sql_role_update="UPDATE `roles` SET `role_name`='$role_names',`permission_for_add`='$role_add1',`permission_for_edit`='$role_edit1',`permission_for_view`='$role_view1',`permission_for_delete`='$role_delete1' WHERE `role_id`='$role_Id'";
      $run_Subb = mysqli_query($conn, $sql_role_update);
      header("location:PFC.php?PageName=view_role_management_system_details&Mgs=1");
    }
    //Edit roles_end.
?>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Record Saved.</strong>
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
                <input type="text" name="searchvalue" style="margin:-25;height:39px;padding:6px;width:300px;"  placeholder="Enter your search Role" value="">
                <input class="btn btn-outline-success my-2 my-sm-0" style="margin:-25;height:39px;padding:6px;width:100px;" type="submit" name="submitsearch" value="Search">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="height:39px;padding:6px;width:162px;margin-left:1075px;margin-top: -49px">+ Add Role Permission</button>
                </form>  
                 <h2 style="color:#012970;margin-left: 571px;margin-top: -63px"><b>VIEW ROLES DETAILS</b></h2>      
             </nav><br><br>
               
         <!--table start-->
         <!--table start-->
         <div class="card-body">
            <table  class="hover table table-striped" style="width:100%">
            <thead class="thead-pink" >
            <tr>
 
                   <th scope="col">S.no</th>
                    <th scope="col">Role_name</th>
                    <th scope="col">permission_for_add</th>
                    <th scope="col">permission_for_edit</th>
                    <th scope="col">permission_for_view</th>
                    <th scope="col">permission_for_delete</th>
                    <th scope="col"><span class="actives">Action</span></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT `role_id`,`role_name`,CASE WHEN `permission_for_add`='1' THEN 'True' WHEN `permission_for_add`='0' THEN 'False' END as `permission_for_add`, CASE WHEN `permission_for_edit`='1' THEN 'True' WHEN `permission_for_edit`='0' THEN 'False' END as `permission_for_edit`, CASE WHEN `permission_for_view`='1' THEN 'True' WHEN `permission_for_view`='0' THEN 'False' END as `permission_for_view`, CASE WHEN `permission_for_delete`='1' THEN 'True' WHEN `permission_for_delete`='0' THEN 'False' END as `permission_for_delete` FROM `roles` order by `role_id` LIMIT $offset, $no_of_records_per_page";
                  if(isset($_POST['submitsearch']))
                  {
                    $filtervalue=strtoupper($_REQUEST['searchvalue']);
                    $sql = "SELECT `role_id`,`role_name`,CASE WHEN `permission_for_add`='1' THEN 'True' WHEN `permission_for_add`='0' THEN 'False' END as `permission_for_add`, CASE WHEN `permission_for_edit`='1' THEN 'True' WHEN `permission_for_edit`='0' THEN 'False' END as `permission_for_edit`, CASE WHEN `permission_for_view`='1' THEN 'True' WHEN `permission_for_view`='0' THEN 'False' END as `permission_for_view`, CASE WHEN `permission_for_delete`='1' THEN 'True' WHEN `permission_for_delete`='0' THEN 'False' END as `permission_for_delete` FROM `roles` WHERE `role_name` LIKE '%$filtervalue%'";
                  }
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  {
                    $cnt=0; 
                  while($row = $result->fetch_assoc()) 
                    {
                      $_SESSION['role_id']=$row["role_id"];
                      $_SESSION['role_name']=$row["role_name"];

                      ?>
                      <tr>
                         <td><?php echo ++$cnt;?></td>
                        <td hidden><?php echo $row["role_id"];?></td>
                        <td><?php echo $row["role_name"];?></td>
                        <td><?php echo $row["permission_for_add"];?></td>
                        <td><?php echo $row["permission_for_edit"];?></td>
                        <td><?php echo $row["permission_for_view"];?></td>
                        <td><?php echo $row["permission_for_delete"];?></td>
                        <!-- <td><span class='editactives'><a href='' data-bs-toggle='modal' class='btn btn-primary editbtn'>Edit</a></span> -->
                        <td><button  data-bs-toggle='modal' class='btn btn-primary editbtn'>Edit</button></td>
                      </tr>
                <?php
                    }
                  }
                  ?>
                 </tbody>
             </table>
             <?php
                 $sql1 = "SELECT * from roles";
                 echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
             ?>
    </div>         
      <!-- Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action=""  method="POST" >
      <div class="modal-header">
          <legend class="card-title"  id="myModalLabel" style="color:#012970;">Add Role Management</legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
            <div class="modal-body">
                <div class="form-group">
                    <!-- <div class=""> -->
                    <div class="mb-3 row">
                    <label for="fname" class="col-sm-2 col-form-label">Role Name :</label> &nbsp;
                    <div class="col-4">
                          <input type="text" id="rolen" name="rolen" class="role form-control"><br><br>
                            </div>
                           </div><br>
                            <div class="row">
                            <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="add" value="Add">
                  <input type="hidden" name="permissionforadd"  id="addfor"    value="0">
                  <input type="hidden" name="permissionforedit" id="editfor"   value="0">
                  <input type="hidden" name="permissionforview" id="viewfor"   value="0">
                  <input type="hidden" name="permissionfordel"  id="deletefor" value="0">
                  <label class="form-check-label" for="gridRadios1">
                  Add
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="edit" value="Edit">
                  <label class="form-check-label" for="gridRadios2">
                  Edit
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="view" value="View">
                  <label class="form-check-label" for="gridRadios2">
                  View
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="delete" value="Delete">
                  <label class="form-check-label" for="gridRadios2">
                  Delete
                  </label>
                </div>
              </div>
                              </div>
                        <!-- </div> -->
                     </div>
                  </div>
                 <div class="modal-footer">
                 <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
                  <input type="submit" id="roleadded"  name="roleadded" class="btn btn-primary add_role" value="Submit">
               </div>
           </form>
        </div>
     </div>
</div>
           <!-- Edit Modal HTML -->     
<div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
        <Form action="" method="POST"  id="editForm">
          <input type="hidden" id="roleid" name="roleid"/>
            <div class="modal-header">						
               <h5 class="card-title" style="color:#012970;">Edit Role Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
               <div class="modal-body">			
                   <div class="form-group">     
                     <div class="col ms-1 me-2 mt-3">              
                     <div class="row">
                    <div class="col-ms-10">
                        <label for="fname">Role Name :</label> &nbsp;
                          <input type="text" id="roleedit" name="roleedit"><br><br>
                            </div>
                           </div><br>
                            <div class="row">
                            <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="add1" value="Add">
                  <input type="hidden" name="permissionforadd1"  id="addfor1" value="0">
                  <input type="hidden" name="permissionforedit1" id="editfor1" value="0">
                  <input type="hidden" name="permissionforview1" id="viewfor1" value="0">
                  <input type="hidden" name="permissionfordel1"  id="deletefor1" value="0">
                  <label class="form-check-label" for="gridRadios1">
                  Add
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="edit1" value="Edit">
                  <label class="form-check-label" for="gridRadios2">
                  Edit
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="view1" value="View">
                  <label class="form-check-label" for="gridRadios2">
                  View
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="permissionfor[]" id="delete1" value="Delete">
                  <label class="form-check-label" for="gridRadios2">
                  Delete
                  </label>
                </div>
              </div>
                              </div>
                              </div>
                           </div>
                         </div>
                     <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
             <input type="submit" name="editrole" id="editrole"   class="btn btn-primary add_empolyee" value="Update"/>
         </div>
    </form>
  </div>
</div>
</div>
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
          
</main>

<script language="JavaScript" type="text/javascript">
$(document).ready(function()
{


$('#add').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#add").val()=='Add')
        {
            $('#addfor').val("1");
        }

    }      
});


$('#edit').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#edit").val()=='Edit')
        {
            $('#editfor').val("1");
        }

    }      
});

$('#view').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#view").val()=='View')
        {
            $('#viewfor').val("1");
        }

    }      
});

$('#delete').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#delete").val()=='Delete')
        {
            $('#deletefor').val("1");
        }

    }      
});

});
</script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function()
{


$('#add').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#add").val()=='Add')
        {
            $('#addfor').val("1");
        }

    }      
});


$('#edit').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#edit").val()=='Edit')
        {
            $('#editfor').val("1");
        }

    }      
});

$('#view').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#view").val()=='View')
        {
            $('#viewfor').val("1");
        }

    }      
});

$('#delete').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#delete").val()=='Delete')
        {
            $('#deletefor').val("1");
        }

    }      
});

});
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

            //console.log(data);
            //console.log($tr);

            $('#roleid').val(data[0]);
            $('#roleedit').val(data[2]);
          //   $('#add1').val(data[2]);
          //   $('#edit1').val(data[3]);
          //  $('#view1').val(data[4]);
          //  $('#delete1').val(data[5]);
//Add
            if(data[3]==='True')
            {
                $('#add1').prop('checked', true);
            }
            if(data[3]==='False')
            {
                $('#add1').prop('checked', false);
            }
//Add

//Edit
            if(data[4]=='True')
            {
                $('#edit1').prop('checked', true);
            }
            if(data[4]=='False')
            {
                $('#edit1').prop('checked', false);
            }
//Edit

//view
           if(data[5]=='True')
            {
                $('#view1').prop('checked', true);
            }
            if(data[5]=='False')
            {
                $('#view1').prop('checked', false);
            }
//view

//Delete
            if(data[6]=='True')
            {
                $('#delete1').prop('checked', true);
            }
            if(data[6]=='False')
            {
                $('#delete1').prop('checked', false);
            }
//Delete
        });
  
    //$('#myTabless').DataTable();

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
  
  <script language="JavaScript" type="text/javascript">
$(document).ready(function()
{
$('#add1').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#add1").val()=='Add')
        {
            $('#addfor1').val("1");
        }

    }      
});


$('#edit1').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#edit1").val()=='Edit')
        {
            $('#editfor1').val("1");
        }

    }      
});

$('#view1').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#view1").val()=='View')
        {
            $('#viewfor1').val("1");
        }

    }      
});

$('#delete1').click(function() {
    if(this.checked) {
      //  var returnVal = confirm("Are you sure?");

        if($("#delete1").val()=='Delete')
        {
            $('#deletefor1').val("1");
        }

    }      
});

});
</script>

  <!-- ======= End scripts ======= -->
