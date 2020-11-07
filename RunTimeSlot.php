<?php 
  require('verification/VerifyTimeSlot.php');
  if(VerifyTimeSlot::verifyTimeDriver($_POST['timeslotStartTime'], $_POST['timeslotEndTime']) === TRUE){
    require_once "code_camp_dbconnect.php";
    
    $sql = "INSERT INTO timeslot(start_time, end_time)
    VALUES('". $_POST['timeslotStartTime'] ."','".$_POST['timeslotEndTime'] ."')";
    
    $link->query($sql);
    mysqli_close($link);
    
    echo "Data was sent!";
    
  }
  else{
    echo "Data was not sent!";
    exit(0);
  }
?>