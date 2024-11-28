<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
date_default_timezone_set("Asia/Kolkata");
include 'Script/Sginin_singout_Script.php';
include_once 'connection.php';
include_once 'Session.php';
include_once 'Script/CommonFunctions.php';
include_once 'role_assign.php';


if(isset($_REQUEST['PageName']))
{
    $PageName=$_REQUEST['PageName'];
    $PageName=explode("?",$PageName);
    $PageName= $PageName[0];
    $PageName=$PageName.".php";
    $file_pointer = "./Pages/$PageName";
    if (file_exists($file_pointer)) {
    }else {
        $PageName="404.php";
    }
}elseif(!(isset($_REQUEST['PageName']))){
    $PageName="dashboard.php";
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
<style>
  html {
      font-size: 12px;
  }
</style> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        html {
            font-size: 12px;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LTS-CRM</title>
    <!-- Custom fonts for this template-->
    <link rel = "icon" href ="assets/img/logoo.png" type = "image/x-icon">
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/css/select2.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/css/fstdropdown.css" rel="stylesheet">
    <link href="assets/css/fstdropdown.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">  
    <link href="assets/css/select2.min.css " rel="stylesheet">  
    <link href="assets/css/fstdropdown.css" rel="stylesheet">
    <link href="assets/css/fstdropdown.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
  </head>


<body id="page-top">

<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="#" class="logo d-flex align-items-center">
  <img src="assets/img/logoo.png" alt="LatechLogo" class="rounded-circle">
    <span class="d-none d-md-block">LTS-CRM</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
  
</div><!-- End Logo -->

<div class="search-bar">
  <!-- <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form> -->
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>

    </li><!-- End Search Icon-->

<!-- End Notification Nav -->
<!-- End Messages Nav -->
<li>
<?php
//print_r($PFC_EmpRole);
$Status= checkentry($PFC_UID,$conn);
//echo $Status;
if($Status==1)
{
  ?>
  <input type="hidden" name="PFC_UID" value="<?php echo $PFC_UID;?>">
  <!-- <span style="margin-top:18px;float:left;padding:0px 0px 0px 0px;">Sign-In Time<input type="text" value="<?php //echo TimeDiff($PFC_UID,$conn); ?>" readonly></span></br> -->
  <span style="margin-right:96px;margin-top:0px;">Sign-In Time:&nbsp;<input type="text" style="background-color:bisque;color:black;border-color:lightblue;" value="<?php echo TimeDiff($PFC_UID,$conn); ?>" readonly></span></br>
<form method="POST">
<span style="float:right;margin-right:21px;margin-top:-27px;"><button class="btn btn-success" type="submit" name="checkoutt" data-dismiss="modal">Sign-Out</button></span>
</form>
  
  <?php
}elseif($Status==2){
  ?>
<form method="POST">
  <button class="btn btn-success" type="submit" name="checkinn" data-dismiss="modal">Sign-In</button>&nbsp;&nbsp;
</form>
  <?php
  }else{

  }
  ?>
  </li>
</br>
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/logoo.png" alt="Profile" class="rounded-circle" >
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['PFC_EmpName'];?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo 'WELCOME - '.$_SESSION['PFC_EmpName'];?></h6>
          <span><?php echo '('.$_SESSION['PFC_EmpID'].')';echo"<br/>";?></span>
          <!-- <span><a href="PFC.php?PageName=change_password">Change Password<a></span> -->
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="PFC.php?PageName=change_password">
            <i class="bi bi-key"></i>
            <span>Change Password</span>
          </a>
        </li>
        <p>
          <a class="dropdown-item d-flex align-items-center" href="Logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
</p>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include('sidebar/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php //include "NotificationBar.php"; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                    
            
                <?php include_once './Pages/'.$PageName ; ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

<?php
//include('view/layout/footer.php');
?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- fotter start -->
<footer id="footer" class="footer" style="margin-top:px;">
<!-- Logout Modal-->
<div class="copyright">
  &copy; Copyright <strong><span>Latech-Solutions Pvt Ltd</span></strong>. All Rights Reserved  &copy; 2023
</div>
</footer>
 <!-- Template Main JS File -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <!-- <script src="assets/js/jquery.min.js"></script> -->
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/fstdropdown.js"></script>
    <script src="assets/js/fstdropdown.min.js"></script>

   <!-- Template Main JS File -->
<script type="text/javascript">
$(document).ready(function()
{
    $(".userlogin").hide();
$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1").val()=="yes")
    {
        $(".userlogin").show();
       
    } 
});

$("#gridRadios2").click(function()
{
    //no
   if($("#gridRadios2").val()=="no")
    {
        
     
        $("#username").val("");
        $("#password").val("");
        $("#role").val("NA");
        $(".userlogin").hide();
    }
    
});

$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1:checked").val()=="yes")
    {
        $(".userlogin").show();
       
    } 
});

});
$('#myTabless').DataTable( {
dom: 'Bfrtip',
buttons: [ 'excel' ]
});
</script>
<script>
setFstDropdown()

</script>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  



<!-- fotter end -->

  <!-- Template Main JS File -->


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="Logout">Logout</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
//check-in and checkout time.
if(isset($_POST['checkinn'])) 
{
    $checkinTime=date('h:i a');
    //$checkinTime=date('h:i');//Check-in time
    $checkinDate=date('Y-m-d');
    $userID=$_SESSION['PFC_UID'];
    echo $sql_insert="INSERT INTO `employee_attendence`(`user_id`, `check_in_time`,`check_in_date`) VALUES ('".$userID."','".$checkinTime."','".$checkinDate."')";

    if(mysqli_query($conn, $sql_insert))
 {
  $last_id = mysqli_insert_id($conn);
  $_SESSION["last_id"]=$last_id;
  //header("location:PFC.php?PageName=header&Mgs=1&EmpID=$EmpID");
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
 }
 else
 {
     echo "Error: " . $sql_update . "<br>" . $conn->error;
 }
}  

if(isset($_POST['checkoutt']))
{
        $user_id=$_SESSION['PFC_UID'];
        $sql_id ="SELECT * FROM `employee_attendence` WHERE `user_id`='".$user_id."' and  Date(`CreatedOn`)=Date(now()) order by Id desc";      
        $result = mysqli_query($conn, $sql_id);  
        $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count  = mysqli_num_rows($result); 
        $id     = $row["Id"];

        $checkintime=$row["check_in_time"];
        $_SESSION["ID"]=$id;
        $idd=$_SESSION["ID"];
        $_SESSION["checkin"]=$checkintime;

        $checkout=date('h:i a');
        //$checkout=date('h:i');//Check out time.
        $current_date_checkout=date('Y-m-d');
        $checkin=$_SESSION["checkin"];
        //$checkout=$ctt;
        $t1 = strtotime($_SESSION["checkin"]);
        $t2 = strtotime($checkout);
        $hours = ($t2 - $t1)/3600;  

        $tootltime=floor($hours) . ':' . ( ($hours-floor($hours)) * 60 );

        $checkin_checkout='CHECK-IN/CHECK-OUT';
        //if($tootltime=='9:0')
        if($tootltime=='9:0' || $tootltime >= '9:0')
        {
         $atten_status='P';//Present
        }
        if($tootltime < '9:0')
        {
         $atten_status='HD';//Half Day
        }
        if($tootltime=='0:0')
        {
         $atten_status='H';//Holiday
        }
        if($t2=='')//Check-Out time is empty
         {
          $atten_status='HD';//Half-Day while check-out time is not save.
         }

        //$sql_update="UPDATE `employee_attendence` SET `check_out_time`='".$checkout."',`check_out_date`='".$current_date_checkout."',`Total_hours`='".$tootltime."' WHERE `user_id`='".$user_id."' AND Id='".$idd."'";
        echo $sql_update="UPDATE `employee_attendence` SET `check_out_time`='".$checkout."',`check_out_date`='".$current_date_checkout."',`Total_hours`='".$tootltime."',`status`='".$atten_status."',`upload_type`='".$checkin_checkout."' WHERE `user_id`='".$user_id."' AND Id='".$idd."'";
//die();
        $resultt=mysqli_query($conn,$sql_update);
                if($resultt === TRUE)
                {
                  echo '';
                }
                else
                {
                    echo "Error: " . $sql_update . "<br>" . $conn->error;
                }
          
            }
//check-in and checkout time.
  ?>