<?php
error_reporting(0);
function NowDate(){
    date_default_timezone_set('Asia/Kolkata');
    $CurrentDate = date("Y-m-d");
    return($CurrentDate);
}

function NowTime(){
    date_default_timezone_set('Asia/Kolkata');
    $CurrentTime=date("H:i:s");
    return($CurrentTime);
}



function CF($var,$connection){
    $data= mysqli_real_escape_string($connection, strtoupper($var));
    return strip_tags($data);
}

function CFNew($var,$connection){
    $data= mysqli_real_escape_string($connection, $var);
    return strip_tags($data);
}

function CityName($id,$connection){
    $fetch_city = mysqli_query($connection, "select * FROM cities WHERE id='$id';");
    $row = mysqli_fetch_array($fetch_city);
    echo $row[1];
    return;
}

function StateName($id,$connection){
    $fetch_state = mysqli_query($connection, "select * FROM states WHERE id='$id';");
    $row = mysqli_fetch_array($fetch_state);
    echo $row[1];
    return;
}



function MoneyFormatIndian($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}

function SMS_API($no,$msg)
{
    $fields = array(
        "sender_id" => "TXTIND",
        "message" => $msg,
        "route" => "v3",
        "numbers" => $no,
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
            "authorization: j4GfBLFYPDT30siCVk98XJmaebWpx7UnAqywSRhzEdI52ZNlgcwhJ6afLg0ktC2YcTMq5WnA8SN7QDiK",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

}

function IDNoGenerate($No){
    $Date=NowDate();
    $DatePart = explode('-', $Date);
    $Day=$DatePart[2];
    $Year=$DatePart[0];
    $Month=$DatePart[1];
    $ID=$Day.$Month.$Year."-".$No;
    return $ID;

}

function attendance_first($user_id,$connection)
{
  //$conn     = new mysqli("localhost", "root", "", "adminpanel"); // used For test ing only.
  $_SESSION["Hours"]='';
  $Sql_role = mysqli_query($connection, "SELECT HOUR(`Total_hours`) as Total_hours FROM `employee_attendence` where `user_id`='$user_id'"); 
  $rows     = mysqli_fetch_array($Sql_role);  
  $count    = mysqli_num_rows($Sql_role); 
  
  $total_time=$rows["Total_hours"];
  $working_hours=$_SESSION["Hours"];

  if($working_hours == '8')
  {
     $all='P';
  }
  
  if($working_hours=='7' || $working_hours=='6')
  {
     $all='SL';
  }
  
  if($working_hours=='5')
  {
     $all='H';
  }
  
  if(empty($working_hours))
  {
     $all='A';
  }
  
  if($working_hours < '8')
  {
     $all='HWP';
  }

  return $all;
}

//New added 06-09-2023
function EDV($Value,$type)
{
    if($type==1)
    {
        $encodedEmployeeID = base64_encode($Value);

        return $encodedEmployeeID;
    }
    if($type==2)
    {
        $decodedEmployeeID = base64_decode($Value);
        return $decodedEmployeeID;
    }
}
//New added 06-09-2023
?>

