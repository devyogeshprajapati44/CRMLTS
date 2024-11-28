
<?php
// if(!isset($_SESSION))
// {
//     session_start();
// }
// if(isset($_SESSION['PFC_UID']))
// {
//     header("location: PFC");
// }
?>
<?php
require_once 'connection.php';
session_start();
if (isset($_POST['submit']))
{
  //$UserName =  trim(strtoupper($_POST['username']));
  $UserName     =  trim($_POST['username']);
  $UserPassword =  trim($_POST['password']);
  //echo $qry = "SELECT * FROM `employee` where `username`='$UserName' and `password`='$UserPassword' and `emp_status`='active'";
  $qry   = "SELECT * FROM `employee` where `username`='$UserName' and `emp_status`='1'";
  //die;
  $run   = mysqli_query($conn ,$qry);
  $count = mysqli_num_rows($run); 

  if($count == 1){
      $row = mysqli_fetch_array($run);
      if(password_verify($UserPassword,$row['password'])){
          $User_Id=$row['Id'];
          $Emp_Id=$row['emp_code'];
          $Emp_Name=$row['emp_name'];
          $role_id=$row['role_id'];
          $User_status=$row['emp_status'];
          $_SESSION['PFC_UID']=$User_Id;
          $_SESSION['PFC_EmpName']=$Emp_Name;
          $_SESSION['PFC_EmpRole']=$role_id;
          $_SESSION['PFC_EmpStatus']=$User_status;
          $_SESSION['PFC_EmpID']=$Emp_Id;
          $LoginTime = $_SERVER['REQUEST_TIME'];
          $_SESSION['LAST_ACTIVITY'] = $LoginTime;
          $LoginIpAddress = getenv('REMOTE_ADDR');
          $_SESSION['IpAddress']=$LoginIpAddress;
          
                  if($count == 1) 
                  { 
                    header('location:PFC.php');
                    echo '<script>alert("you are logged in");</script>';
                  }
                // else 
                // {
                //  echo '<script>alert("User Name And Password Not Match.");</script>'; 
                //  }
       }

        else
        {
        $error_message="<p style='margin-left: 41px;color: red;'>UserName And Password Are Not Match.</p>";
        } 
    }
    else
    {
      $error_message="<p style='margin-left: 41px;color: red;'>UserName And Password Are Not Match.</p>";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LTS-CRM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link rel="icon" type="image/x-icon" href="assets/img/logoo.png"/>
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
 body 
  {
      background-image: url("assets/img/business-partners.avif");
      background-size: cover; /* Makes the background image cover the entire container */
      background-position: center; /* Centers the background image */
  }
 </style>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <!-- <img style="width:60px;height:-51px;" src="assets/img/latech.jfif" alt="LatechLogo"> -->
                  <img src="assets/img/Latech.jpeg" alt="LatechLogo" style="width:402px;max-height: 145px">
                
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small"><b>Enter Your Username & Password To Login</b></p>
                  </div>
                    <?php
                         //echo $error_message;
                    ?>
                <form class="row g-3 needs-validation" novalidate action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->
                    <div class="col-12">
                      <input name="submit" id="submit" class="btn btn-primary w-100" type="submit" value="Login">
                    </div>
                    <div class="col-12">
                      <!----<p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p> -->
                    </div>
                  </form>

                </div>
              </div>

             

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
 

  <!-- Template Main JS File -->
  

</body>

</html>
