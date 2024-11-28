<?php
echo '<pre>';
print_r(timezone_identifiers_list());
echo '</pre>';
// session_start();
// echo date('D');//Day in String like Weds,Mon etc.
// echo date('d');//It is giving us Date only like 20,21 etc.
// echo date('Y-m-d');//It is giving us Date only like 20,21 etc.
// echo date('06');
// echo date("F", strtotime("2000-06-01"));
// echo date('F', mktime(0, 0, 0, 06, 1, 2011));
// echo date('d-M-Y');
// echo date('Y-m-d').'Today';
// echo date('Y-m-d H:i:s');

// // die;
//  $days='31';
//  if($days=='30')
//  {
//     $list=array();
//     $month = 12;
//     $year = 2023;
    
//     for($d=1; $d<=30; $d++)
//     {
//         $time=mktime(12, 0, 0, $month, $d, $year);          
//         if (date('m', $time)==$month)       
//             $list[]=date('d', $time);
//             $list[]=date('D', $time);
//     }
//  }

//  if($days=='31')
//  {
//         $list=array();
//         $month = 12;
//         $year = 2023;
    
//     for($d=1; $d<=31; $d++)
//     {
//         $time=mktime(12, 0, 0, $month, $d, $year);          
//         if (date('m', $time)==$month)       
//             //$list[]=date('d-D', $time);
//             $list[]=date('d', $time);
//             $daylist[]=date('D', $time);
//             $dayndate=array_combine($list,$daylist);
//            //$dayy=$list[$d];
//            //$date=$daylist[$d];
//     }
//  }
// echo "<pre>";
// //print_r($list);
// //print_r($dayndate[$list[1]]);
// echo"<br/>";
// //print_r($list[1]);
// echo"<br/>";
// print_r($list);
// echo"<br/>";
// print_r($daylist);
// echo "</pre>";
// echo"<br/>";
// echo"<br/>";
// echo"<br/>";
// function attendence($empid)
// {
//   $da=date("t");
//   if($da=='30')
//   {
//     for($k=0;$k<$da;$k++)
//     {
//      echo $list[$k]."<br/>";
//      echo $daylist[$k]."<br/>";
//     }
//   }
  
//   if($da=='31')
//   {
//     for($k=0;$k<$da;$k++)
//     {
//      echo $list[$k]."<br/>";
//      echo $daylist[$k]."<br/>";
//     }
//   }
  
//   if($da=='28')
//   {
//     for($k=0;$k<$da;$k++)
//     {
//      echo $list[$k]."<br/>";
//      echo $daylist[$k]."<br/>";
//     }
//   }
  
//   if($da=='29')
//   {
//     for($k=0;$k<$da;$k++)
//     {
//      echo $list[$k]."<br/>";
//      echo $daylist[$k]."<br/>";
//     }
//   }
// }

// echo"<br/>";
// $conn='';
// //echo $month = date('F', mktime(0, 0, 0, $i, 1, 2011));
// function attendance_first($user_id,$connection)
// {
//   $_SESSION["Hours"]='';
  
//   $conn     = new mysqli("localhost:8080", "root", "", "adminpanel");
//   $Sql_role ="SELECT HOUR(`Total_hours`) as Total_hours,`check_in_date` FROM `employee_attendence` where `user_id`='$user_id'";
//   $result   = mysqli_query($conn, $Sql_role);  
//   $rows     = mysqli_fetch_array($result, MYSQLI_ASSOC);  
//   $count    = mysqli_num_rows($result); 
  
//   $total_time=$rows["Total_hours"];
//   $working_hours=$_SESSION["Hours"];

//   $checkindate=$rows["check_in_date"];
// //echo date('d',$checkindate);
// // echo $checkin=date('D', $checkindate);
// // echo"</br>";

//   if($working_hours == '8')
//   {
//      $all='P';
//   }
  
//   if($working_hours=='7' || $working_hours=='6')
//   {
//      $all='SL';
//   }
  
//   if($working_hours=='5')
//   {
//      $all='H';
//   }
  
//   if(empty($working_hours))
//   {
//      $all='A';
//   }
  
//   if($working_hours < '8')
//   {
//      $all='HWP';
//   }

//   return $all;
// }
// echo attendance_first('1',$conn);
//  // die;
  
//   // $hour1 = 0; $hour2 = 0;
//   // $date1 = "13:30:00";
//   // $date1 = "";
//   // $date2 = "";
//   // $date2 = "18:30:00";
//   // $datetimeObj1 = new DateTime($date1);
//   // $datetimeObj2 = new DateTime($date2);
//   // $interval = $datetimeObj1->diff($datetimeObj2);
   
//   // if($interval->format('%a') > 0)
//   // {
//   // $hour1 = $interval->format('%a')*24;
//   // }
//   // if($interval->format('%h') > 0)
//   // {
//   // $hour2 = $interval->format('%h');
//   // }
  
//   // $total_time=$hour1 + $hour2;
  
//   // echo "Difference between two dates is " . ($hour1 + $hour2) . " hours.";
//   // echo"</br>";
//   // echo"</br>";

//   function salary_structure()
//   {
//       $gs1=125;
//       $gs2=258;
//       $gs3=$gs1+$gs2;
//       $gs4=$gs2-$gs1;

//      // $my_array=array($gs3,$gs4)
      
//       return $gs4;
//   }
 
//   echo "<br/>";

//   echo salary_structure();

//   // Function to retrieve attendance records from the database
// function getAttendanceRecords($employeeId, $date) {
//   // Connect to the database and perform SQL query
//   // Retrieve attendance records for the employee and date/day
//   // Return the attendance records as an array or object
// }

// // Function to calculate daily attendance
// function calculateDailyAttendance($attendanceRecords) {
//   $workingDays = 0;
//   $presentDays = 0;

//   foreach ($attendanceRecords as $record) {
//      if ($record['status'] == 'present') {
//         $presentDays++;
//      }

//      $workingDays++;
//   }

//   return [
//      'workingDays' => $workingDays,
//      'presentDays' => $presentDays
//   ];
// }

// // Function to calculate monthly attendance
// function calculateMonthlyAttendance($attendanceRecords) {
//   $workingDays = 0;
//   $presentDays = 0;

//   foreach ($attendanceRecords as $record) {
//      if ($record['status'] == 'present') {
//         $presentDays++;
//      }

//      $workingDays++;
//   }

//   return [
//      'workingDays' => $workingDays,
//      'presentDays' => $presentDays
//   ];
// }

// // Usage example
// $employeeId = 123;
// $date = '2023-06-23';

// $attendanceRecords = getAttendanceRecords($employeeId, $date);
// $dailyAttendance = calculateDailyAttendance($attendanceRecords);

// $attendanceRecords = getAttendanceRecords($employeeId, '2023-06');
// $monthlyAttendance = calculateMonthlyAttendance($attendanceRecords);


// echo "========================================";


// // session_start();

// // // Check if the user is logged in or redirect to the login page if not
// // if (!isset($_SESSION["user_id"])) {
// //   header("Location: login.php");
// //   exit();
// // }

// // if ($_SERVER["REQUEST_METHOD"] == "POST") {
// //   // Validate and sanitize the input data
// //   $currentPassword = $_POST["current_password"];
// //   $newPassword = $_POST["new_password"];
  
// //   // Verify if the current password matches the user's actual password
// //   $userId = $_SESSION["user_id"];
  
// //   // Retrieve the user's password from the database or any other storage mechanism
// //   $conn = new mysqli("localhost", "username", "password", "database_name"); // Replace with your database credentials
  
// //   $sql = "SELECT password FROM users WHERE id = ?";
// //   $stmt = $conn->prepare($sql);
// //   $stmt->bind_param("i", $userId);
// //   $stmt->execute();
// //   $stmt->bind_result($storedPassword);
// //   $stmt->fetch();
  
// //   // Verify if the current password matches the stored password
// //   if (password_verify($currentPassword, $storedPassword)) {
// //     // Hash and update the new password in the database
// //     $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
// //     $updateSql = "UPDATE users SET password = ? WHERE id = ?";
// //     $updateStmt = $conn->prepare($updateSql);
// //     $updateStmt->bind_param("si", $hashedPassword, $userId);
// //     $updateStmt->execute();
    
// //     // Display a success message or redirect to a success page
// //     echo "Password changed successfully.";
// //   } else {
// //     // Display an error message or redirect back to the change password form
// //     echo "Current password is incorrect.";
// //   }
  
// //   $stmt->close();
// //   $updateStmt->close();
// //   $conn->close();
// // }


// function checkentry($empid,$conn)
// {
//     $conn = new mysqli("localhost:8080", "root", "", "adminpanel"); 
//     $Status=0;
//     $currentdate=date('Y-m-d');
//     echo $sqll="select * from employee_attendence where `check_in_date`='$currentdate' and `user_id`='$empid'";
//     $result = mysqli_query($conn, "select * from employee_attendence where `check_in_date`='$currentdate' and `user_id`='$empid'");
//     $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
//     $count  = mysqli_num_rows($result); 
//     $checkoutdate=$row["check_out_date"];
//    // echo  $count;
//    echo $checkoutdate;
//     if($count==1)
//     {
//         $Status=1;
//     }
//     if($count==0)
//     {
//        $Status=2;
//     }
//     if(!empty($checkoutdate))
//     {
//        echo $Status=0;
//     }
//     return $Status;
// }

// echo checkentry('1',$conn);

// //SELECT * FROM `employee_attendence` WHERE date(`CreatedOn`)=date('Y-m-d')
// //File Download code:

// $file = 'path_to_file'; // Specify the path to the file

// if (file_exists($file)) {
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename=' . basename($file));
//     header('Content-Transfer-Encoding: binary');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($file));
//     ob_clean();
//     flush();
//     readfile($file);
//     exit;
// } else {
//     echo 'File not found.';
// }


// if(isset($_FILES['excelFile'])) {
//     $file = $_FILES['excelFile'];
//     $fileName = $file['name'];
//     $fileTmp = $file['tmp_name'];
//     $fileError = $file['error'];

//     // Check if there are no file upload errors
//     if ($fileError === UPLOAD_ERR_OK) {
//         $destination = 'uploads/' . $fileName; // Specify the destination directory and filename

//         // Move the uploaded file to the destination directory
//         if (move_uploaded_file($fileTmp, $destination)) {
//             echo 'File uploaded successfully.';
//         } else {
//             echo 'Failed to move uploaded file.';
//         }
//     } else {
//         echo 'Error uploading file. Error code: ' . $fileError;
//     }
// }



// echo"===============================";

// require 'vendor/autoload.php'; // Include the PhpSpreadsheet autoloader

// use PhpOffice\PhpSpreadsheet\IOFactory;

// if (isset($_FILES['excelFile'])) {
//     $file = $_FILES['excelFile'];
//     $fileName = $file['name'];
//     $fileTmp = $file['tmp_name'];
//     $fileError = $file['error'];

//     // Check if there are no file upload errors
//     if ($fileError === UPLOAD_ERR_OK) {
//         $destination = 'uploads/' . $fileName; // Specify the destination directory and filename

//         // Move the uploaded file to the destination directory
//         if (move_uploaded_file($fileTmp, $destination)) {
//             // Load the Excel file using PhpSpreadsheet
//             $spreadsheet = IOFactory::load($destination);
//             $worksheet = $spreadsheet->getActiveSheet();

//             $data = [];
//             $headerRow = $worksheet->getRowIterator(1)->current();
//             $headerCells = $headerRow->getCellIterator();
//             foreach ($headerCells as $headerCell) {
//                 $data[] = $headerCell->getValue();
//             }

//             // Assuming you have a database connection
//             $dbHost = 'your_database_host';
//             $dbUser = 'your_database_username';
//             $dbPass = 'your_database_password';
//             $dbName = 'your_database_name';

//             $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
//             if ($conn->connect_error) {
//                 die('Database connection failed: ' . $conn->connect_error);
//             }

//             // Assuming you have a table named 'your_table_name' with columns matching the header row of the Excel file
//             $tableName = 'your_table_name';

//             $insertQuery = "INSERT INTO $tableName (" . implode(', ', $data) . ") VALUES ";

//             $rowIterator = $worksheet->getRowIterator(2); // Start from the second row to skip the header row
//             foreach ($rowIterator as $row) {
//                 $cellIterator = $row->getCellIterator();
//                 $rowValues = [];
//                 foreach ($cellIterator as $cell) {
//                     $rowValues[] = "'" . $conn->real_escape_string($cell->getValue()) . "'";
//                 }
//                 $insertQuery .= "(" . implode(', ', $rowValues) . "),";
//             }

//             $insertQuery = rtrim($insertQuery, ','); // Remove the trailing comma

//             if ($conn->query($insertQuery) === TRUE) {
//                 echo 'Data inserted successfully.';
//             } else {
//                 echo 'Error inserting data: ' . $conn->error;
//             }

//             $conn->close();
//         } else {
//             echo 'Failed to move uploaded file.';
//         }
//     } else {
//         echo 'Error uploading file. Error code: ' . $fileError;
//     }
// }

// echo"============================";

// if (isset($_FILES['excelFile'])) {
//     $file = $_FILES['excelFile'];
//     $fileName = $file['name'];
//     $fileTmp = $file['tmp_name'];
//     $fileError = $file['error'];

//     // Check if there are no file upload errors
//     if ($fileError === UPLOAD_ERR_OK) {
//         // Open the uploaded Excel file
//         $handle = fopen($fileTmp, "r");

//         // Read the header row to get the column names
//         $header = fgetcsv($handle);

//         // Prepare the SQL statement
//         $sql = "INSERT INTO your_table (". implode(", ", $header) .") VALUES ";

//         // Read each row from the Excel file
//         while (($data = fgetcsv($handle)) !== false) {
//             // Escape and sanitize the values
//             $values = array_map(function($item) use ($conn) {
//                 return "'" . mysqli_real_escape_string($conn, $item) . "'";
//             }, $data);

//             // Add the row values to the SQL statement
//             $sql .= "(" . implode(", ", $values) . "), ";
//         }

//         // Remove the trailing comma and space from the SQL statement
//         $sql = rtrim($sql, ", ");

//         // Execute the SQL statement
//         if (mysqli_query($conn, $sql)) {
//             echo "Values inserted successfully into the database.";
//         } else {
//             echo "Error inserting values into the database: " . mysqli_error($conn);
//         }

//         // Close the file handle
//         fclose($handle);
//     } else {
//         echo 'Error uploading file. Error code: ' . $fileError;
//     }
// }

?>
<!-- <!DOCTYPE html>
<html>
<head> -->
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
</head>
<body>
  <div class="container">
    <select class="form-select" data-live-search="true" data-live-search-style="startsWith" class="selectpicker">
      <option value="NA">--SELECT--</option>  
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
      <option value="4">Option 4</option>
      <option value="5">Option 5</option>
      <option value="6">Option 6</option>
      <option value="7">Option 7</option>
      <option value="8">Option 8</option>
      <option value="9">Option 9</option>
      <option value="10">Option 10</option>
    </select>
  </div> -->

  <!-- Bootstrap JS (Optional) -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
  <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dselect.css">
</head>
<body>
<div class="container mt-5">
  <select class="selectpicker" id ="dselect-example" multiple aria-label="Default select example" data-live-search="true">
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">Four</option>
  </select>
</div>

<div>
          <h6>Multiple</h6>
          <select class="form-select" id="example-multiple" multiple>
            <option value="">Choose browser</option>
            <option value="chrome" selected>Chrome</option>
            <option value="firefox" selected>Firefox</option>
            <option value="safari" selected>Safari</option>
            <option value="edge">Edge</option>
            <option value="opera">Opera</option>
            <option value="brave">Brave</option>
          </select>
        </div>

</body>
<script>
    $(document).ready(function() {
      $('#example-select').select2({
        minimumResultsForSearch: 1 // Display the search box when there are at least 1 option
      });

      $('#example-select').on('change', function() {
        var selectedOptions = $(this).select2('data');
        var selectedValues = selectedOptions.map(function(option) {
          return option.text;
        }).join(', ');

        $('#selected-values').text(selectedValues);
      });

      dselect(document.querySelector('#dselect-example'))
    });
</script>
<script src="https://unpkg.com/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/dselect.js"></script>
  <script>
    // basic
    dselect(document.querySelector('#example-basic'))

    // placeholder
    dselect(document.querySelector('#example-placeholder'))

    // multiple
    dselect(document.querySelector('#example-multiple'))

    // search
    dselect(document.querySelector('#example-search'), {
      search: true
    })

    // creatable
    dselect(document.querySelector('#example-creatable'), {
      search: true,
      creatable: true
    })

    // clearable
    dselect(document.querySelector('#example-clearable'), {
      clearable: true
    })

    // Sizing
    dselect(document.querySelector('#example-sizing-sm'), {
      size: 'sm'
    })
    dselect(document.querySelector('#example-sizing-default'))
    dselect(document.querySelector('#example-sizing-lg'), {
      size: 'lg'
    })

    // Validation
    // Enable dselect on all '.dselect'
    for (const el of document.querySelectorAll('.dselect')) {
      dselect(el)
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    void (function() {
      document.querySelectorAll('.needs-validation').forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        })
      })
    })()

  </script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
</head>
<body>
<select data-live-search="true" data-live-search-style="startsWith" class="selectpicker">
  <option value="4444">4444</option>
  <option value="Fedex">Fedex</option>
  <option value="Elite">Elite</option>
  <option value="Interp">Interp</option>
  <option value="Test">Test</option>
</select>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <input type="text" class="form-control" id="search-input" placeholder="Search options">
        </div>
        <div class="form-group">
          <select multiple class="form-control" id="example-select">
          <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
            <option value="option5">Option 5</option>
          </select>
        </div>
        <div class="form-group">
          <button class="btn btn-primary" id="show-selected">Show Selected</button>
        </div>
      </div>
      <div class="col">
        <h5>Selected Values:</h5>
        <ul id="selected-values"></ul>
      </div>
      <label for="text" class="form-label">Month <span style="color: red">*</span></label>
                                        <select class="month form-control" name="month" id="month" onchange="GFG_Fun()">
                                        <option value="NA">--SELECT MONTH--</option>
                                        <?php
                                      for ($i = 1; $i <= 12; $i++)
                                      {
                                          $month = date('F', mktime(0, 0, 0, $i, 1, 2011));
                                          ?>
                                          <option value="<?php echo $i; ?>"><?php echo $month; ?></option>
                                          <?php
                                      }
                                      ?>
                                      </select>
    </div>
  </div>

  <script>
    const searchInput = document.getElementById('search-input');
    const selectElement = document.getElementById('example-select');
    const showSelectedButton = document.getElementById('show-selected');
    const selectedValuesList = document.getElementById('selected-values');

    // Filter options based on search input
    searchInput.addEventListener('input', function(event) {
      const searchValue = event.target.value.toLowerCase();
      const options = selectElement.options;

      for (let i = 0; i < options.length; i++) {
        const option = options[i];
        const optionText = option.text.toLowerCase();
        const isVisible = optionText.includes(searchValue);

        option.style.display = isVisible ? 'block' : 'none';
      }
    });

    // Show selected values on button click
    showSelectedButton.addEventListener('click', function() {
      const selectedOptions = Array.from(selectElement.selectedOptions);
      const selectedValues = selectedOptions.map(function(option) {
        return option.text;
      });

      selectedValuesList.innerHTML = '';
      selectedValues.forEach(function(value) {
        const li = document.createElement('li');
        li.textContent = value;
        selectedValuesList.appendChild(li);
      });
    });
  </script>
  <script>
    (function($) {
  $.fn.validateMobileNumber = function() {
    return this.each(function() {
      var mobileNumber = $(this).val();
      var numericRegex = /^[0-9]+$/;

      if (!numericRegex.test(mobileNumber)) {
        $(this).addClass('is-invalid');
      } else {
        $(this).removeClass('is-invalid');
      }
    });
  };
})(jQuery);

    </script>
    <input type="text" id="searchInput" placeholder="Search...">
<table id="dataTable">
    <!-- Table rows and columns -->
</table>

</body>
<script>

function daysInMonth(month='07', year='2023') 
{
  return new Date(year, month, 0).getDate();
}

function GFG_Fun() 
{
    var month=document.getElementById("month").value; 
    var year='2023';
    var noofdays=daysInMonth(month);  
    
    var xyz='15000';
    var abc;
    abc=xyz/noofdays;
    console.log(noofdays);
    console.log(abc);
}

GFG_Fun();

</script>
</html>

