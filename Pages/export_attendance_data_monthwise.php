<?php
error_reporting(0);
include '../connection.php';


$months = $_REQUEST['month'];
$year = $_REQUEST['Year'];

$monthName = date('F', mktime(0, 0, 0, $months, 1));
$Year = date('Y', mktime(0, 0, 0, 1, 1, $year));

// Define your SQL query here
$sql = "select * from employee `emp` inner join  designation `desig` ON `emp`.`desig_id`=`desig`.`desig_id` 
inner join  department `depart` ON `emp`.`dept_id`=`depart`.`dept_id`
inner join  add_salary_slip `adslp` ON `emp`.`Id`=`adslp`.`user_id` where `adslp`.`month`='$months' AND `adslp`.`year`='$year'";
//die;
// Fetch records from the database
$query = $conn->query($sql);

// Send appropriate headers to prompt a download
header('Content-Type: application/vnd.ms-excel');
$filename = "LTS-attendance-report.xls";
header("Content-Disposition: attachment; filename=$filename");

// Send appropriate headers to prompt a download
header('Content-Type: application/vnd.ms-excel');
$filename = "LTS-attendance-report.xls";
header("Content-Disposition: attachment; filename=$filename");

// Start the Excel content
echo '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
echo '<head>';
echo '<style>';
echo '
    <!--
    table {
        mso-displayed-decimal-separator:"\.";
    }
    .NumberFormat {mso-number-format:"\@";}
    .Text {mso-number-format:"\@";}
    -->
    ';
echo '</style>';
echo '</head>';
echo '<body>';

// Define the Excel content using an HTML table
echo '<table BORDER="1" WIDTH="100%" HEIGHT="100%">';
echo '<tr>';
echo '<td colspan="32" style="text-align: center;"><u><b>M/S LATECH SOLUTIONS</b></u></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="32" style="text-align: center;"><u><b>SALARY SHEET OF MONTH: ' . $monthName . ' - ' . $Year . '</b></u></td>';
echo '</tr>';
echo '<tr>';
echo '<th colspan="7">Employees Information</th><th colspan="6">Days Calculations</th><th colspan="5">Actual Salary</th><th colspan="6">Payable Salary</th><th colspan="2">Employer Contribution</th><th colspan="4">Deduction Employee Contribution</th><th colspan="2">IN-HAND</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Sno</td>';
echo '<td>Name</td>';
echo '<td>FatherName</td>';
echo '<td>UAN</td>';
echo '<td>ESIC</td>';
echo '<td>Designation</td>';
echo '<td>Department</td>';
echo '<td>Working Days</td>';
echo '<td>CL</td>';
echo '<td>ML</td>';
echo '<td>w-OFF/HD</td>';
echo '<td>Total Days</td>';
echo '<td>OT Hours</td>';
echo '<td>Basic</td>';
echo '<td>Hra</td>';
echo '<td>SPL</td>';
echo '<td>Other</td>';
echo '<td>Gross Salary</td>';
echo '<td>Basic</td>';
echo '<td>Hra</td>';
echo '<td>SPL</td>';
echo '<td>OT AMOUNT</td>';
echo '<td>TOTAL PAYABLE</td>';
echo '<td>ESIC</td>';
echo '<td>PF</td>';
echo '<td>ESIC</td>';
echo '<td>PF</td>';
echo '<td>Advance</td>';
echo '<td>Total Deductions</td>';
echo '<td>Net Payable</td>';
echo '<td>Mode Of Payment</td>';
echo '<td>Signature</td>';
echo '</tr>';

// Fetch records from the database and generate rows
$sno=1;
while ($row = $query->fetch_assoc()) {
    echo '<tr>';
    echo '<td class="excel-style">' . $sno++ . '</td>';
    echo '<td>' . $row['emp_name'] . '</td>';
    echo '<td>' . $row['father_name'] . '</td>';
    echo '<td class="excel-style">' . $row['uan_no'] . '</td>';
    echo '<td class="excel-style">' . $row['esi_no'] . '</td>';
    echo '<td>' . $row['Designation'] . '</td>';
    echo '<td>' . $row['department'] . '</td>';
    echo '<td class="excel-style">' . $row['working_day'] . '</td>';
    echo '<td class="excel-style">' . $row['CL'] . '</td>';
    echo '<td class="excel-style">' . $row['ML'] . '</td>';
    echo '<td class="excel-style">' . $row['Holiday'] . '</td>';
    echo '<td class="excel-style">' . $row['total_payable_days'] . '</td>';
    echo '<td class="excel-style">' . $row['overtime'] . '</td>';
    echo '<td class="excel-style">' . $row['basic'] . '</td>';
    echo '<td class="excel-style">' . $row['hra_no'] . '</td>';
    echo '<td class="excel-style">' . $row['special_all(SPL)'] . '</td>';
    echo '<td class="excel-style">' . $row['other_all'] . '</td>';
    echo '<td class="excel-style">' . $row['gross_salary'] . '</td>';
    echo '<td class="excel-style">' . $row['basic'] . '</td>';
    echo '<td class="excel-style">' . $row['hra_no'] . '</td>';
    echo '<td class="excel-style">' . $row['special_all(SPL)'] . '</td>';
    echo '<td class="excel-style">' . $row['overtime'] . '</td>';
    echo '<td class="excel-style">' . $row['total_payble'] . '</td>';
    echo '<td class="excel-style">' . $row['esi_@ 3.25%'] . '</td>';
    echo '<td class="excel-style">' . $row['Provident_funds@ 13%'] . '</td>';
    echo '<td class="excel-style">' . $row['esi@ 0.75%'] . '</td>';
    echo '<td class="excel-style">' . $row['Provident_fund@ 12%'] . '</td>';
    echo '<td class="excel-style">' . $row['advance'] . '</td>';
    echo '<td class="excel-style">' . $row['deductions'] . '</td>';
    echo '<td class="excel-style">' . $row['total_payble'] . '</td>';
    echo '<td class="excel-style">' . $row['salary_release_mode'] . '</td>';
    echo '<td class="excel-style">' . '' . '</td>';
    echo '</tr>';
}

// Close the HTML content
echo '</table>';
echo '</body>';
echo '</html>';

exit;
?>
