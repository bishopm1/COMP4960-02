<?php 
  require('verification/VerifySpeaker.php');
  
  //Pre-processing phone numbers 1 and 2
  $speakerPhone = str_replace('-',"",$_POST["speakerPhoneNum1"]);
  $speakerPhone = str_replace(')',"",$speakerPhone);
  $speakerPhone = str_replace('(',"",$speakerPhone);
  
  $speakerPhone2 = str_replace('-',"",$_POST["speakerDayOfPhoneNum"]);
  $speakerPhone2 = str_replace(')',"",$speakerPhone2);
  $speakerPhone2 = str_replace('(',"",$speakerPhone2);
  
  if(VerifySpeaker::verifySpeakerDriver($_POST["speakerFirstName"], $_POST["speakerLastName"], $_POST["speakerEmail"], 
  $speakerPhone, $speakerPhone2) === TRUE){
    require_once "code_camp_dbconnect.php";
    
    $sql = "INSERT INTO speaker(first_name, last_name, email_address, phonenum1, phonenum2)
    VALUES('". $_POST["speakerFirstName"] ."','".$_POST["speakerLastName"] ."',
    '".$_POST["speakerEmail"] ."','". $speakerPhone ."',
    '". $speakerPhone2 ."')";
    
    $link->query($sql);
    mysqli_close($link);
    
    echo "Data was sent!";
    
  }
  else{
    echo "Data was not sent!";
    exit(0);
  }
?>