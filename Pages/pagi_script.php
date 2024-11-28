<?php

//Getting default page number
$EmpID=$_REQUEST["EmpID"];
      $EmpID=EDV($EmpID,2);
        if (isset($_GET['pageno'])) {

            $pageno = $_GET['pageno'];

        } else {

            $pageno = 1;

        }
// Formula for pagination  

        $no_of_records_per_page = 10;

        $offset = ($pageno-1) * $no_of_records_per_page;

// Getting total number of pages
?>
<?php 
function htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno){
if ($result = mysqli_query($conn, $sql1)) {

    // Return the number of rows in result set
    $total_rows = mysqli_num_rows( $result );
    $total_pages = ceil($total_rows / $no_of_records_per_page); 
   
}

?>

<?php if($_REQUEST['PageName']=="view_employee_details") { ?>
<h4><div align="center">

<ul class="pagination">

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=view_employee_details&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=view_employee_details&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=view_employee_details&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=view_employee_details&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>

<?php if($_REQUEST['PageName']=="view_role_management_system_details") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=view_role_management_system_details&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=view_role_management_system_details&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=view_role_management_system_details&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=view_role_management_system_details&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>

<?php } ?>
<?php if($_REQUEST['PageName']=="view_department_details") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=view_department_details&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=view_department_details&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=view_department_details&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=view_department_details&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>

<?php if($_REQUEST['PageName']=="view_designation_details") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=view_designation_details&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=view_designation_details&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=view_designation_details&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=view_designation_details&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>

<?php if($_REQUEST['PageName']=="master_view_salary") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=master_view_salary&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=master_view_salary&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=master_view_salary&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=master_view_salary&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>

<?php if($_REQUEST['PageName']=="view_earthing_gp") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=view_earthing_gp&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=view_earthing_gp&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=view_earthing_gp&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=view_earthing_gp&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>



<?php if($_REQUEST['PageName']=="project_assigment") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=project_assigment&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=project_assigment&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=project_assigment&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=project_assigment&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>

<?php if($_REQUEST['PageName']=="project_management") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=project_management&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=project_management&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=project_management&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=project_management&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>

<?php if($_REQUEST['PageName']=="attence_emp") { ?>
    <h4><div align="center">

<ul class="pagination">

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=attence_emp&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=attence_emp&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=attence_emp&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=attence_emp&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>

<?php if($_REQUEST['PageName']=="add_salary_slip") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=add_salary_slip&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=add_salary_slip&pageno=".($pageno - 1); } ?>"class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=add_salary_slip&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=add_salary_slip&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>
<!---New added on 06-09-2023--->
<?php if($_REQUEST['PageName']=="view_ticket_list") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=view_ticket_list&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=view_ticket_list&pageno=".($pageno - 1); } ?>"class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=view_ticket_list&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=view_ticket_list&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<!---New added on 06-09-2023--->
<?php } ?>

<!---New added on 11-09-2023--->
<?php if($_REQUEST['PageName']=="View_attendancee") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=View_attendance&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=View_attendance&pageno=".($pageno - 1); } ?>"class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=View_attendance&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=View_attendance&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>
<?php if($_REQUEST['PageName']=="view_offer_letter") { ?>
    <h4><div align="center">

<ul class="pagination" >

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=view_offer_letter&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=view_offer_letter&pageno=".($pageno - 1); } ?>"class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=view_offer_letter&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=view_offer_letter&EmpID=<?php echo $total_pages; ?>&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<!---New added on 05-10-2023--->
<?php } ?>
<!---New added on 11-09-2023--->


<?php if($_REQUEST['PageName']=="product") { ?>
    <h4><div align="center">

<ul class="pagination">

<?php  //echo $total_pages;?>

    <li><a href="PFC.php?PageName=product&pageno=1" class="btn btn-primary">First</a>&nbsp;</li>

    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "PFC.php?PageName=product&pageno=".($pageno - 1); } ?>" class="btn btn-primary">Prev</a>&nbsp;

    </li>

    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "PFC.php?PageName=product&pageno=".($pageno + 1); } ?>" class="btn btn-primary">Next</a>&nbsp;

    </li>

    <li><a href="PFC.php?PageName=product&pageno=<?php echo $total_pages; ?>" class="btn btn-primary">Last</a></li>

</ul>

</div></h4>
<?php } ?>
<?php
}
?>