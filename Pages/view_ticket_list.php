<?php
//error_reporting(0);
include 'connection.php';
include("Pages/pagi_script.php");

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

?>
<main id="main" class="main">
<section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-header">
          <nav class="navbar navbar-light bg-light">
                 
                    <form method="POST">
                    <a class="btn btn-warning text-black" href="PFC.php?PageName=view_ticket_list" style="margin:4px;font-size:large;height:37px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
                         <input type="text" name="searchvalue" style="margin:13px;height:41px;padding:-3px;width:287px;" placeholder="Search by name" title="Type in a name">&nbsp;&nbsp;
                         <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                         </form>
                         <h2 style="color:#012970;margin-right:578px;margin-top:10px;"><b>VIEW TICKETS</b></h2>
                       </nav>
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <!-- <u>View Ticket Details:-</u> -->
                            <table  class="hover table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">S.No</th>
                                <th scope="col" hidden>Id</th>
                                <th scope="col">EmpName</th>
                                <th scope="col">Type Of Tickets</th>
                                <th scope="col">Open_Date</th>
                                <th scope="col">Close_Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">CreatedOn</th>
                                <th scope="col"><span class="actives">Action</span></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                      $limit="LIMIT $offset, $no_of_records_per_page";
                                      $condition="AND `emp`.`emp_status`!='' AND `emp`.`emp_status`='1'";
                                      
                                      if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                                      {
                                          //$sql="SELECT `ts`.`Id`, `ts`.`user_id`, `ts`.`ticket_no`, `ts`.`type_of_ticket`, `ts`.`complain_issue`, `ts`.`status`, `ts`.`ticket_close_date`,`ts`.`ticket_open_date`, `ts`.`CreatedOn`,`emp`.`Id`,`emp`.`emp_name` FROM `ticket_system` `ts` LEFT JOIN `employee` `emp` ON `ts`.`user_id`=`emp`.`Id`"."$limit";
                                          $sql="SELECT `ts`.`Id` as `ticket_id`, `ts`.`user_id`, `ts`.`ticket_no`, `ts`.`type_of_ticket`, `ts`.`complain_issue`, `ts`.`status`, `ts`.`ticket_close_date`,`ts`.`ticket_open_date`, `ts`.`CreatedOn`,`emp`.`Id`,`emp`.`emp_name` FROM `ticket_system` `ts` LEFT JOIN `employee` `emp` ON `ts`.`user_id`=`emp`.`Id`"."$limit";
                                      }

                                      if(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                                      {
                                        $sql="SELECT `ts`.`Id` as `ticket_id`, `ts`.`user_id`, `ts`.`ticket_no`, `ts`.`type_of_ticket`, `ts`.`complain_issue`, `ts`.`status`, `ts`.`ticket_close_date`,`ts`.`ticket_open_date`, `ts`.`CreatedOn`,`emp`.`Id`,`emp`.`emp_name` FROM `ticket_system` `ts` LEFT JOIN `employee` `emp` ON `ts`.`user_id`=`emp`.`Id`"."$condition"."$limit";
                                      }

                                      if(isset($_POST['submitsearch']))
                                      {
                                          $filtervalue=strtoupper($_REQUEST['searchvalue']);
                                          $sql="SELECT `ts`.`Id` as `ticket_id`, `ts`.`user_id`, `ts`.`ticket_no`, `ts`.`type_of_ticket`, `ts`.`complain_issue`, `ts`.`status`, `ts`.`ticket_close_date`,`ts`.`ticket_open_date`, `ts`.`CreatedOn`,`emp`.`Id`,`emp`.`emp_name` FROM `ticket_system` `ts` LEFT JOIN `employee` `emp` ON `ts`.`user_id`=`emp`.`Id` WHERE `emp`.`emp_name` LIKE '%$filtervalue' OR `emp`.`ticket_no` LIKE '$filtervalue%' OR `emp`.`ticket_no` LIKE '%$filtervalue%'"."$limit";
                                      }

                                      $res_data = mysqli_query($conn,$sql);
                                      {
                                      $cnt=0; 
                                while($row = mysqli_fetch_array($res_data)) 
                                {
                              ?>
                              <tr>
                                  <td><?php echo ++$cnt;?></td>
                                  <td hidden><?php echo $row["ticket_id"];?></td>
                                  <td><?php echo employee_name($row["user_id"],$conn);?></td>
                                  <td><?php echo type_of_ticket($row["type_of_ticket"],$conn);?></td>
                                  <td><?php echo $row["ticket_open_date"];?></td>
                                  <td><?php echo $row["ticket_close_date"];?></td>
                                  <td><?php echo status($row["status"],$conn);?></td>
                                  <td><?php echo $row["CreatedOn"]; ?></td>
                              <td>
                                <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <form method="POST">
                                <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["ticket_id"]; ?>" class="btn btn-success">Approve</button>
                                <button id="singlebuttonview" name="empview" value="<?php echo $row["ticket_id"]; ?>" class="btn btn-success">View</button>
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
              </table><br><br>
              <?php
              $sql1 = "SELECT * from employee";
                echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
              ?>
            </div>
          </div>
          </div>
        </div>
      </div>
      </main>
<?php


    if(isset($_POST["empEdit"]))
    {
      $id=$_REQUEST["empEdit"];  
      $EID=EDV($id,1);
      header("location:PFC.php?PageName=TicketUpdate&EmpID=".$EID);
    }
    if(isset($_POST["empview"]))
    {
      $id=$_REQUEST["empview"];  
      $EID=EDV($id,1);
      header("location:PFC.php?PageName=view_ticket_status&EmpID=".$EID);
    }

    
    // echo $no_of_records_per_page;
    // echo $offset;
    // echo $pageno;
    // echo $no_of_records_per_page;


    function employee_name($id,$conn)
    {
        $sqld = "SELECT `emp_name` FROM `employee` WHERE `Id`='$id'";
        $res = mysqli_query($conn,$sqld);
        $rad = mysqli_fetch_assoc($res);
        $empName=$rad['emp_name'];
        return $empName;
      }

      function type_of_ticket($typeofticket,$conn)
      {
          $sqldt = "SELECT `Id`, `type_of_ticket` FROM `complaint_type` WHERE `Id`='$typeofticket'";
          $resul = mysqli_query($conn,$sqldt);
          $radd = mysqli_fetch_assoc($resul);
          $typeofticket=$radd['type_of_ticket'];
          return $typeofticket;
        }

        function status($status,$conn)
        {
            $sqls = "SELECT `Id`, `status_of_complaint` FROM `complaint_status` WHERE `Id`='$status'";
            $result = mysqli_query($conn,$sqls);
            $radds = mysqli_fetch_assoc($result);
            $statuss=$radds['status_of_complaint'];
            return $statuss;
          }
?>

   

  </main>

<script>
 
  $(document).ready(function()
{
  $("#gridRadios1").click(function()
  {
    //alert($("#gridRadios1").val());
if($("#gridRadios1").val()=='Yes')
{
  $(".userlogin").show();
}
if($("#gridRadios1").val()=='No')
{
  $(".userlogin").hide();
  $("#username1").val('');
  $("#password").val('');
}
  });

  $("#gridRadios2").click(function()
  {
    //alert($("#gridRadios2").val());
if($("#gridRadios2").val()=='No')
{
  $(".userlogin").hide();
  $("#username1").val('');
  $("#password").val('');
}
  });
  
});
  </script>

<script>  

$(document).ready(function(){

  $(document).on('click', '.editbtn', function()
  {
  var id = $(this).val();
  $('#EditModal').modal('show');    
  $tr = $(this).closest('tr');

var data = $tr.children("td").map(function () 
{
return $(this).text();
}).get();

    //console.log(data);
    $('#dept_id').val(data[0]);
    $('#name1').val(data[1]);
    $('#father_name1').val(data[2]);
    $('#joining_date1').val(data[3]);
    $('#status1').val(data[4]);

      });
    });    

</script>
<script type="text/javascript">  

$(document).ready(function(){

  $(document).on('click', '.viewbtn', function()
  {
  var id = $(this).val();
  var viewdata = $("#empView").val();
  //alert(viewdata);
    $('#viewModal').modal('show');    
    $tr = $(this).closest('tr');

var data = $tr.children("td").map(function () {
return $(this).text();
}).get();
//console.log(data);
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

                $('#delete_id').val(data[0]);
                $('#editstatus').val(data[21]);
              });
        });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/Javascript">
$(document).ready(function(){
    $('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'view/employee/ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'view/employee/ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <!-- ======= End Footer ======= -->
