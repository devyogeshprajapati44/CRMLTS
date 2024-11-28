<?php
function checkentry($empid,$conn)
{
    $Status=0;
    $currentdate=date('Y-m-d');
    $result = mysqli_query($conn, "select * from employee_attendence where `check_in_date`='$currentdate' and `user_id`='$empid'");
    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result); 
    $checkoutdate=$row["check_out_date"];
    if($count==1){
       $Status=1;
    }
    if($count==0)
    {
       $Status=2;
    }
    if(!empty($checkoutdate))
    {
        $Status=2;
    }
    // else{
    //     $Status=2;
    // }
    return $Status;
}

function TimeDiff($empid,$conn)
{
    $currentdate=date('Y-m-d');
    $result = mysqli_query($conn, "select * from employee_attendence where `check_in_date`='$currentdate' and `user_id`='$empid'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $checkin_time=$row["check_in_time"]; 
    return $checkin_time;
}

?>