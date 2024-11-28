<?php
//error_reporting(0);
include '../connection.php';

//if (isset($_GET['month']) && isset($_GET['year'])) 
if (isset($_GET['month']) && isset($_GET['year']) && isset($_GET['ID'])) 
{
$year  = $_GET['year'];
$month = $_GET['month'];
$ID = $_GET['ID'];

if(!empty($ID))
{
    $sql = "SELECT `ea`.`user_id`,`emp`.`emp_name`,COUNT(*) AS `attendance_count` FROM `employee_attendence` `ea` LEFT JOIN `employee` `emp` ON `ea`.`user_id`=`emp`.`Id` WHERE MONTH(`ea`.`check_in_date`) = '$month' AND YEAR(`ea`.`check_in_date`) = '$year' AND `ea`.`check_in_time`!='00:00' AND `emp`.`Id`='$ID' GROUP BY `ea`.`user_id`,`emp`.`emp_name`";
}
if($ID==1 || $ID==26)
{
    $sql = "SELECT `ea`.`user_id`,`emp`.`emp_name`,COUNT(*) AS `attendance_count` FROM `employee_attendence` `ea` LEFT JOIN `employee` `emp` ON `ea`.`user_id`=`emp`.`Id` WHERE MONTH(`ea`.`check_in_date`) = '$month' AND YEAR(`ea`.`check_in_date`) = '$year' AND `ea`.`check_in_time`!='00:00' GROUP BY `ea`.`user_id`,`emp`.`emp_name`";
}
//$sql = "SELECT `check_in_date`,user_id FROM employee_attendence WHERE  MONTH(`check_in_date`) = '$month' AND YEAR(`check_in_date`) = '$year'";
//$sql = "SELECT `ea`.`user_id`,`emp`.`emp_name`,COUNT(*) AS `attendance_count` FROM `employee_attendence` `ea` LEFT JOIN `employee` `emp` ON `ea`.`user_id`=`emp`.`Id` WHERE MONTH(`ea`.`check_in_date`) = '$month' AND YEAR(`ea`.`check_in_date`) = '$year' AND `ea`.`check_in_time`!='00:00' GROUP BY `ea`.`user_id`,`emp`.`emp_name`";
 //echo $sql;
// die;
$result = mysqli_query($conn,$sql);
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($data);
}
else {
    // Handle the case when parameters are not set
    echo "Error: Missing parameters.";
}
?>
