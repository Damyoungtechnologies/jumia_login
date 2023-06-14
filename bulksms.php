<?php  

//5vYdTDhJMwfu00oi4bbKIBmeLHjAtEtJZfrhBywCjbmcttnArxVS048goZmi // keyapi


if(isset($_POST['sendsms3'])){

        $verify = "1234567890";
        $verify_1 = str_shuffle($verify);
        $verify_2 = substr($verify_1, 0, 4);

    $messagenew = $_POST['message'];
    $messagebox = 'Dear customer,  Use this for Okportech authentication '.$verify_2.'. This is valid for 30 minutes.Do not share it with anyone.';

    //send message

  $email = "okporemmanuel@gmail.com"; //your bulksmslive registered email
  $password = "emmanuel1000"; //Your password
  $message = $messagebox; //message content
  $sender_name = "OKPORTECH"; //Your sender name
  $recipients = "+2348032077924"; //mobile numbers seperated by comma e.9 2348028828288,234900002000,234808887800
  $forcednd = "1"; //set to 1 if you want DND numbers to 

  $data = array("email" => $email, "password" => $password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients,"forcednd"=>$forcednd);
  $data_string = json_encode($data);
  $ch = curl_init('https://api.bulksmslive.com/v2/app/sms');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
  $result = curl_exec($ch);
  if($result){
//if successfull  do this
    echo 'REGISRATION HAS BEEN SUCCESSFULLY SENT';
  }else{
 //if it failes do this
    $res_array = json_decode($result);
    // print_r($res_array); 
    echo 'Error, Try again';

  }
 



}

// $email = "your bulksmslive registered email ";
// $password = "Your password";
// $message = "message content";
// $sender_name = "Your sender name";
// $recipients = "mobile numbers seperated by comma e.9 2348028828288,234900002000,234808887800";
// $forcednd = "set to 1 if you want DND numbers to ";

// $data = array("email" => $email, "password" => $password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients,"forcednd"=>$forcednd);
// $data_string = json_encode($data);
// $ch = curl_init('https://api.bulksmslive.com/v2/app/sms');
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
// $result = curl_exec($ch);
// $res_array = json_decode($result);
// print_r($res_array);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bulksmsapiworking</title>
</head>
<body>
<h1>bulksms api</h1>

<form action="" method="post">
<input type="text" name="message" id="" placeholder="Enter message">
    <button name="sendsms3">SEND SMS BULK</button>
</form>
    
</body>
</html>