<?php
$servername = "localhost";
//$username = "root";
$username = "root";
//$password = "";
$password = "";
//$dbname = "adminpanel";
$dbname = "u227620396_ltscrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>