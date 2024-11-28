<?php
error_reporting(0);
include '../connection.php';

// // Get the user's IP address using the $_SERVER variable.
 $ipAddress = $_SERVER['REMOTE_ADDR'];
//$ipAddress = 'crm123.in';

// // Use an external service (like an IP geolocation API) to get location data.
// $locationData = file_get_contents("http://ip-api.com/json/{$ipAddress}");

// // Parse the JSON response.
// $locationInfo = json_decode($locationData);

// if ($locationInfo && $locationInfo->status == "success") {
//     $latitude = $locationInfo->lat;
//     $longitude = $locationInfo->lon;

//   "IP Address: " . $ipAddress . "<br>";
//   "Latitude: " . $latitude . "<br>";
//  "Longitude: " . $longitude . "<br>";
// } else {
//     echo "Unable to retrieve location data.";
// }

$EmpID=$_GET["employeeid"];
//$EmpID='1';
$monthnames=$_GET["monthname"];
$longitude=$_GET["longitude"];
$latitude=$_GET["latitude"];

//$conn = new mysqli("localhost:8080", "root", "", "adminpanel");
//$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id`";
//$sql="SELECT `ea`.*,`us`.`emp_name`,COUNT(*) as count FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` GROUP BY ea.user_id, us.emp_name, ea.status
//ORDER BY ea.user_id, ea.status";
// $EmpID=$_REQUEST["EmpID"];
// $monthnames=$_REQUEST["monthname"];

if(isset($EmpID)){
      //$EmpID=EDV($EmpID,2);
//$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` where `ea`.`user_id` = '$EmpID' and MONTHNAME(`ea`.`check_in_date`)='$monthnames'";
$sql="SELECT ea.*, us.emp_name, REPLACE(ea.`check_in_time`, 'am', '') AS `check_in_time`, REPLACE(ea.`check_out_time`, 'pm', '') AS `check_out_time`, DAYNAME(`ea`.`check_in_date`) AS day_of_week FROM employee_attendence ea LEFT JOIN employee us ON ea.user_id = us.Id WHERE ea.user_id = '$EmpID' AND MONTHNAME(ea.check_in_date) = '$monthnames' ORDER BY ea.check_in_date ASC";
//$sql="SELECT ea.*, us.emp_name, REPLACE(ea.`check_in_time`, 'am', '') AS `check_in_time`, REPLACE(ea.`check_out_time`, 'pm', '') AS `check_out_time`, DAYNAME(`ea`.`check_in_date`) AS day_of_week FROM employee_attendence ea LEFT JOIN employee us ON ea.user_id = us.Id ORDER BY ea.check_in_date ASC";
// Fetch records from database 
$query = $conn->query($sql); 
 
if($query->num_rows > 0){ 
    //$delimiter = ","; 
    $delimiter = "\t";
    //$filename = "LTSattendance-data_" . date('Y-m-d'); 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('S.No','Employee Name','Check In Time','Check In Date','Check Out Time','Check Out Date','Status','Day','IP-Address','Longitude','Latitude','CreatedOn'); 
    fputcsv($f, $fields, $delimiter); 
     $id=1;
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($id++, $row['emp_name'], $row['check_in_time'], $row['check_in_date'], $row['check_out_time'], $row['check_out_date'], $row['status'],$row['day_of_week'],$ipAddress,$longitude,$latitude,$row['CreatedOn']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    //header('Content-Type: text/csv'); 
    //header('Content-Type: text/xls'); 
    //header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=LTS-attendance-report.xls'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
    //readfile($filename);
} 
}
else
{
    echo "No ID Found Here";
}
exit; 
?>
