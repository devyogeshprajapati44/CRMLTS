<?php
//error_reporting(0);
include 'connection.php';
include("Pages/pagi_script.php");
?>
<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-header">
          <nav class="navbar navbar-light bg-light">
          <form method="POST">
                  <input type="text" name="searchvalue" style="margin:13px;height:41px;padding:-3px;width:287px;" placeholder="Search By Employee Name" title="Type Employee Name Here">
                <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                <h2 style="color:#012970;margin-left:585px;margin-top:-46px;"><b>VIEW OFFER LETTER DETAILS</b></h2>
          </form>
          </nav><br><br><br>
               <div class="card-body">
                 <table  class="hover table table-striped" style="width:100%">
                  <thead>
                   <tr>
                    <th scope="col">S.No</th>
                    <th scope="col" hidden>Id</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Offert CTC</th>
                    <th scope="col">Designation</th>
                    <th scope="col">STATUS</th>
                    <th scope="col"><span class="actives">Action</span></th>
                   </tr>
                  </thead>
                <tbody>
                <?php
                    $limit="order by `letter`.`Id` LIMIT $offset, $no_of_records_per_page";
                    $emp_code=$_SESSION['PFC_EmpID'];
                    if(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                    {
                    $sql="SELECT `letter`.*,CASE
                    WHEN 	`letter`.`letter_status` = 1 THEN 'APPROVED'
                    WHEN  `letter`.`letter_status` = 2 THEN 'REJECTED'
                    WHEN  `letter`.`letter_status`  = 3 THEN 'INTERVIEW'


                END AS letter_status,`desig`.Designation FROM `offer_letters_details` `letter` LEFT JOIN `designation` `desig` ON `letter`.`desig_id` = `desig`.`desig_id` where `letter`.`employee_name`!='' "." $limit";   
                    }
                    if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                    {
                       $sql="SELECT `letter`.*,CASE
                       WHEN 	`letter`.`letter_status` = 1 THEN 'APPROVED'
                       WHEN  `letter`.`letter_status`  = 2 THEN 'REJECTED'
                       WHEN  `letter`.`letter_status`  = 3 THEN 'INTERVIEW'

  
                   END AS letter_status,`desig`.Designation FROM `offer_letters_details` `letter` LEFT JOIN `designation` `desig` ON `letter`.`desig_id` = `desig`.`desig_id` where `letter`.`employee_name`!='' "." $limit";   
                    }
                    if(isset($_POST['submitsearch']))
                    {
                      
                      if(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                      {
                        $filter_value=strtoupper($_REQUEST['searchvalue']);
                      
                       $sql="SELECT `letter`.*,CASE
                       WHEN 	`letter`.`letter_status` = 1 THEN 'APPROVED'
                       WHEN  `letter`.`letter_status`  = 2 THEN 'REJECTED'
                       WHEN  `letter`.`letter_status`  = 3 THEN 'INTERVIEW'

  
                   END AS letter_status,`desig`.Designation FROM `offer_letters_details` `letter` LEFT JOIN `designation` `desig` ON `letter`.`desig_id` = `desig`.`desig_id`  where `letter`.`employee_name`!='' and `letter`.`employee_name` LIKE '%$filter_value%' OR `letter`.`employee_name` LIKE '$filter_value%' OR `letter`.`employee_name` LIKE '%$filter_value'  "." $limit";   
                      }

                      if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                      {
                        $filter_value=strtoupper($_REQUEST['searchvalue']);
                        $sql="SELECT `letter`.*,CASE
                        WHEN 	`letter`.`letter_status` = 1 THEN 'APPROVED'
                        WHEN  `letter`.`letter_status` = 2 THEN 'REJECTED'
                        WHEN  `letter`.`letter_status`  = 3 THEN 'INTERVIEW'

    
                    END AS letter_status,`desig`.Designation FROM `offer_letters_details` `letter` LEFT JOIN `designation` `desig` ON `letter`.`desig_id` = `desig`.`desig_id`  where `letter`.`employee_name`!='' and `letter`.`employee_name` LIKE '%$filter_value%' OR `letter`.`employee_name` LIKE '$filter_value%' OR  `letter`.`employee_name` LIKE '%$filter_value'  "." $limit";   
                      }
                   
                    }
                    $res_data = mysqli_query($conn,$sql);
                    if ($res_data->num_rows > 0) 
                    {
                      $cnt=0; 
                      while($row = mysqli_fetch_array($res_data)) 
                      {
                     ?>
                        <tr>
                            <td><?php echo ++$cnt;?></td>
                            <td hidden><?php echo $row["Id"];?></td>
                            <td><?php echo $row["employee_name"];?></td>
                            <td><?php echo $row["monthly_ctc"];?></td>
                            <td><?php echo $row["Designation"];?></td>
                            <td><?php echo $row["letter_status"];?></td>
                        <td>
                        <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <form method="POST">
                        <button id="singlebutton" name="empView" value="<?php echo $row["Id"]; ?>" class="btn btn-info" style="margin-left: 4px;">View</button>&nbsp;&nbsp;
                          <?php if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5)) {?><br>
                        <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["Id"]; ?>" class="btn btn-success" style="margin-top: -52px;margin-left: 53px;">Edit</button>
                        <button id="singlebuttondel"  name="empDown"  value="<?php echo $row["Id"]; ?>" class="btn btn-warning"  style="margin-top:-13px;margin-left:2px;">Download Offer Letter</button><br>
                        <button id="singlebuttondel"  name="Status"  value="<?php echo $row["Id"]; ?>" class="btn btn-info"  style="margin-top:-128px;margin-left:102px;">STATUS</button><br>
                        <!-- <button id="singlebuttondel"  name="empDel"  value="<?php //echo $row["Id"]; ?>" class="btn btn-danger"  style="margin-top:-52px;margin-left: 4px;">Delete</button><br> -->
                    
                        
                        <?php } else {?>
                        <!-- <button id="singlebuttonedit1" name="empEdit1" value="<?php //echo $row["Id"]; ?>" class="btn btn-success"></button>
                        <button id="singlebuttondel1"  name="empDel1"  value="<?php //echo $row["Id"]; ?>" class="btn btn-danger"></button> -->
                        <?php } ?>
                        <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
                        <input type="hidden" name="pfc_id" id="pfc_id" value="<?php echo $_SESSION['PFC_UID'];?>">
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
              </table><br><br>
              <?php
                 $sql1 = "SELECT * from offer_letters_details";
                   echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
              ?>
            </div>
          </div>
          </div>
        </div>
      </div>
<?php
    if(isset($_POST["empView"]))
    {
      $id=$_REQUEST["empView"];
      //$EID=EDV($id,1);
      header("location:PFC.php?PageName=view_employee_offer_details&ID=".$id);
      //view_employee_offer_details.php
    }

    if(isset($_POST["empEdit"]))
    {
      $id=$_REQUEST["empEdit"]; 
      //$EID=EDV($id,1); 
      //header("location:PFC.php?PageName=Update_offer_letter&EmpID=".$id);
      header("location:PFC.php?PageName=Update_offer_letter&ID=".$id);
    }

    // if(isset($_POST["empDel"]))
    // {
    //   $id=$_REQUEST["empDel"]; 
    //   // $EID=EDV($id,1); 
    //   //header("location:PFC.php?PageName=EmpDel&EmpID=".$EID);
    //   header("location:PFC.php?PageName=Del_offer_letter&ID=".$id);
      
    // }
    if(isset($_POST["empDown"]))
    {
      $id=$_REQUEST["empDown"]; 
      // $EID=EDV($id,1); 
      //header("location:PFC.php?PageName=EmpDel&EmpID=".$EID);
      header("location:PFC.php?PageName=offer_letter_download&ID=".$id);
      
    }

    if(isset($_POST["Status"]))
    {
      $id=$_REQUEST["Status"]; 
      // $EID=EDV($id,1); 
      //header("location:PFC.php?PageName=EmpDel&EmpID=".$EID);
      header("location:PFC.php?PageName=Status_letter&ID=".$id);
      
    }


    // echo $no_of_records_per_page;
    // echo $offset;
    // echo $pageno;
    // echo $no_of_records_per_page;
?>
<!--view modal-->
<?php
include("Pages/view_model.php");
?>  
 <!--view modal-->
 <!--Delete modal-->
    </section>

  </main>
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
