<?php
error_reporting(0);
include '../connection.php';

//$conn = new mysqli("localhost:8080", "root", "", "adminpanel");
//$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id`";
//$sql="SELECT `ea`.*,`us`.`emp_name`,COUNT(*) as count FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` GROUP BY ea.user_id, us.emp_name, ea.status
//ORDER BY ea.user_id, ea.status";
// $sql="SELECT
// e.emp_name,
// MONTHNAME(a.check_in_date) AS attendance_month,
// YEAR(a.check_in_date) AS attendance_year,
// a.CreatedOn,
// a.`user_id`,
// MAX(CASE WHEN a.status = 'P' THEN a.count END) AS P,
// MAX(CASE WHEN a.status = 'W' THEN a.count END) AS WO,
// MAX(CASE WHEN a.status = 'CO' THEN a.count END) AS CO,
// MAX(CASE WHEN a.status = 'H' THEN a.count END) AS H,
// MAX(CASE WHEN a.status = 'GH' THEN a.count END) AS GH,
// MAX(CASE WHEN a.status = 'HD' THEN a.count END) AS HD,
// MAX(CASE WHEN a.status = 'L' THEN a.count END) AS L
// FROM (
// SELECT
//     `user_id`,
//     `status`,
//     COUNT(*) AS count,
//     check_in_date,
//     CreatedOn
// FROM `employee_attendence`
// GROUP BY `user_id`, status
// ) AS a
// RIGHT JOIN employee AS e
// ON a.`user_id` = e.`Id` 
// WHERE e.Id != 1 
// GROUP BY e.emp_name
// ORDER BY e.emp_name";
//WHERE DATE_FORMAT(check_in_date, '%Y-%m') = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m')

$months=$_GET["month"];
$years=$_GET["Year"];

// echo $sql="SELECT
// e.emp_name,
// e.`Id` AS `user_id`,
// MONTHNAME(a.check_in_date) AS `attendance_month`,
// YEAR(a.check_in_date) AS 'attendance_year',
// COUNT(CASE WHEN a.status = 'P' THEN 1 END) AS P,
// COUNT(CASE WHEN a.status = 'W' THEN 1 END) AS WO,
// COUNT(CASE WHEN a.status = 'L' THEN 1 END) AS L,
// COUNT(CASE WHEN a.status = 'CO' THEN 1 END) AS CO,
// COUNT(CASE WHEN a.status = 'H' THEN 1 END) AS H,
// COUNT(CASE WHEN a.status = 'GH' THEN 1 END) AS GH,
// COUNT(CASE WHEN a.status = 'HD' THEN 1 END) AS HD,
// a.CreatedOn
// FROM employee AS e
// LEFT JOIN (
// SELECT
//     `user_id`,
//     `status`,
//     check_in_date,
//     CreatedOn
// FROM `employee_attendence`
// WHERE DATE_FORMAT(check_in_date, '%m') = '$months' and DATE_FORMAT(check_in_date, '%Y') = '$years'
// ) AS a
// ON a.`user_id` = e.`Id`
// WHERE e.Id != 1
// GROUP BY e.emp_name, e.`Id`, `attendance_month`, `attendance_year`";

//SUM(CASE WHEN a.status IN ('P', 'WO', 'H', 'CO', 'GH') THEN 1 ELSE 0 END) + (SUM(CASE WHEN a.status = 'HD' THEN 1 ELSE 0 END) * 0.5) AS Days_Payable,
$sql="SELECT
e.emp_name,
e.`Id` AS `user_id`,
MONTHNAME(a.check_in_date) AS `attendance_month`,
YEAR(a.check_in_date) AS `attendance_year`,
SUM(CASE WHEN a.status = 'P' THEN 1 ELSE 0 END) AS P,
SUM(CASE WHEN a.status = 'WO' THEN 1 ELSE 0 END) AS WO,
SUM(CASE WHEN a.status = 'L' THEN 1 ELSE 0 END) AS L,
SUM(CASE WHEN a.status = 'CO' THEN 1 ELSE 0 END) AS CO,
SUM(CASE WHEN a.status = 'H' THEN 1 ELSE 0 END) AS H,
SUM(CASE WHEN a.status = 'GH' THEN 1 ELSE 0 END) AS GH,
SUM(CASE WHEN a.status = 'HD' THEN 1 ELSE 0 END) AS HD, 
SUM(CASE WHEN a.status IN ('P', 'WO', 'H', 'CO', 'GH') THEN 1 ELSE 0 END) + (SUM(CASE WHEN a.status = 'HD' THEN 1 ELSE 0 END) * 0.5) AS Days_Payable, 
a.CreatedOn
FROM employee AS e
LEFT JOIN (
SELECT `user_id`, `status`, check_in_date, CreatedOn
FROM `employee_attendence` `a`
WHERE MONTH(a.check_in_date) = '$months' AND YEAR(a.check_in_date) = '$years'
) AS a ON a.`user_id` = e.`Id`
WHERE e.Id != 1
GROUP BY e.emp_name, e.`Id`, `attendance_month`, `attendance_year`
";
//die;
// Fetch records from database 
$query = $conn->query($sql); 
 
if($query->num_rows > 0){ 
    //$delimiter = ","; 
    $delimiter = "\t";
    //$filename = "LTSattendance-data_" . date('Y-m-d'); 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Employee Name', 'attendance_month', 'attendance_year','P(Present)','W(WeekOFF)','CO(Combo-Off)','H(Holiday)','GH(Gazetted Holiday)','HD(Half-Day)-- Half-Day is counted as 0.5','L(Leave)','Days_Payable'); 
    fputcsv($f, $fields, $delimiter); 
     $id=1;
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($id++, $row['emp_name'], $row['attendance_month'], $row['attendance_year'], $row['P'], $row['WO'], $row['CO'],$row['H'],$row['GH'],$row['HD'],$row['L'],$row['Days_Payable']); 
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
exit; 
?>