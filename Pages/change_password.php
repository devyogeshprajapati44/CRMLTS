<?php
error_reporting(0);
session_start();
include 'connection.php';

if (isset($_POST['changepassword'])) 
{
    $new_password = $_POST["new_password"];
    $confirmpassword = $_POST["confirmpassword"];
    $userid = $_POST["userid"];
    
    $fetch = mysqli_query($conn, "SELECT `password` FROM employee WHERE Id = '$userid'");
    $row= mysqli_fetch_array($fetch);
    // Verify if the current password matches the stored password
    //if (password_verify($currentPassword, $storedPassword)) {
        if($new_password === $confirmpassword) 
        {
                // Hash and update the new password in the database
            $hashedPassword = password_hash($new_password,PASSWORD_DEFAULT);
            //$update_pwd="UPDATE `employee` SET `password`='$newPassword' WHERE `Id`='$userid'";
              $update_pwd="UPDATE `employee` SET `password`='".$hashedPassword."',`original_password`='".$new_password."' WHERE `Id`='$userid'";
            //die;
            //$run = mysqli_query($conn, $update_pwd);
            if(mysqli_query($conn,$update_pwd))
            {
              header("location:PFC.php?PageName=change_password&Mgs=1");
            }
            // else
            // {
            //   header("location:PFC.php?PageName=change_password&Mgs=2");
            // }
      }
      else
      {
        header("location:PFC.php?PageName=change_password&Mgs=2");
      }
}
//update code end here.
?>

<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Password change Successfully.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <meta http-equiv="refresh" content="9;url=login.php">
    <?php
    }
}
?>

<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==2){
        ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Error !</span>Password Are Not Matched.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<!-- <meta http-equiv="refresh" content="5;url=login.php"> -->
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
         <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
              <nav class="navbar navbar-light bg-light">
              <form action="#" method="GET">
               <a class="btn btn-warning text-dark"  href="PFC.php?PageName=dashboard" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:left;margin-left:22px;" role="button">Back</a>
              </form>
                 <h1 style="color:#012970;margin-right:538px;margin-top:-1px;">CHANGE PASSWORD</h1>
                </nav><br><br>
                <div class="card-body">
                 <!-- <h5 class="card-title"><u>Change Password:-</u></h5> -->
                  <form method="POST">    
                  <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['PFC_UID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3"> 
                      <div class="row">
                      <div class="col-12">
                          <label for="" class="form-label">New Password</label>
                          <input type="text" class="new_password form-control" name="new_password" id="new_password" required>
                        </div>
                        </div><br/>
                      <div class="row">
                        <div class="col-12">
                          <label for="" class="form-label">Confirm Password</label>
                          <input type="text" class="confirmpassword form-control" name="confirmpassword" id="confirmpassword" required>
                        </div>
                      </div> 
<br/>
                          <div class="row mb-3">
                          <div class="col-sm-3">
                          <input type="submit" name="changepassword" class="btn btn-primary changepassword" value="submit">
                          </div>
                          </div>
                        </form>
                       </div>
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>



