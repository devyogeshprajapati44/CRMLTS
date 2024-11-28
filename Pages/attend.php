<?php
date_default_timezone_set("Asia/Calcutta");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminpanel";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

if(isset($_POST['checkin']))
{
$checkin=date('h:i:s');
$ct=$_POST['checkin'];
$ct=$checkin;
echo $sql="INSERT INTO `employee_attendence`(`check_in_time`) VALUES ('".$ct."')";
// if ($conn->query($sql) === TRUE) {
//     echo "Check-in time record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
}

if(isset($_POST['checkout']))
{
$checkout=date('h:i:s');
$ctt=$_POST['checkout'];
$ctt=$checkout;
echo $sql="UPDATE `attendence` SET `Check-Out`='".$ctt."' WHERE `Id`='2'";
// if ($conn->query($sql) === TRUE) {
//     echo "Check-out time record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
}

//SELECT `Check-in`,`Check-Out`,TIMEDIFF(`Check-in`, `Check-Out`) as Total_time from attendence

?>
?>